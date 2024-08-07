<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Food_Historical_Photo;
use App\Models\Food_Photo;
use App\Models\Tag_Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
     * Suggestion Recomendation For Form
     */
    public function suggestion(Request $request)
    {
        $query = $request->get('query');
        $foods = Food::where('name', 'LIKE', "%{$query}%")->get();
        return response()->json($foods);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required|string',
            'photo_path' => 'nullable',
            'category' => 'required|string',
            'description' => 'required',
            'food_historical' => 'nullable',
            'ingredients' => 'required',
            'url_youtube' => 'nullable',
            'directions' => 'required',
            'nutrition' => 'required',
            'detail_historical_photos.*' => 'nullable',
            'detail_food_photos.*' => 'nullable',
            'tag_foods' => 'required',
        ]);

        $food_photo = null;
        if ($request->hasFile('photo_path')) {
            $food_photo = $request->file('photo_path')->store('food_photo', 'public');
        }


        $data_food = [
            'name' => $request->input('name'),
            'photo_path' => $food_photo,
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

        // Mengkorvesi tagify json ke array
        $tagArray = json_decode($validated['tag_foods'], true);
        if (!is_array($tagArray)) {
            return redirect()->back()->withErrors(['tag_foods' => 'Invalid format for tags.']);
        }

        // Simpan Data Tag Foods
        foreach ($tagArray as $tag) {
            Tag_Food::create([
                'food_id' => $insert_data_food->food_id,
                'nametag' => $tag['value'],
            ]);
        }

        // Simpan Foto Historical Food
        if ($request->hasFile('detail_historical_photos')) {
            foreach ($request->file('detail_historical_photos') as $detail_historical_photo) {
                $path = $detail_historical_photo->store('historical_food_photo', 'public');
                Food_Historical_Photo::create([
                    'food_id' => $insert_data_food->food_id,
                    'photo' => $path,
                ]);
            }
        }

        // Simpan Foto Detail Food
        if ($request->hasFile('detail_food_photos')) {
            foreach ($request->file('detail_food_photos') as $detail_food_photo) {
                $path = $detail_food_photo->store('detail_food_photo', 'public');
                Food_Photo::create([
                    'food_id' => $insert_data_food->food_id,
                    'photo_path' => $path,
                ]);
            }
        }

        if ($insert_data_food) {
            return redirect('/food')->with('success', 'Data Berhasil Di Tambahkan !!!');
        } else {
            return redirect('/food')->with('error', 'Data Gagal Di tambahkan !!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $food = Food::with([
            'photos:food_historical_photo_id,food_id,photo',
            'food_photos:food_photo_id,food_id,photo_path',
            'tag_foods:tag_food_id,food_id,nametag',
        ])->findOrFail($id);

        return view('sections.food.detail', [
            'title' => 'Detail Food',
            'food' => $food,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food = Food::with([
            'photos:food_historical_photo_id,food_id,photo',
            'food_photos:food_photo_id,food_id,photo_path',
            'tag_foods:tag_food_id,food_id,nametag',
        ])->findOrFail($id);

        return view('sections.food.edit', [
            'title' => 'Edit Data',
            'food' => $food,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'photo_path' => 'nullable', 
            'category' => 'required|string',
            'description' => 'required',
            'food_historical' => 'nullable',
            'ingredients' => 'required',
            'url_youtube' => 'nullable',
            'directions' => 'required',
            'nutrition' => 'required',

            'delete_historical_photos' => 'nullable|string',
            'detail_historical_photos.*' => 'nullable',

            'delete_food_photos' => 'nullable|string',
            'detail_food_photos.*' => 'nullable',
            
            'tag_foods' => 'required',
        ]);

        $food = Food::findOrFail($id);
        $food->update([
            'name' => $request->input('name'),
            // 'photo_path' => $request->input('photo_path'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'food_historical' => $request->input('food_historical'),
            'ingredients' => $request->input('ingredients'),
            'url_youtube' => $request->input('url_youtube'),
            'directions' => $request->input('directions'),
            'nutrition' => $request->input('nutrition'),
        ]);

        // Update Tags
        $tagArray = json_decode($validated['tag_foods'], true);
        if (!is_array($tagArray)) {
            return redirect()->back()->withErrors(['error' => 'Invalid Format A Tags']);
        }
        // Hapus Tag Lama
        Tag_Food::where('food_id', $food->food_id)->delete();

        // Simpan Tag Baru 
        foreach ($tagArray as $tag) {
            Tag_Food::create([
                'food_id' => $food->food_id,
                'nametag' => $tag['value'],
            ]);
        }

        // Check jika ada update Cover Photo
        if ($request->hasFile('photo_path')){
            if ($food->photo_path && Storage::exists('public/'. $food->photo_path)){
                Storage::delete('public/' . $food->photo_path);
            }

            $filePath = $request->file('photo_path')->store('food_photo', 'public');
            $food->photo_path = $filePath;
            $food->save();
        }

        // Hapus Foto Historical
        if ($request->has('delete_historical_photos')) {
            // Decode JSON string menjadi array
            $delete_historical_photos = json_decode($request->input('delete_historical_photos'), true);

            // Periksa apakah decoding berhasil dan apakah hasilnya adalah array
            if (is_array($delete_historical_photos)) {
                foreach ($delete_historical_photos as $photoId) {
                    $photo = Food_Historical_Photo::findOrFail($photoId);
                    if ($photo) {
                        Storage::delete('public/' . $photo->photo);
                        $photo->delete();
                    }
                }
            } else {
                return redirect('/food')->with('error', 'Invalid data format for delete historical photos');
            }
        }

        // Hapus Foto Detail Food 
        if ($request->has('delete_food_photos')){
            $delete_food_photos = json_decode($request->input('delete_food_photos'), true);

            if(is_array($delete_food_photos)){
                foreach($delete_food_photos as $photoId){
                    $photo = Food_Photo::findOrFail($photoId);
                    if($photo){
                        Storage::delete('public/' . $photo->photo_path);
                        $photo->delete();
                    }
                }
            } else {
                return redirect('/food')->with('error', 'Invalid data format for delete detail photos');
            }
        }

        // Tambah detail historical photos
        if ($request->hasFile('detail_historical_photos')) {
            foreach ($request->file('detail_historical_photos') as $photo) {
                $path = $photo->store('historical_food_photo', 'public');
                Food_Historical_Photo::create([
                    'food_id' => $food->food_id,
                    'photo' => $path,
                ]);
            }
        }

        // Tambah detail food
        if ($request->hasFile('detail_food_photos')){
            foreach($request->file('detail_food_photos') as $photo){
                $path = $photo->store('detail_food_photo', 'public');
                Food_Photo::create([
                    'food_id' => $food->food_id, 
                    'photo_path' => $path,
                ]);
            }
        }

        if ($food) {
            return redirect('/food')->with('success', 'Data Food berhasil Di Update !!!');
        } else {
            return redirect('/food')->with('error', 'Data Food Gagal Di Update !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $food = Food::findOrFail($id);

        // Delete Photo Path
        if (!empty($food->photo_path)) {
            Storage::disk('public')->delete($food->photo_path);
        }

        // Hapus Foto Food Historical 
        foreach ($food->photos as $photo) {
            if (!empty($photo->photo)) {
                Storage::disk('public')->delete($photo->photo);
            }
            $photo->delete();
        }

        // Hapus Foto Detail Food
        foreach ($food->food_photos as $food_photo) {
            if (!empty($food_photo->photo_path)) {
                Storage::disk('public')->delete($food_photo->photo_path);
            }
            $food_photo->delete();
        }

        // Hapus Tags Foods
        foreach ($food->tag_foods as $tag_food) {
            $tag_food->delete();
        }

        $food->delete();


        if ($food) {
            return redirect('/food')->with('success', 'Data Food Berhasil Dihapus !!!');
        } else {
            return redirect('/food')->with('error', 'Data Food Gagal Dihapus !!!');
        }
    }
}
