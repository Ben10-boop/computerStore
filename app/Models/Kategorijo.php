<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorijo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['id', 'pavadinimas', 'aprasas'];

    //scuffed way of editing info in db, but I don't know better
    public static function save_edit($request)
    {
        DB::table('prekes')
            ->where('id', $request->id)
            ->update([
                'pavadinimas' => $request->pavadinimas,
                'aprasas' => $request->aprasas,
            ]);
    }
}
