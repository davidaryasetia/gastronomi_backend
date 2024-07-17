<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    // food 
    public function foods(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'food_id', 'food_id');
    }

    // restaurant 
    public function restaurants(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'restaurant_id');
    }
}
