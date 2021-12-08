<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class addWorkerController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        //only admins are allowed to access this function, other users get sent away
        if(auth()->user()->level != 'administratorius'){
            return redirect()->route('home')->with('status', 'Sussy baka');
        }

        return view('usersSystem.addWorker');
    }

    public function save(Request $request)
    {
        //only admins are allowed to access this function, other users get sent away
        if(auth()->user()->level != 'administratorius'){
            return redirect()->route('home')->with('status', 'Sussy baka');
        }
        
        //validation
        $this->validate($request, [
            'username' => 'required|max:50',
            'email' => 'required|email|max:255',
            'wage' => 'required|numeric',
            'hire_date' => 'required|max:255',
            'work_hours' => 'required|numeric',
            'job' => 'required|max:255',
            'password' => 'required|confirmed|max:50',
        ]);

        //calling model to add data to database
        User::create([
            'name' => 'employee', //scuffed because this was in laravel db by default
            'username' => $request->username,
            'email' => $request->email,
            'wage' => $request->wage,
            'hire_date' => $request->hire_date,
            'work_hours' => $request->work_hours,
            'job' => $request->job,
            'password' => Hash::make($request->password),
            'status' => 'aktyvus', //aktyvus, užblokuotas, pašalintas, nepatvirtintas?
            'level' => 'darbuotojas' //klientas, darbuotojas, administratorius
        ]);

        //redirecting with message
        return redirect()->route('addWorker')->with('status', 'Darbuotojo paskyra sėkmingai sukurta');
    }
}
