<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class blockUserController extends Controller
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

        $users_list = User::get()->where('status', '<>', "ištrintas");
        return view('usersSystem.blockUser', ['users_list' => $users_list]);
    }

    public function save_changes(Request $request){
        //only admins are allowed to access this function, other users get sent away
        if(auth()->user()->level != 'administratorius'){
            return redirect()->route('home')->with('status', 'Sussy baka');
        }

        if($request->block){
            User::change_status($request->block, "užblokuotas");
            return redirect()->route('blockUser')->with('status', 'Naudotojas užblokuotas');
        }
        if($request->unblock){
            User::change_status($request->unblock, "aktyvus");
            return redirect()->route('blockUser')->with('status', 'Naudotojas atblokuotas');
        }
        if($request->delete){
            User::change_status($request->delete, "ištrintas");
            return redirect()->route('blockUser')->with('status', 'Naudotojas ištrintas');
        }
        if($request->email){
            $users_list = User::get()->where('email', $request->email);
            return view('usersSystem.blockUser', ['users_list' => $users_list]);
        }
        
        $users_list = User::get()->where('status', '<>', "ištrintas");
        return view('usersSystem.blockUser', ['users_list' => $users_list]);
    }
}
