<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;
    protected $table = "culture";
    protected $primaryKey = "culture_id";
    protected $fillable = [
        'name_culture',
        'description',
        'url_youtube',
        'photo_path',
        'created_at',
        'updated_at',
    ];
}
