<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Food_Historical_Photo;
use App\Models\Food_Photo;
use App\Models\Tag_Food;
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
        // dd($request->all());
        if ($request->hasFile('detail_historical_photos')) {
            $files = $request->file('detail_historical_photos');
            dd($files); // Menampilkan file yang diunggah
        } else {
            dd('No files uploaded');
        }
        $validated = $request->validate([
            'name' => 'required|string',
            // 'photo_path' => 'nullable', 
            'category' => 'required|string',
            'description' => 'required',
            'food_historical' => 'nullable',
            'ingredients' => 'required',
            'url_youtube' => 'nullable',
            'directions' => 'required',
            'nutrition' => 'required',
            'detail_historical_photos.*' => 'nullable|image',
            // // 'detail_food_photos.*' => 'nullable',
            'tag_foods' => 'required',
        ]);

        dd($request->file('detail_historical_photos'));
        // Mengkorvesi tagify json ke array
        $tagArray = json_decode($validated['tag_foods'], true);

        if (!is_array($tagArray)) {
            return redirect()->back()->withErrors(['tag_foods' => 'Invalid format for tags.']);
        }

        // $food_photo = $request->file('photo_path')->store('food_photo', 'public');

        $data_food = [
            'name' => $request->input('name'),
            // 'photo_path' => $food_photo, 
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'food_historical' => $request->input('food_historical'),
            'ingredients' => $request->input('ingredients'),
            'url_youtube' => $request->input('url_youtube'),
            'directions' => $request->input('directions'),
            'nutrition' => $request->input('nutrition'),
        ];

        // Simpan Data
        $insert_data_food = Food::create($data_food);

        // Simpan Data Tag Foods
        foreach ($tagArray as $tag) {
            Tag_Food::create([
                'food_id' => $insert_data_food->food_id,
                'nametag' => $tag['value'],
            ]);
        }

        if ($insert_data_food) {
            return redirect('/food')->with('success', 'Data Berhasi Insert');
        } else {
            return redirect('/food')->with('error', 'Sukses Upload Data');
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
