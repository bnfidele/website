<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'address',
        'facebook',
        'twitter',
        'linkedin',
        'whatsapp',
        'description',
        'key',
        'title',
        'hauteur'
    ];

        protected $casts = [
        'key' => 'array', // <-- ici, Laravel convertira en tableau automatiquement
    ];
}
