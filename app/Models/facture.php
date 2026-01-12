<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'payement_id',
        'numero_facture',
        'montant_total',
        'produit_info',
        'status',
        'notes',
        'date_facture'
    ];

    protected $casts = [
        'produit_info' => 'array',
        'date_facture' => 'datetime'
    ];


    public function client()
    {
        return $this->belongsTo(client::class);
    }


    public function payement()
    {
        return $this->belongsTo(payement::class);
    }
}
