<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banko_korteles extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'numeris',
        'galiojimo_data',
        'cvv',
        'korteles_savininkas',
        'naudotojo_id',
    ];

    //scuffed way of deleting info in db, but I don't know better
    public static function delete_card($id){
        DB::table('banko_korteles')->where('id', $id)->delete();
    }
}
