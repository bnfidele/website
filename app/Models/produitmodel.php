<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produitmodel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'min_stock',
        'unit',
        'user_id',
        'photo',
        'meta_description',
        'slug',
        'user_name',
        
    ];


    public function stocks()
    {
        return $this->hasOne(stockmodel::class,'produitmodel_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payements()
    {
        return $this->hasMany(Payement::class);
    }

}
