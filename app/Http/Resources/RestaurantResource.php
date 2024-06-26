<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'restaurant_id' => $this->restaurant_id, 
            'name_restaurant' => $this->name_restaurant, 
            'description' => $this->description, 
            'list_food' => $this->list_food, 
            'list_drink' => $this->list_drink, 
            'address' => $this->address, 
            'open_at' => $this->open_at, 
            'close_at' => $this->close_at, 
            'restaurant_photos' => $this->whenLoaded('restaurant_photos', function(){
                return $this->restaurant_photos->map(function($restaurant_photos){
                    return[
                        'restaurant_photo_id' => $restaurant_photos->restaurant_photo_id, 
                        'photo_path' => Storage::url($restaurant_photos->photo_path)     
                    ];
                });
            }), 
        ];
    }
}
