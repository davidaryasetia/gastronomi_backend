<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Restaurant extends Model
{
    use HasFactory;
    protected $table = "restaurant";
    protected $primaryKey = "restaurant_id";
    protected $fillable = [
        'name_restaurant', 
        'description', 
        'list_food', 
        'list_drink', 
        'address', 
        'url_link_map', 
        'latitude', 
        'longitude', 
        'open_at', 
        'close_at', 
        'created_at', 
        'updated_at', 
    ];

    public function restaurant_photos(): HasMany
    {
        return $this->hasMany(Restaurant_Photo::class, 'restaurant_id', 'restaurant_id');
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'restaurant_id', 'restaurant_id');
    }

 
}
