<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture_Photo extends Model
{
    use HasFactory;
    protected $table = 'culture_photo';
    protected $primaryKey = 'culture_photo_id';
    protected $fillable = [
        'culture_id', 
        'photo_path', 
        'created_at', 
        'updated_at', 
    ];
}
