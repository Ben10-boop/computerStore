<?php

namespace App\Http\Controllers\shopSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function save_changes(Request $request)
    {
        //only admins are allowed to access this function, other users get sent away
        if (auth()->user()->level != 'administratorius') {
            return redirect()
                ->route('home')
                ->with('status', 'Sussy baka');
        }

        if ($request->delete) {
            Kategorijo::delete_item($request->delete);
            return redirect()
                ->route('categories')
                ->with('status', 'Kategorija ištrinta');
        }

        $categories_list = Kategorijo::get();

        return view('shopSystem.categories', [
            'categories_list' => $categories_list,
        ]);
    }
}
