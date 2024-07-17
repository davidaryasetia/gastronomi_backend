<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodRestaurantResource;
use App\Models\Menu;
use Illuminate\Http\Request;

class FoodRestaurantController extends Controller
{
    public function index()
    {
        $foodRestaurant = Menu::all();
        return FoodRestaurantResource::collection($foodRestaurant->loadMissing([
            'restaurants:restaurant_id,name_restaurant', 
            'foods:food_id,name', 
        ]));  
    }
}
