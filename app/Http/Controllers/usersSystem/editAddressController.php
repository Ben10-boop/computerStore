<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adresas;

class editAddressController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $address_list = Adresas::get()->where('owner_id', auth()->user()->id);
        return view('usersSystem.editAddress', ['address_list' => $address_list]);
    }

    public function save(Request $request)
    {
        //validation
        $this->validate($request, [
            'gatve' => 'required|max:255',
            'namo_numeris' => 'required|max:255',
            'buto_numeris' => 'required|max:255',
            'rajonas' => 'required|max:255',
            'savivaldybe' => 'required|max:255',
            'pasto_kodas' => 'required|max:255',
        ]);

        //calling model to add data to database
        Adresas::create([
            'gatve' => $request->gatve,
            'namo_numeris' => $request->namo_numeris,
            'buto_numeris' => $request->buto_numeris,
            'rajonas' => $request->rajonas,
            'savivaldybe' => $request->savivaldybe,
            'pasto_kodas' => $request->pasto_kodas,
            'owner_id' => auth()->user()->id
        ]);

        //redirecting to main page
        return redirect()->route('editAddress')->with('status', 'Adresas pridėtas');
    }

    public function delete(Request $request)
    {
        Adresas::delete_adr($request->delete_adr);
        return redirect()->route('editAddress')->with('status', 'Adresas ištrintas');
    }
}
