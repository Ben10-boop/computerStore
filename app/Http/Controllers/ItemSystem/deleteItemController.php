<?php

namespace App\Http\Controllers\ItemSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preke;
use Illuminate\Support\Facades\Hash;

class deleteItemController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        if (
            auth()->user()->level != 'darbuotojas' &&
            auth()->user()->level != 'administratorius'
        ) {
            return redirect()
                ->route('home')
                ->with('status', 'Sussy baka');
        }

        return view('ItemSystem.deleteItem');
    }

    public function save(Request $request)
    {
        if (
            auth()->user()->level != 'darbuotojas' &&
            auth()->user()->level != 'administratorius'
        ) {
            return redirect()
                ->route('home')
                ->with('status', 'Sussy baka');
        }

        if ($request->delete) {
            Preke::delete_item($request->delete);
            //redirecting with message
            return redirect()
                ->route('home')
                ->with('status', 'Prekė sėkmingai pašalinta');
        }

    }
}
