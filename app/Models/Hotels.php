<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hotels extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_hotel',
        'description',
        'nom_chambre',
        'prix',
        'nombre_lits',
        'max_adultes',
        'max_enfants',
        'statut',
        'image_path',
        'category_id'


    ];
public function category(){
    return $this->belongsTo(Category::class,'category_id');
}
public function attributs(){
    return $this->belongsToMany(Attribut::class,'attribut_hotel', 'hotel_id', 'attribut_id');
}



}
