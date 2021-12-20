<?php

namespace App\Http\Controllers\shopSystem;

use App\Http\Controllers\Controller;
use Request;
use DB;
use App\Models\Preke;
use App\Models\Uzsakyma;
use App\Models\Uzsakymo_preke_s;

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

        $products_list = [];

        $year_month = Uzsakymo_preke_s::select(
            DB::raw('EXTRACT(year FROM data) AS metai'),
            DB::raw('EXTRACT(month FROM data) AS menuo')
        )
            ->leftJoin(
                'uzsakymas',
                'uzsakymas.id',
                '=',
                'uzsakymo_preke_s.uzsakymas_id'
            )
            ->groupBy(
                DB::raw('EXTRACT(year FROM data)'),
                DB::raw('EXTRACT(month FROM data)')
            )
            ->get();

        foreach ($year_month as $item) {
            $products_group = Uzsakymo_preke_s::select(
                'kainos.id as kainos_id',
                'prek_pavadinimas',
                'barkodas',
                DB::raw('suma as vnt_kaina'),
                DB::raw('SUM(kiekis) as parduotas_kiekis'),
                DB::raw('SUM(kiekis) * suma as pajamos'),
                DB::raw('MAX(pradzios_data) as latest_price_date'),
                DB::raw('EXTRACT(year FROM data) AS metai'),
                DB::raw('EXTRACT(month FROM data) AS menuo')
            )
                ->where(DB::raw('EXTRACT(year FROM data)'), '=', $item->metai)
                ->where(DB::raw('EXTRACT(month FROM data)'), '=', $item->menuo)
                ->leftJoin(
                    'prekes',
                    'prekes.barkodas',
                    '=',
                    'uzsakymo_preke_s.prekes_barkodas'
                )
                ->leftJoin(
                    'uzsakymas',
                    'uzsakymas.id',
                    '=',
                    'uzsakymo_preke_s.uzsakymas_id'
                )
                ->leftJoin(
                    'kainos',
                    'kainos.prekes_barkodas',
                    '=',
                    'uzsakymo_preke_s.prekes_barkodas'
                )
                ->groupBy('prek_pavadinimas')
                ->get();

            array_push($products_list, $products_group);
        }

        return view('shopSystem.monthlyRevenue', [
            'products_list' => $products_list,
        ]);
    }
}
