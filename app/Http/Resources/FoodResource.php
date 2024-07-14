<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed> 
     */
    public function toArray(Request $request): array
    {
        return [
            'food_id' => $this->food_id, 
            'name' => $this->name, 
            'photo_path' => Storage::url($this->photo_path), 
            'category' => $this->category, 
            'description' => $this->description, 
            'food_historical' => $this->food_historical, 
            'ingredients' => $this->ingredients, 
            'url_youtube' => $this->url_youtube,
            'directions' => $this->directions, 
            'nutrition' => $this->nutrition, 
            'address' => $this->address, 
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at, 
            'photos' => $this->whenLoaded('photos', function(){
                return $this->photos->map(function($photo){
                    return[
                        'food_historical_photo_id' => $photo->food_historical_photo_id, 
                        'photo' => Storage::url($photo->photo), 
                    ];
                });
            }), 
        ];
    }
}
