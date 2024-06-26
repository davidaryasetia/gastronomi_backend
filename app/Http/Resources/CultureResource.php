<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CultureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'culture_id' => $this->culture_id, 
            'name_culture' => $this->name_culture, 
            'description' => $this->description, 
            'url_youtube' => $this->url_youtube, 
            'photo_path' => Storage::url($this->photo_path), 
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at, 
        ];
    }
}
