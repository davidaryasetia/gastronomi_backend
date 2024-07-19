<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CultureResource;
use App\Models\Culture;
use App\Models\Culture_Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CultureController extends Controller
{
    public function index()
    {
        $culture = Culture::with('culture_photos:culture_photo_id,culture_id,photo_path')->get();
        return CultureResource::collection($culture);
    }

    public function show($id)
    {
        $culture = Culture::with('culture_photos:culture_photo_id,culture_id,photo_path')->findOrFail($id);
        return new CultureResource($culture);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_culture' => 'required', 
            'description' => 'required', 
            'url_youtube' => 'required', 
            'photo_path' => 'nullable',
            'detail_photo_path.*' => 'nullable',
        ]);

        $culture_photo = $request->file('photo_path')->store('culture_photo','public');

        $culture = Culture::create([
            'name_culture' => $request->name_culture, 
            'description' => $request->description, 
            'url_youtube' => $request->url_youtube, 
            'photo_path' => $culture_photo, 
            
        ]);

        // Simpan Detail Foto Culture
        if ($request->hasFile('detail_photo_path')){
            foreach ($request->file('detail_photo_path') as $detail_photo_path){
                $path = $detail_photo_path->store('detail_culture_photo', 'public');
                Culture_Photo::create([
                    'culture_id' => $culture->culture_id, 
                    'photo_path' => $path, 
                ]);
            }
        }

        return new CultureResource($culture);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name_culture' => 'required', 
            'description' => 'required', 
            'url_youtube' => 'required', 
            'photo_path' => 'nullable',  
        ]);

        $culture = Culture::findOrFail($id);

        $updatedCulture = [
            'name_culture' => $request->name_culture, 
            'description' => $request->description, 
            'url_youtube' => $request->url_youtube, 
        ];

        if($request->hasFile('photo_path')){
            if($culture->photo_path){
                Storage::disk('public')->delete($culture->photo_path);
            }

            $culture_photo = $request->file('photo_path')->store('culture_photo','public');
            $updatedCulture['photo_path'] = $culture_photo;
        }

        $culture->update($updatedCulture);

        return new CultureResource($culture);
    }

    public function destroy($id)
    {
        $culture = Culture::findOrFail($id);
        
        if($culture->photo_path){
            Storage::disk('public')->delete($culture->photo_path);
        }

        $cultureResource = new CultureResource($culture);

        $culture->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus', 
            'data' => $cultureResource,  
        ], 200);
    }

    
}
