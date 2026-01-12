<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];


    public function payements()
    {
        return $this->hasMany(payement::class);
    }


    public function produitmodels()
    {
        return $this->hasMany(produitmodel::class);
    }

    public function factures()
    {
        return $this->hasMany(facture::class);
    }
}
