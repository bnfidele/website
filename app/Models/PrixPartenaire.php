<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrixPartenaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix',
        'condition_technique',
        'partenaire_id',
        'categorie',
        'description',
        'nom_produit',
        'prix_remise',
        'pourcentage_remise',
        'type_prix',
        'date_debut',
        'date_fin',
        'est_actif',
    ];

    public function partenaire()
    {
        return $this->belongsTo(    partenaire::class);
    }
}
