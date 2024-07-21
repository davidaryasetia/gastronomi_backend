<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Restaurant_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::with([
            'restaurant_photos:restaurant_photo_id,restaurant_id,photo_path',
            'menus:menu_id,restaurant_id,food_id,name,type_food,is_traditional',
            'menus.foods:food_id,name,category',
        ])->get();
        return RestaurantResource::collection($restaurant);
    }

    public function show($id)
    {
        $restaurant = Restaurant::with([
            'restaurant_photos:restaurant_photo_id,restaurant_id,photo_path', 
            'menus:menu_id,restaurant_id,food_id,name,type_food,is_traditional', 
            'menus.foods:food_id,name,category', 
            ])->findOrFail($id);
            
        return new RestaurantResource($restaurant);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_restaurant' => 'required',
            'description' => 'required',
            'photo_path' => 'nullable',
            'address' => 'required',
            'open_at' => 'required',
            'close_at' => 'required',
            'detail_restaurant_photos.*' => 'nullable',
            'menus.*.name' => 'nullable',
            'menus.*.type_food' => 'nullable', 
            'menus.*.is_traditional' => 'nullable', 
        ]);

        $restaurant_photo = $request->file('photo_path')->store('restaurant_photo','public');

        $restaurant = Restaurant::create([
            'name_restaurant' => $request->name_restaurant,
            'description' => $request->description,
            'photo_path' => $restaurant_photo, 
            'address' => $request->address,
            'open_at' => $request->open_at,
            'close_at' => $request->close_at,
        ]);
        
        // Simpan Data Detail Foto Restaurant
        if ($request->hasFile('detail_restaurant_photos')) {
            foreach ($request->file('detail_restaurant_photos') as $detail_restaurant_photo) {
                $path = $detail_restaurant_photo->store('detail_restaurant_photo', 'public');
                Restaurant_Photo::create([
                    'restaurant_id' => $restaurant->restaurant_id,
                    'photo_path' => $path,
                ]);
            }
        }

        
        // Simpan Data Restaurant 
        if ($request->has('menus')){
            foreach ($request->input('menus') as $menu){
                Menu::create([
                    'restaurant_id' => $restaurant->restaurant_id, 
                    'name' => $menu['food_id'], 
                    'type_food' => $menu['type_food'], 
                    'is_traditional' => $menu['is_traditional'],
                ]);
            }
        }

    return new RestaurantResource($restaurant);
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

        foreach ($restaurant->restaurant_photos as $photo) {
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
