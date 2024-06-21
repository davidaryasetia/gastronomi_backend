<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = "food";
    protected $primaryKey = "food_id";
    protected $fillable = [
        'name', 
        'photo_path', 
        'category', 
        'description', 
        'ingredients', 
        'url_youtube', 
        'directions',
        'nutrition', 
        'address', 
        'created_at', 
        'updated_at'
    ];
}
