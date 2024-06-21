<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_Historical_Photo extends Model
{
    use HasFactory;
    protected $table = "food_historical_photo";
    protected $primaryKey = "food_historical_id";
    protected $fillable = [
        'food_historical_id',
        'photo',
        'created_at',
        'updated_at',
    ];
}
