<?php

namespace App\Http\Controllers\shopSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategorijo;
use Illuminate\Support\Str;

class editCategoryController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index($edit_id)
    {
        $editableCategory = Kategorijo::where('id', $edit_id)->get();

        return view('shopSystem.editCategory', [
            'editableCategory' => $editableCategory,
        ]);
    }

    public function save_changes(Request $request)
    {
        //validation
        $this->validate($request, [
            'pavadinimas' => 'required|max:100',
            'aprasas' => 'required|max:100',
        ]);

        //storing the updated information in the database
        Kategorijo::save_edit($request);

        //redirecting back to edit category page
        return redirect()->route('editCategory');
    }
}
