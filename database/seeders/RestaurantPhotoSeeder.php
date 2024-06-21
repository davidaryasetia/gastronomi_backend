<?php

namespace Database\Seeders;

use App\Models\Restaurant_Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant_Photo::create([
            'restaurant_id' => 1, 
            'photo_path' => 'restaurant1.jpg', 
        ]);
        Restaurant_Photo::create([
            'restaurant_id' => 1, 
            'photo_path' => 'restaurant2.jpg', 
        ]);
    }
}
