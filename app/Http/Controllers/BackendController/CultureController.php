<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Culture_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CultureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $culture = Culture::get();

        return view('sections.culture.culture', [
            'title' => 'Culture',
            'culture' => $culture,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.culture.create', [
            'title' => 'Add Culture',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $validated = $request->validate([
            'name_culture' => 'required',
            'description' => 'required',
            'url_youtube' => 'required',
            'photo_path' => 'nullable',
            'detail_culture_photos.*' => 'nullable',
        ]);

        $food_photo = null;
        if ($request->hasFile('photo_path')) {
            $food_photo = $request->file('photo_path')->store('culture_photo', 'public');
        }

        $data_culture = [
            'name_culture' => $request->input('name_culture'),
            'description' => $request->input('description'),
            'url_youtube' => $request->input('url_youtube'),
            'photo_path' => $food_photo,
        ];

        // Simpan Data 
        $insert_data_culture = Culture::create($data_culture);

        // Simpan Detail Culture Photo
        if ($request->hasFile('detail_culture_photos')) {
            foreach ($request->file('detail_culture_photos') as $detail_culture_photo) {
                $path = $detail_culture_photo->store('detail_culture_photo', 'public');
                Culture_Photo::create([
                    'culture_id' => $insert_data_culture->culture_id,
                    'photo_path' => $path,
                ]);
            }
        }

        if ($insert_data_culture) {
            return redirect('/culture')->with('success', 'Data Culture Successfully Added !!!');
        } else {
            return redirect('/culture')->with('error', 'Data Culture Failed To AddeddS');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $culture = Culture::with([
            'culture_photos:culture_photo_id,culture_id,photo_path',
        ])->findOrFail($id);

        return view('sections.culture.detail', [
            'title' => 'Detail Data',
            'culture' => $culture,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $culture = Culture::with([
            'culture_photos:culture_photo_id,culture_id,photo_path',
        ])->findOrFail($id);

        return view('sections.culture.edit', [
            'title' => 'Detail Data',
            'culture' => $culture,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name_culture' => 'required', 
            'url_youtube' => 'required', 
            'description' => 'required', 
            'photo_path' => 'nullable',

            'delete_culture_photos' => 'nullable|string', 
            'detail_culture_photos.*' => 'nullable', 
        ]);

        $culture = Culture::findOrFail($id);
        $culture->update([
            'name_culture' => $request->input('name_culture'), 
            'url_youtube' => $request->input('url_youtube'), 
            'description' => $request->input('description'), 
        ]);

        // Check jika ada update Cover Photo
        if ($request->hasFile('photo_path')){
            if ($culture->photo_path && Storage::exists('public/' . $culture->photo_path)){
                Storage::delete('public/' . $culture->photo_path);
            }

            $filePath = $request->file('photo_path')->store('culture_photo', 'public');
            $culture->photo_path = $filePath;
            $culture->save();
        }

        // Hapus Detail Culture
        if ($request->has('delete_culture_photos')){
            $delete_culture_photos = json_decode($request->input('delete_culture_photos'), true);

            if(is_array($delete_culture_photos)){
                foreach($delete_culture_photos as $photoId){
                    $photo = Culture_Photo::findOrFail($photoId);
                    if($photo){
                        Storage::delete('public/' . $photo->photo_path);
                        $photo->delete();
                    }
                }
            } else {
                return redirect('/culture')->with('error', 'Invalid data format for delete detail photos');
            }
        }


        // Tambah Culture Photo 
        if ($request->hasFile('detail_culture_photos')){
            foreach ($request->file('detail_culture_photos') as $photo){
                $path = $photo->store('detail_culture_photo', 'public');
                Culture_Photo::create([
                    'culture_id' => $culture->culture_id, 
                    'photo_path' => $path, 
                ]);
            }
        }

        if($culture){
            return redirect('/culture')->with('success', 'Data Culture Successfully Updated !!!');
        } else {
            return redirect('/culture')->with('error', 'Data Culture Faied To Update !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $culture = Culture::findOrFail($id);

        if(!empty($culture->photo_path)){
            Storage::disk('public')->delete($culture->photo_path);
        }

        // Hapus Foto
        foreach($culture->culture_photos as $culture_photo){
            if(!empty($culture_photo->photo_path)){
                Storage::disk('public')->delete($culture_photo->photo_path);
            }
            $culture_photo->delete();
        }

        $culture->delete();

        if ($culture) {
            return redirect('/culture')->with('success', 'Data Culture Successfully Deleted !!!');
        } else {
            return redirect('/culture')->with('error', 'Data Food Failed To Delete !!!');
        }

    }
}
