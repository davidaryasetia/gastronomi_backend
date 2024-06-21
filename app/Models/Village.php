<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $table = 'village';
    protected $primaryKey = 'village_id';
    protected $fillable = [
        'name_village', 
        'open_at', 
        'close_at', 
        'address', 
        'fasility', 
        'mandatory_equipment', 
        'contact', 
        'url_website', 
        'url_facebook', 
        'url_instagram', 
        'url_twitter', 
        'created_at', 
        'updated_at', 
    ];
}
