<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

        User::save_edit($request);

        //redirecting back to edit user page
        return redirect()->route('editUser');
    }
}
