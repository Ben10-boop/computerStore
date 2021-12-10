<?php

namespace App\Http\Controllers\shopSystem;

use App\Http\Controllers\Controller;
use Request;
use DB;
use App\Models\Preke;

class monthlyRevenueController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $filter = Request::get('filter', ''); // ima filtro reiksme, jei nera - default ''

        $products_list = Preke::select(
            'prekes.id as id',
            'kainos.id as kainos_id',
            'barkodas',
            'prek_pavadinimas',
            'aprasymas',
            'pagaminimo_salis',
            'pagaminimo_metai',
            'nuoroda_i_foto',
            DB::raw('SUM(kiekis) as parduotas_kiekis'),
            DB::raw('suma as vnt_kaina'),
            DB::raw('SUM(kiekis) * suma as pajamos'),
            DB::raw('MAX(pradzios_data) as latest_price_date')
        )
            ->where('barkodas', 'like', '%' . $filter . '%')
            ->orWhere('aprasymas', 'like', '%' . $filter . '%')
            ->orWhere('pagaminimo_salis', 'like', '%' . $filter . '%')
            ->orWhere('pagaminimo_metai', 'like', '%' . $filter . '%')
            ->leftJoin('kainos', 'kainos.prekes_id', '=', 'prekes.id')
            ->leftJoin(
                'uzsakymo_preke_s',
                'uzsakymo_preke_s.prekes_id',
                '=',
                'prekes.id'
            )
            ->groupBy('prekes.id')
            //->groupBy(' MONTH(MAX(pradzios_data) )')
            ->get();

        return view('shopSystem.monthlyRevenue', [
            'products_list' => $products_list,
        ]);
    }
}
