<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'name_restaurant' => 'Restaurant Pelecik Kangkung', 
            'description' => 'Restaurant tempat makan plecik kangkung khas NTT, daerah Labuan Mapin.', 
            'list_food' => '<ul>
                            <li>Ayam Taliwang</li>
                            <li>Plecing Kangkung</li>
                            <li>Sate Rembiga</li>
                            <li>Sate Pusut</li>
                            <li>Bebalung</li>
                            <li>Ares</li>
                            <li>Kelaq Batih</li>
                            <li>Kelaq Lebui</li>
                            <li>Nasi Balap Puyung</li>
                            <li>Nasi Kotaraja</li>
                            <li>Sayur Kelor</li>
                            <li>Poteng Jaje Tujak</li>
                            <li>Beberuk Terong</li>
                            <li>Tum Ayam</li>
                            <li>Sayur Asem</li>
                            </ul>
                            ',
        'list_drink' => '<ul>
                            <li>Es Kelapa Muda</li>
                            <li>Es Teh Manis</li>
                            <li>Es Jeruk</li>
                            <li>Es Campur</li>
                            <li>Es Cincau Hijau</li>
                            <li>Es Dawet Ayu</li>
                            <li>Es Kopyor</li>
                            <li>Jus Buah Segar (misalnya jus jeruk, jus apel, atau jus mangga)</li>
                            <li>Kopi Lombok (kopi dengan citarasa khas Lombok)</li>
                            <li>Wedang Jahe (minuman jahe hangat)</li>
                        </ul>', 
        'address' => 'Labuan Mapin, Kec. Alas Bar., Kabupaten Sumbawa, Nusa Tenggara Barat. 84464', 
        'open_at' => '08:00:00', 
        'close_at' => '22:00:00', 
        ]);
    }
}
