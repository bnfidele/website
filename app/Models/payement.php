<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payement extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'total',
        'payment_method',
        'produitmodel_id',
        'quantity',
        'payment_date',
        'status',
        'stock_disponible',
        'prix_unitaire',
    ];


    public function client()
    {
        return $this->belongsTo(client::class);
    }


    public function produitmodel()
    {
        return $this->belongsTo(produitmodel::class);
    }

    public function facture()
    {
        return $this->hasOne(facture::class);
    }
}
