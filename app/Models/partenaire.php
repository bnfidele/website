<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partenaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'adresse',
        'site_web',
        'logo',
        'status',
        'note',
        'type',
        'name',
        'fonction',
        'signature'
    ];



    public function prixPartenaires()
    {
        return $this->hasMany(PrixPartenaire::class);
    }
}
