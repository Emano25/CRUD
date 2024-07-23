<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribut extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function hotel(){
        return $this->belongsToMany(Hotels::class,'attribut_hotel','attribut_id','hotel_id');
    }

}
