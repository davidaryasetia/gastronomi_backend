<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village_Photo extends Model
{
    use HasFactory;
    protected $table = "village_photo";
    protected $primaryKey = "village_photo_id";
    protected $fillable = [
        'village_id', 
        'photo_path', 
        'created_at', 
        'updated_at', 
    ];
}
