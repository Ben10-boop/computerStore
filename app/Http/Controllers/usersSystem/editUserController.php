<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class editUserController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        //example of restricting functionality if user type is wrong
        if(auth()->user()->level != 'klientas'){
            return redirect()->route('home')->with('status', 'Sussy baka');;
        }

        //formatting the birth date to cut the time part (there probably is a better solution)
        $d = Str::before(auth()->user()->birth_date, ' ');
        //storing the formatted date in the session
        session(['bd' => $d]);

        return view('usersSystem.editUser');
    }

    public function save_changes(Request $request)
    {
        //validation
        $this->validate($request, [
            'username' => 'max:50',
            'name' => 'max:255',
            'last_name' => 'max:255',
            'phone' => 'max:255',
            'birth_date' => 'date',
            'city' => 'max:255',
            'gender' => 'max:255',
        ]);

        //storing the updated information in the database
        User::save_edit($request);

        //redirecting back to edit user page
        return redirect()->route('editUser');
    }
}
