<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preke extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'barkodas',
        'aprasymas',
        'pagaminimo_salis',
        'nuoroda_i_foto',
        'pagaminimo_metai',
    ];

    //scuffed way of editing info in db, but I don't know better
    public static function save_edit($request)
    {
        DB::table('prekes')
            ->where('id', $request->id)
            ->update([
                'barkodas' => $request->barkodas,
                'aprasymas' => $request->aprasymas,
                'pagaminimo_salis' => $request->pagaminimo_salis,
                'nuoroda_i_foto' => $request->nuoroda_i_foto,
                'pagaminimo_metai' => $request->pagaminimo_metai,
            ]);
    }
}
