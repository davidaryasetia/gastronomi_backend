<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use App\Models\Food_Historical_Photo;
use App\Models\Food_Photo;
use App\Models\Tag_Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::with([
            'photos:food_historical_photo_id,food_id,photo',
            'food_photos:food_photo_id,food_id,photo_path',
            'tag_foods:tag_food_id,food_id,nametag',
        ])->get();

        return FoodResource::collection($food);
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
            'detail_historical_photos.*' => 'nullable', 
            'detail_food_photos.*' => 'nullable',
            'tag_foods.*' => 'nullable', 
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
        ]);

        // Simpan Foto Historical Food
        if($request->hasFile('detail_historical_photos')){
            foreach($request->file('detail_historical_photos') as $detail_historical_photo){
                $path = $detail_historical_photo->store('historical_food_photo', 'public');
                Food_Historical_Photo::create([
                    'food_id' => $food->food_id, 
                    'photo' => $path,
                ]); 
            }
        }

        // Simpan Foto Detail Food
        if($request->hasFile('detail_food_photos')){
            foreach($request->file('detail_food_photos') as $detail_food_photo){
                $path = $detail_food_photo->store('detail_food_photo', 'public');
                Food_Photo::create([
                    'food_id' => $food->food_id,
                    'photo_path' => $path,  
                ]);
            }
        }

        // Simpan Data Tag 
        if($request->has('tag_foods')){
            foreach($request->input('tag_foods') as $tag){
                Tag_Food::create([
                    'food_id' => $food->food_id, 
                    'nametag' => $tag,
                ]);
            }
        }
    
        return new FoodResource($food);
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

        // Hapus Foto Food 
        foreach($food->food_photos as $food_photo){
            Storage::disk('public')->delete($food_photo->photo_path);
            $food_photo->delete();
        }

        // Hapus Tags Foods 
        foreach($food->tag_foods as $tag_food){
            $tag_food->delete();
        }

        $foodResource = new FoodResource($food->loadMissing('photos:food_historical_photo_id,food_id,photo'));

        $food->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus', 
            'data' => $foodResource
        ], 200);
    }
}
