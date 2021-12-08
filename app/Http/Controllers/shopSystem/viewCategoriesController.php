<?php

namespace App\Http\Controllers\shopSystem;

use App\Http\Controllers\Controller;
use Request;
use App\Models\Kategorijo;

class viewCategoriesController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $categories_list = Kategorijo::get();

        return view('shopSystem.categories', [
            'categories_list' => $categories_list,
        ]);
    }
}
