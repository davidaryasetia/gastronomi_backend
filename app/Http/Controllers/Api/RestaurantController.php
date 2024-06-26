<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use App\Models\Restaurant_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::all();
        return RestaurantResource::collection($restaurant->loadMissing('restaurant_photos:restaurant_photo_id,restaurant_id,photo_path'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('restaurant_photos:restaurant_photo_id,restaurant_id,photo_path')->findOrFail($id);
        return new RestaurantResource($restaurant->loadMissing('restaurant_photos:restaurant_photo_id,restaurant_id,photo_path'));
    }

   

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_restaurant' => 'required', 
            'description' => 'required', 
            'list_food' => 'required', 
            'list_drink' => 'required', 
            'address' => 'required', 
            'open_at' => 'required', 
            'close_at' => 'required', 
            'photo_path.*' => 'nullable',
        ]);

        $restaurant = Restaurant::create([
            'name_restaurant' => $request->name_restaurant, 
            'description' => $request->description, 
            'list_food' => $request->list_food, 
            'list_drink' => $request->list_drink, 
            'address' => $request->address, 
            'open_at' => $request->open_at, 
            'close_at' => $request->close_at, 
        ]);

        if($request->hasFile('photo_path')){
            foreach($request->file('photo_path') as $photo_path){
                $path = $photo_path->store('restaurant_photo', 'public');
                Restaurant_Photo::create([
                    'restaurant_id' => $restaurant->restaurant_id, 
                    'photo_path' => $path,
                ]);
            }
        }

        return new RestaurantResource($restaurant->loadMissing('restaurant_photos:restaurant_photo_id,restaurant_id,photo_path'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_restaurant' => 'required', 
            'description' => 'required', 
            'list_food' => 'required', 
            'list_drink' => 'required', 
            'address' => 'required', 
            'open_at' => 'required', 
            'close_at' => 'required', 
            'photo_path.*' => 'nullable',
        ]);

        $restaurant = Restaurant::findOrFail($id);

        $updateData = [
            'name_restaurant' => $request->name_restaurant, 
            'description' => $request->description, 
            'list_food' => $request->list_food, 
            'list_drink' => $request->list_drink, 
            'address' => $request->address, 
            'open_at' => $request->open_at, 
            'close_at' => $request->close_at,
        ];

        $restaurant->update($updateData);
        
        return new RestaurantResource($restaurant->load('restaurant_photos'));
    }

 

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        foreach($restaurant->restaurant_photos as $photo){
            Storage::disk('public')->delete($photo->photo_path);
            $photo->delete();
        }

        $restaurant_resource = new RestaurantResource($restaurant->loadMissing('restaurant_photos:restaurant_photo_id,restaurant_id,photo_path'));
        
        $restaurant->delete();
        
        return response()->json([
            'message' => 'Data Berhasil Dihapus', 
            'data' => $restaurant_resource, 
        ], 200);
    }
}
