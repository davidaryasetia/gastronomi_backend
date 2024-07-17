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
            'name' => $this->name,
            'restaurants' => [
                'restaurant_id' => $this->restaurants->restaurant_id, 
                'name_restaurant' => $this->restaurants->name_restaurant, 
            ], 
            'foods' => new FoodResource($this->foods), 
        ];
    }
}
