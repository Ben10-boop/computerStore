<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prekes_kategorijo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'kategorijos_id',
        'prekes_barkodas',
    ];

    //scuffed way of editing info in db, but I don't know better
    public static function save_edit($request)
    {
        DB::table('prekes_kategorijos')
            ->where('prekes_barkodas', $request->prekes_barkodas)
            ->update([
                'kategorijos_id' => $request->kategorijos_id,
                'prekes_barkodas' => $request->prekes_barkodas,
            ]);
    }
    public static function delete_item($prekes_barkodas)
    {
        DB::table('prekes_kategorijos')
            ->where('prekes_barkodas', $prekes_barkodas)
            ->delete();
    }
}
