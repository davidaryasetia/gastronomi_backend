<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag_Food extends Model
{
    use HasFactory;
    protected $table = 'tag_food';
    protected $primaryKey = 'tag_food_id';
    protected $fillable = [
        'food_id', 
        'nametag', 
        'created_at', 
        'updated_at', 
    ];
}
