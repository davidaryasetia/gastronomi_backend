<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_Historical extends Model
{
    use HasFactory;
    protected $table = "food_historical";
    protected $primaryKey = "food_historical_id";
    protected $fillable = [
        'food_id', 
        'description', 
        'created_at', 
        'updated_at', 
    ];
}
