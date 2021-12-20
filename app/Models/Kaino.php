<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kaino extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'pradzios_data',
        'pabaigos_data',
        'suma',
        'prekes_barkodas',
    ];

    //scuffed way of editing info in db, but I don't know better
    public static function save_edit($request)
    {
        DB::table('kainos')
            ->where('id', $request->id)
            ->update([
                'pradzios_data' => $request->pradzios_data,
                'pabaigos_data' => $request->pabaigos_data,
                'suma' => $request->suma,
                'prekes_barkodas' => $request->prekes_barkodas,
            ]);
    }
    public static function delete_item($id)
    {
        DB::table('kainos')
            ->where('id', $id)
            ->delete();
    }
}
