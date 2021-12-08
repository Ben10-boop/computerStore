<?php

namespace App\Http\Controllers\usersSystem;

use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged out
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('usersSystem.register');
    }

    public function save(Request $request)
    {
        //validation
        $this->validate($request, [
            'username' => 'required|max:50',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|max:50',
        ]);

        //calling model to add data to database
        User::create([
            'name' => 'user', //scuffed because this was in laravel db by default
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'aktyvus', //aktyvus, užblokuotas, pašalintas, nepatvirtintas?
            'level' => 'klientas' //klientas, darbuotojas, administratorius
        ]);

        //signing in the user
        auth()->attempt($request->only('email', 'password'));
        event(new Registered(auth()->user()));

        //redirecting to main page
        return redirect()->route('home');
    }
}
