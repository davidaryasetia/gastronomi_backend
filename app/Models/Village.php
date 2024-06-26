<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function village_photos(): HasMany
    {
        return $this->hasMany(Village_Photo::class, 'village_id', 'village_id');
    }
}
