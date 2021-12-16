<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzsakyma extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'busena',
        'skubus',
        'nuiolaidos_kodas',
        'apmokejimo_id',
        'patvirtinusio_naudotojo_id',
        'pateikusio_naudotojo_id',
        'adreso_id',
    ];
}
