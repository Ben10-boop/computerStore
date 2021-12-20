<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Preke extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'prek_pavadinimas',
        'barkodas',
        'aprasymas',
        'pagaminimo_salis',
        'nuoroda_i_foto',
        'pagaminimo_metai',
    ];

    
    public static function save_edit($request)
    {
        DB::table('prekes')
            ->where('id', $request->id)
            ->update([
                'barkodas' => $request->barkodas,
                'prek_pavadinimas' => $request->prek_pavadinimas,
                'aprasymas' => $request->aprasymas,
                'pagaminimo_salis' => $request->pagaminimo_salis,
                'nuoroda_i_foto' => $request->nuoroda_i_foto,
                'pagaminimo_metai' => $request->pagaminimo_metai,
            ]);
    }
    public static function delete_item($id)
    {
        DB::table('prekes')
            ->where('id', $id)
            ->delete();
    }
}
