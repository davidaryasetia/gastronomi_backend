<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Food_Historical_Photo;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $food = Food::with('photos:food_historical_photo_id,food_id,photo')->get();

        return view('sections.food.food', [
            'title' => 'Food', 
            'food' => $food, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.food.create', [
            'title' => 'Add Food', 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'nutrition' => 'nullable', 
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

        if($food){
            return redirect('/food')->with('success', 'Data Food Successfully Added!!!!');
        } else {
            return redirect('/food')->with('error', 'Data Food Failed To Added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
