<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzsakymo_preke_s extends Model
{
    use HasFactory;

    protected $fillable = [
        'kiekis',
        'garantija_id',
        'uzsakymas_id',
        'prekes_id',
    ];
}
