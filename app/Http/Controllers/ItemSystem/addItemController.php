<?php

namespace App\Http\Controllers\ItemSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preke;
use App\Models\Kaino;
use App\Models\Prekes_kategorijo;
use Illuminate\Support\Facades\Hash;

class addItemController extends Controller
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

        return view('ItemSystem.addItem');
    }

    public function save(Request $request)
    {
        //only wqorkers are allowed to access this function, other users get sent away
        if (
            auth()->user()->level != 'darbuotojas' &&
            auth()->user()->level != 'administratorius'
        ) {
            return redirect()
                ->route('home')
                ->with('status', 'Sussy baka');
        }

        //validation
        $this->validate($request, [
            'prek_pavadinimas' => 'required|max:100',
            'suma' => 'required|max:100',
            #'kategoriju_sarasas' => 'required|max:100',
            'barkodas' => 'required|max:100',
            'aprasymas' => 'required|max:1000',
            'pagaminimo_salis' => 'required|max:100',
            'nuoroda_i_foto' => 'required|max:1000',
            'pagaminimo_metai' => 'required|max:100',
        ]);

        //calling model to add data to database
        Preke::create([
            'prek_pavadinimas' => $request->prek_pavadinimas,
            #'kategoriju_sarasas' => 1,
            'barkodas' => $request->barkodas,
            'aprasymas' => $request->aprasymas,
            'pagaminimo_salis' => $request->pagaminimo_salis,
            'nuoroda_i_foto' => $request->nuoroda_i_foto,
            'pagaminimo_metai' => $request->pagaminimo_metai,
        ]);

        Kaino::create([
            'suma' => $request->suma,
            'prekes_barkodas' => $request->barkodas,
        ]);
        Prekes_kategorijo::create([
            'kategorijos_id' => $request->kategorijos_id,
            'prekes_barkodas' => $request->barkodas,
        ]);


        //redirecting with message
        return redirect()
            ->route('home')
            ->with('status', 'Prekė sėkmingai pridėta');
    }
}
