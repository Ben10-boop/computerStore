<?php

namespace App\Http\Controllers\usersSystem;

use App\Http\Controllers\Controller;
use Request;
use App\Models\Preke;

class homeController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $filter = Request::get('filter', ''); // ima filtro reiksme, jei nera - default ''

        $products_list = Preke::where('barkodas', 'like', '%' . $filter . '%')
            ->orWhere('aprasymas', 'like', '%' . $filter . '%')
            ->orWhere('pagaminimo_salis', 'like', '%' . $filter . '%')
            ->orWhere('pagaminimo_metai', 'like', '%' . $filter . '%')
            ->get();

        return view('index', [
            'products_list' => $products_list,
        ]);
    }
}
