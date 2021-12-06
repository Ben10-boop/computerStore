<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'last_name',
        'phone',
        'birth_date',
        'city',
        'gender',
        'status',
        'level'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date' => 'datetime',
    ];

    //scuffed way of editing info in db, but I don't know better
    public static function save_edit($request){
        DB::table('users')->where('id', auth()->user()->id)->update(['username' => $request->username,
                                                                     'name' => $request->name,
                                                                     'last_name' => $request->last_name,
                                                                     'phone' => $request->phone,
                                                                     'birth_date' => $request->birth_date,
                                                                     'city' => $request->city,
                                                                     'gender' => $request->gender
                                                                    ]);
    }
}
