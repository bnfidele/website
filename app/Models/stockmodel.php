<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockmodel extends Model
{
    use HasFactory;

    protected $fillable = [
        'produitmodel_id',
        'quantity',
        'price',
        'expiry_date',
    ];

    public function produitmodel()
    {
        return $this->belongsTo(produitmodel::class, 'produitmodel_id');
    }
}
