<?php

namespace App\Http\Controllers\ItemSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
#use Request;
use App\Models\Preke;
use App\Models\Kaino;
use Illuminate\Support\Facades\Hash;

class previewItemController extends Controller
{
    //makes it so the controller can only be accessed if the user is logged in
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('ItemSystem.previewItem');
    }

    public function save(Request $request)
    {
        if($request->id){
            $list = Preke::get()->where('id', $request->id);
            return view('itemSystem.previewItem', ['list' => $list]);
        }
        $list = Preke::get()->where('id', '1');
        return view('itemSystem.previewItem', ['list' => $list]);
    }
}
