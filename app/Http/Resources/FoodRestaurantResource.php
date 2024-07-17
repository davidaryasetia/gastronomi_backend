<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodRestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'menu_id' => $this->menu_id, 
            'restaurant_id' => $this->restaurant_id, 
            'food_id' => $this->food_id,
            'restaurants' => $this->whenLoaded('restaurants', function(){
                return $this->restaurants->map(function($restaurant){
                    return [
                        'restaurant_id' => $restaurant->restaurant_id, 
                    ];
                });
            }), 
        ];
    }
}
