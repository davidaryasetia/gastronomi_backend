<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodRestaurantResource;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodRestaurantController extends Controller
{
    public function index()
    {
        return FoodRestaurantResource::collection(Menu::with([
            'restaurants:restaurant_id,name_restaurant', 
            'foods:food_id,name,photo_path,category,description,food_historical,ingredients,url_youtube,directions,nutrition,address',
            'foods.photos:food_historical_photo_id,food_id,photo', 
            'foods.food_photos:food_photo_id,food_id,photo_path',
            'foods.tag_foods:tag_food_id,food_id,nametag', 
        ])->get());
    }
 
   public function show($id)
   {
    $foodRestaurant = Menu::with([
        'restaurants:restaurant_id,name_restaurant',
        'foods:food_id,name,photo_path,category,description,food_historical,ingredients,url_youtube,directions,nutrition,address', 
        'foods.photos:food_historical_photo_id,food_id,photo',
        'food.food_photos:food_photo_id,food_id,photo_path',
        'foods.tag_foods:tag_food_id,food_id,nametag', 
    ])->findOrFail($id);

    return new FoodRestaurantResource($foodRestaurant);
   }
}
