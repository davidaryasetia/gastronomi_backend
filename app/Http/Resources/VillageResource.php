<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class VillageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'village_id' => $this->village_id, 
            'name_village' => $this->name_village, 
            'open_at' => $this->open_at, 
            'close_at' => $this->close_at, 
            'address' => $this->address, 
            'description' => $this->description, 
            'fasility' => $this->fasility, 
            'mandatory_equipment' => $this->mandatory_equipment, 
            'contact' => $this->contact, 
            'photo_path' => Storage::url($this->photo_path), 
            'url_website' => $this->url_website, 
            'url_facebook' => $this->url_facebook, 
            'url_instagram' => $this->url_instagram, 
            'url_twitter' => $this->url_twitter, 
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at, 
            'village_photos' => $this->village_photos->map(function($village_photo){
                return [
                    'village_photo_id' => $village_photo->village_photo_id, 
                    'photo_path' => Storage::url($village_photo->photo_path),
                ];
            })
        ];
    }
}
