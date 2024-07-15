<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_Photo extends Model
{
    use HasFactory;
    protected $table = 'food_photo';
    protected $primaryKey = 'food_photo_id';
    protected $fillable = [
        'food_id', 
        'photo_path', 
    ];
}
