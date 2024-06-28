<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CultureResource;
use App\Models\Culture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CultureController extends Controller
{
    public function index()
    {
        $culture = Culture::all();
         
        // Create JSON response
        $response = response()->json([
            'data' => CultureResource::collection($culture),
        ]);
        
        // Set CORS headers
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        return $response;
    }

    public function show($id)
    {
        $culture = Culture::findOrFail($id);
        return new CultureResource($culture);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_culture' => 'required', 
            'description' => 'required', 
            'url_youtube' => 'required', 
            'photo_path' => 'nullable', 
        ]);

        $culture_photo = $request->file('photo_path')->store('culture_photo','public');

        $culture = Culture::create([
            'name_culture' => $request->name_culture, 
            'description' => $request->description, 
            'url_youtube' => $request->url_youtube, 
            'photo_path' => $culture_photo, 
        ]);

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
