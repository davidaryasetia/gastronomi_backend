<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'food_historical', 
        'ingredients',
        'url_youtube',
        'directions',
        'nutrition',
        'address',
        'created_at',
        'updated_at'
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Food_Historical_Photo::class, 'food_id', 'food_id');
    }
}
