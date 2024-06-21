<?php

namespace Database\Seeders;

use App\Models\Village_Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillagePhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Village_Photo::create([
            'village_id' => 1, 
            'photo_path' => 'village1.jpg', 
        ]);
        Village_Photo::create([
            'village_id' => 1, 
            'photo_path' => 'village2.jpg', 
        ]);
    }
}
