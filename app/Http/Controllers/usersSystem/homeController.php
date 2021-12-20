<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Request;
use DB;
use App\Models\Preke;

class homeController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $filter = Request::get('filter', ''); // ima filtro reiksme, jei nera - default ''

        $products_list = Preke::select(
            'prekes.id as id',
            DB::raw(
                'GROUP_CONCAT(kategorijos.pavadinimas) as kategoriju_sarasas'
            ),
            'prek_pavadinimas',
            'kainos.id as kainos_id',
            'barkodas',
            'aprasymas',
            'pagaminimo_salis',
            'pagaminimo_metai',
            'nuoroda_i_foto',
            'suma',
            DB::raw('MAX(pradzios_data) as latest_price_date')
        )
            ->where('barkodas', 'like', '%' . $filter . '%')
            ->orWhere('aprasymas', 'like', '%' . $filter . '%')
            ->orWhere('pagaminimo_salis', 'like', '%' . $filter . '%')
            ->orWhere('pagaminimo_metai', 'like', '%' . $filter . '%')
            ->orWhere('pavadinimas', 'like', '%' . $filter . '%')
            ->leftJoin('kainos', 'kainos.prekes_barkodas', '=', 'prekes.barkodas')
            ->leftJoin(
                'prekes_kategorijos',
                'prekes_kategorijos.prekes_barkodas',
                '=',
                'prekes.barkodas'
            )
            ->leftJoin(
                'kategorijos',
                'prekes_kategorijos.kategorijos_id',
                '=',
                'kategorijos.id'
            )
            ->groupBy('prekes.barkodas')
            ->get();

        return view('index', [
            'products_list' => $products_list,
        ]);
    }
}
