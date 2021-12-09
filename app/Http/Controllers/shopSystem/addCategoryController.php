<?php

namespace App\Http\Controllers\shopSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategorijo;
use Illuminate\Support\Facades\Hash;

class addCategoryController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        //only workers are allowed to access this function, other users get sent away
        if (
            auth()->user()->level != 'darbuotojas' &&
            auth()->user()->level != 'administratorius'
        ) {
            return redirect()
                ->route('home')
                ->with('status', 'Sussy baka');
        }

        return view('shopSystem.addCategory');
    }

    public function save(Request $request)
    {
        //only wqorkers are allowed to access this function, other users get sent away
        if (auth()->user()->level != 'administratorius') {
            return redirect()
                ->route('home')
                ->with('status', 'Sussy baka');
        }

        //validation
        $this->validate($request, [
            'aprasas' => 'required|max:100',
            'pavadinimas' => 'required|max:100',
        ]);

        //calling model to add data to database
        Kategorijo::create([
            'aprasas' => $request->aprasas,
            'pavadinimas' => $request->pavadinimas,
        ]);

        //redirecting with message
        return redirect()
            ->route('categories')
            ->with('status', 'Kategorija sėkmingai sukurta');
    }
}
