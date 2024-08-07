<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VillageResource;
use App\Models\Village;
use App\Models\Village_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VillageController extends Controller
{
    public function index()
    {
        $village = Village::with('village_photos:village_photo_id,village_id,photo_path')->get();
        return VillageResource::collection($village);
    }

    public function show($id)
    {
        $village = Village::with('village_photos:village_photo_id,village_id,photo_path')->findOrFail($id);
        return new VillageResource($village);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_village' => 'required',
            'open_at' => 'required',
            'close_at' => 'required',
            'address' => 'required',
            'description' => 'required', 
            'fasility' => 'required',
            'mandatory_equipment' => 'required',
            'contact' => 'required',
            'photo_path' => 'nullable', 
            'url_website' => 'nullable',
            'url_facebook' => 'nullable',
            'url_instagram' => 'nullable',
            'url_twitter' => 'nullable',
            'detail_photo_path.*' => 'nullable',
        ]);

        $village_photo = $request->file('photo_path')->store('village_photo','public');

        $village = Village::create([
            'name_village' => $request->name_village,
            'open_at' => $request->open_at,
            'close_at' => $request->close_at,
            'address' => $request->address,
            'description' => $request->description,
            'fasility' => $request->fasility,
            'mandatory_equipment' => $request->mandatory_equipment,
            'contact' => $request->contact,
            'photo_path' => $village_photo, 
            'url_website' => $request->url_website,
            'url_facebook' => $request->url_facebook,
            'url_instagram' => $request->url_instagram,
            'url_twitter' => $request->url_twitter,
        ]);

        // Simpan Foto Village
        if ($request->hasFile('detail_photo_path')) {
            foreach ($request->file('detail_photo_path') as $detail_photo_path) {
                $path = $detail_photo_path ->store('detail_village_photo', 'public');
                Village_Photo::create([
                    'village_id' => $village->village_id,
                    'photo_path' => $path,
                ]);
            }
        }

        return new VillageResource($village->load('village_photos'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_village' => 'required',
            'open_at' => 'required',
            'close_at' => 'required',
            'address' => 'required',
            'fasility' => 'required',
            'mandatory_equipment' => 'required',
            'contact' => 'required',
            'url_website' => 'nullable',
            'url_facebook' => 'nullable',
            'url_instagram' => 'nullable',
            'url_twitter' => 'nullable',
        ]);

        $village = Village::findOrFail($id);

        $updatedData = [
            'name_village' => $request->name_village,
            'open_at' => $request->open_at,
            'close_at' => $request->close_at,
            'address' => $request->address,
            'fasility' => $request->fasility,
            'mandatory_equipment' => $request->mandatory_equipment,
            'contact' => $request->contact,
            'url_website' => $request->url_website,
            'url_facebook' => $request->url_facebook,
            'url_instagram' => $request->url_instagram,
            'url_twitter' => $request->url_twitter,
        ];

        $village->update($updatedData);

        return new VillageResource($village->loadMissing('village_photos'));
    }

    public function destroy($id)
    {
        $village = Village::findOrFail($id);

        if ($village->photo_path){
            Storage::disk('public')->delete($village->photo_path);
        }

        // Hapus Foto di Village Photo
        foreach ($village->village_photos as $village_photo) {
            Storage::disk('public')->delete($village_photo->photo_path);
            $village_photo->delete();
        }

        $villageResource = new VillageResource($village->loadMissing('village_photos:village_photo_id,photo_path'));

        $village->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus',
            'data' => $villageResource
        ], 200);
    }
}
