<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banko_korteles;

class editCreditController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $credit_list = Banko_korteles::get()->where('naudotojo_id', auth()->user()->id);
        return view('usersSystem.editCredit', ['credit_list' => $credit_list]);
    }

    public function save(Request $request)
    {
        //validation
        $this->validate($request, [
            'numeris' => 'required|numeric',
            'galiojimo_data' => 'required',
            'cvv' => 'required|numeric',
            'korteles_savininkas' => 'required|max:255',
        ]);

        //calling model to add data to database
        Banko_korteles::create([
            'numeris' => $request->numeris,
            'galiojimo_data' => $request->galiojimo_data,
            'cvv' => $request->cvv,
            'korteles_savininkas' => $request->korteles_savininkas,
            'naudotojo_id' => auth()->user()->id
        ]);

        //redirecting to main page
        return redirect()->route('editCredit')->with('status', 'Kortelė pridėta');
    }

    public function delete(Request $request)
    {
        Banko_korteles::delete_credit($request->delete_credit);
        return redirect()->route('editCredit')->with('status', 'Kortelė ištrinta');
    }
}
