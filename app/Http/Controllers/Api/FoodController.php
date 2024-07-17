<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use App\Models\Food_Historical_Photo;
use Database\Seeders\FoodHistoricalPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::all();
        return FoodResource::collection($food->loadMissing([
            'photos:food_historical_photo_id,food_id,photo', 
            'food_photos:food_photo_id,food_id,photo_path', 
            'tag_foods:tag_food_id,food_id,nametag'
        ]));
    }

    public function show($id)
    {
        $food = Food::with([
            'photos:food_historical_photo_id,food_id,photo', 
            'food_photos:food_photo_id,food_id,photo_path',
            'tag_foods:tag_food_id,food_id,nametag', 
            ])
            ->findOrFail($id);
        return new FoodResource($food); 
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required', 
            'photo_path' => 'nullable', 
            'category' => 'nullable|string', 
            'description' => 'required', 
            'food_historical' => 'required', 
            'ingredients' => 'required', 
            'url_youtube' => 'nullable', 
            'directions' => 'required', 
            'nutrition' => 'required', 
            'address' => 'nullable', 
            'photo.*' => 'nullable',
        ]);

        $food_photo = $request->file('photo_path')->store('food_photo','public');

        $food = Food::create([
            'name' => $request->name, 
            'photo_path' => $food_photo, 
            'category' => $request->category, 
            'description' => $request->description, 
            'food_historical' => $request->food_historical, 
            'ingredients' => $request->ingredients, 
            'url_youtube' => $request->url_youtube, 
            'directions' => $request->directions, 
            'nutrition' => $request->nutrition, 
            'address' => $request->address, 
        ]);

        // Simpan Foto Historical Food
        if($request->hasFile('photo')){
            foreach($request->file('photo') as $photo){
                $path = $photo->store('historical_food_photo', 'public');
                Food_Historical_Photo::create([
                    'food_id' => $food->food_id, 
                    'photo' => $path,
                ]);
            }
        }
    
        return new FoodResource($food->load('photos'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required', 
            'photo_path' => 'nullable', 
            'category' => 'nullable|string', 
            'description' => 'required', 
            'food_historical' => 'required', 
            'ingredients' => 'required', 
            'url_youtube' => 'nullable', 
            'directions' => 'required', 
            'nutrition' => 'required', 
            'address' => 'nullable', 
            'photo.*' => 'nullable', 
        ]);

        $food = Food::findOrFail($id);

        $updatedData = [
            'name' => $request->name, 
            'category' => $request->category, 
            'description' => $request->description, 
            'food_historical' => $request->food_historical, 
            'ingredients' => $request->ingredients, 
            'url_youtube' => $request->url_youtube, 
            'directions' => $request->directions, 
            'nutrition' => $request->nutrition, 
            'address' => $request->address, 
        ];

        if($request->hasFile('photo_path')){
            if($food->photo_path){
                Storage::disk('public')->delete($food->photo_path);
            }

            $food_photo = $request->file('photo_path')->store('food_photo','public');
            $updatedData['photo_path'] = $food_photo;
        }

        $food->update($updatedData);
        
        return new FoodResource($food->load('photos'));
    }


    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        
        if($food->photo_path){
            Storage::disk('public')->delete($food->photo_path);
        }

        // Hapus Foto Historical juga 
        foreach($food->photos as $photo){
            Storage::disk('public')->delete($photo->photo);
            $photo->delete();
        }

        $foodResource = new FoodResource($food->loadMissing('photos:food_historical_photo_id,food_id,photo'));

        $food->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus', 
            'data' => $foodResource
        ], 200);
    }

}
