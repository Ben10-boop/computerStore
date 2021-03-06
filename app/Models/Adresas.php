<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Adresas extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'gatve',
        'namo_numeris',
        'buto_numeris',
        'rajonas',
        'savivaldybe',
        'pasto_kodas',
        'owner_id',
    ];

    //scuffed way of deleting info in db, but I don't know better
    public static function delete_adr($id){
        DB::table('adresas')->where('id', $id)->delete();
    }
}
