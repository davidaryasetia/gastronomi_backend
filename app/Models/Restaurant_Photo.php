<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant_Photo extends Model
{
    use HasFactory;
    protected $table = 'restaurant_photo';
    protected $primaryKey = 'restaurant_photo_id';
    protected $fillable = [
        'restaurant_id',
        'photo_path',
        'created_at',
        'updated_at',
    ];
}
