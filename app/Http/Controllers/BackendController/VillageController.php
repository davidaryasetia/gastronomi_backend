<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Village;
use App\Models\Village_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $village = Village::with('village_photos:village_photo_id,village_id,photo_path')->get();

        return view('sections.village.village', [
            'title' => 'Village',
            'village' => $village,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.village.create', [
            'title' => 'Add Village',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name_village' => 'required',
            'open_at' => 'required',
            'close_at' => 'required',
            'address' => 'required',
            'description' => 'required',
            'fasility' => 'required',
            'mandatory_equipment' => 'required',
            // 'contact' => 'nullable', 
            'photo_path' => 'nullable',
            'url_website' => 'required',
            'url_facebook' => 'required',
            'url_instagram' => 'required',
            'url_twitter' => 'required',
            'detail_village_photos.*' => 'nullable',
        ]);

        $village_photo = null;
        if ($request->hasFile('photo_path')) {
            $village_photo = $request->file('photo_path')->store('village_photo', 'public');
        }

        $data_village = [
            'name_village' => $request->input('name_village'),
            'open_at' => $request->input('open_at'),
            'close_at' => $request->input('close_at'),
            'address' => $request->input('address'),
            'description' => $request->input('description'),
            'fasility' => $request->input('fasility'),
            'mandatory_equipment' => $request->input('mandatory_equipment'),
            // 'contact' => $request->input('contact'), 
            'photo_path' => $village_photo,
            'url_website' => $request->input('url_website'),
            'url_facebook' => $request->input('url_facebook'),
            'url_instagram' => $request->input('url_instagram'),
            'url_twitter' => $request->input('url_twitter'),
        ];

        // Simpan Data 
        $insert_data_village = Village::create($data_village);

        // Simpan Data Village Photo
        if ($request->hasFile('detail_village_photos')) {
            foreach ($request->file('detail_village_photos') as $detail_village_photo) {
                $path = $detail_village_photo->store('detail_village_photo', 'public');
                Village_Photo::create([
                    'village_id' => $insert_data_village->village_id,
                    'photo_path' => $path,
                ]);
            }
        }

        if ($insert_data_village) {
            return redirect('/village')->with('success', 'Data Village Successfully Addedd !!!');
        } else {
            return redirect('/village')->with('error', 'Data Village Failed To Addedd !!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $village = Village::with([
            'village_photos:village_photo_id,village_id,photo_path',
        ])->findOrFail($id);

        return view('sections.village.detail', [
            'title' => 'Detail Village',
            'village' => $village,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $village = Village::with([
            'village_photos:village_photo_id,village_id,photo_path',
        ])->findOrFail($id);

        return view('sections.village.edit', [
            'title' => 'Edit Village',
            'village' => $village,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name_village' => 'required',
            'address' => 'required',
            'open_at' => 'required',
            'close_at' => 'required',
            'description' => 'required',
            'fasility' => 'required',
            'mandatory_equipment' => 'required',
            // 'contact' => 'nullable', 
            'photo_path' => 'nullable',
            'url_website' => 'nullable',
            'url_facebook' => 'nullable',
            'url_instagram' => 'nullable',
            'url_twitter' => 'nullable',

            'delete_village_photos' => 'nullable|string',
            'detail_village_photos.*' => 'nullable', 
        ]);

        $village = Village::findOrFail($id);

        $village->update([
            'name_village' => $request->input('name_village'),
            'address' => $request->input('address'),
            'open_at' => $request->input('open_at'),
            'close_at' => $request->input('close_at'),
            'description' => $request->input('description'),
            'fasility' => $request->input('fasility'),
            'mandatory_equipment' => $request->input('mandatory_equipment'),
            // 'contact' => $request->input('contact'),
            'url_website' => $request->input('url_website'),
            'url_facebook' => $request->input('url_facebook'),
            'url_instagram' => $request->input('url_instagram'),
            'url_twitter' => $request->input('url_twitter'),
        ]);

        // Check jika ada update Cover Photo 
        if ($request->hasFile('photo_path')) {
            if ($village->photo_path && Storage::exists('public/' . $village->photo_path)) {
                Storage::delete('public/' . $village->photo_path);
            }

            $filePath = $request->file('photo_path')->store('village_photo', 'public');
            $village->photo_path = $filePath;
            $village->save();
        }

        // Hapus Detail Village 
        if ($request->has('delete_village_photos')) {
            $delete_village_photos = json_decode($request->input('delete_village_photos'), true);

            if (is_array($delete_village_photos)) {
                foreach ($delete_village_photos as $photoId) {
                    $photo = Village_Photo::findOrFail($photoId);
                    if ($photo) {
                        Storage::delete('public/' . $photo->photo_path);
                        $photo->delete();
                    }
                }
            } else {
                return redirect('/village')->with('error', 'Invalid data format for delete detail photos');
            }
        }

        // Tambah Data Village
        if ($request->hasFile('detail_village_photos')){
            foreach($request->file('detail_village_photos') as $photo){
                $path = $photo->store('detail_village_photo', 'public');
                Village_Photo::create([
                    'village_id' => $village->village_id, 
                    'photo_path' => $path, 
                ]);
            }
        }

        if ($village) {
            return redirect('/village')->with('success', 'Data Village Successfully Updated !!!');
        } else {
            return redirect('/village')->with('error', 'Data Village Failed To Updated !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $village = Village::findOrFail($id);

        // Delete Photo Path
        if (!empty($village->photo_path)) {
            Storage::disk('public')->delete($village->photo_path);
        }

        // Hapus Detail Foto Juga
        foreach ($village->village_photos as $village_photo) {
            if (!empty($village_photo->photo_path)) {
                Storage::disk('public')->delete($village_photo->photo_path);
            }
            $village_photo->delete();
        }

        $village->delete();

        if ($village) {
            return redirect('/village')->with('success', 'Data Village Successfully Delete !!!');
        } else {
            return redirect('/village')->with('error', 'Data Village Failed To Delete !!!');
        }
    }
}
