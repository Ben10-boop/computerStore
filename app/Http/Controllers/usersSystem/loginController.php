<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged out
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('usersSystem.login');
    }

    public function log_in(Request $request)
    {
        //validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //signing in the user
        if(!auth()->attempt($request->only('email', 'password')))
        {
            // back() returns to the last page visited
            return back()->with('status', 'Invalid login details');
        }

        //redirecting to main page
        return redirect()->route('home');
    }
}
