<?php

namespace App\Http\Controllers\ItemSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preke;
use App\Models\Kaino;
use App\Models\Prekes_kategorijo;
use Illuminate\Support\Facades\Hash;

class editItemController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    { 
        if (
            auth()->user()->level != 'darbuotojas' &&
            auth()->user()->level != 'administratorius'
        ) {
            return redirect()
                ->route('home')
                ->with('status', 'Sussy baka');
        }

        $id = $request->edit;
        $editable = Preke::select(
            'id',
            'barkodas',
            'prek_pavadinimas',
            'aprasymas',
            'pagaminimo_salis',
            'pagaminimo_metai',
            'nuoroda_i_foto',
        )
            ->where('id', $id)
            #->leftJoin('kainos', 'kainos.prekes_barkodas', '=', 'barkodas')
            ->get();

        return view('ItemSystem.editItem', [
            'editable' => $editable,
        ]);
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
            'id' => 'required|max:100',
            'prek_pavadinimas' => 'required|max:100',
            'barkodas' => 'required|max:100',
            'aprasymas' => 'required|max:1000',
            'pagaminimo_salis' => 'required|max:100',
            'nuoroda_i_foto' => 'required|max:1000',
            'pagaminimo_metai' => 'required|max:100',
        ]);

        Preke::save_edit($request);
        Kaino::save_edit($request);
        Prekes_kategorijo::save_edit($request);
        //redirecting with message
        return redirect()
            ->route('home')
            ->with('status', 'Prekė sėkmingai redaguota');
    }
}
