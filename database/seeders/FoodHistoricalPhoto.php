<?php

namespace Database\Seeders;

use App\Models\Food_Historical;
use App\Models\Food_Historical_Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodHistoricalPhoto extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Food_Historical_Photo::create([
            'food_historical_id' => 1, 
            'photo' => 'foto_1.jpg', 
        ]);
        Food_Historical_Photo::create([
            'food_historical_id' => 1, 
            'photo' => 'foto_2.jpg', 
        ]);
        Food_Historical_Photo::create([
            'food_historical_id' => 1, 
            'photo' => 'foto_3.jpg', 
        ]);
    }
}
