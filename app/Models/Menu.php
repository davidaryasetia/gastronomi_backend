<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'menu_id';
    protected $fillable = [
        'restaurant_id', 
        'food_id', 
        'type_food', 
        'is_traditional',
        'created_at', 
        'updated_at', 
    ];
}