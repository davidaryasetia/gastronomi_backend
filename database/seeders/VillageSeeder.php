<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Village::create([
            'name_village' => 'Desa Rendut Tutubhada', 
            'open_at' => '08:00:00', 
            'close_at' => '16:00:00', 
            'address' => 'Rendu, Tutubhada, Aesesa Selatan, Nagekeo Regency, East Nusa Tenggara', 
            'fasility' => 'Lokasi ini merupakan sebuah areal perkampungan adat yang di dalamnya terdapat rumah adat, batu persembahan dan area/lahan untuk melakukan tradisi adat berupa prosesi tinju adat sebagai luapan rasa syukur atas hasil panen. Perkampungan ditata sedemikian rupa, dimana areal perkampungan (yang juga dijadikan sebagai arena tinju tradisional) dibuat memanjang berbentuk persegi membujur dari arah utara ke selatan. Areal ini dibatasi dengan pemasangan tumpukan batu-batu sedemikian rupa yang berfungsi sebagai pembatas. Rumah-rumah adat dibangun mengitari areal perkampungan dengan arah hadap ke tengah. Rumah pokok dari perkampungan ini dibangun di sisi utara menghadap ke pintu masuk perkampungan. Di areal perkampungan terdapat beberapa buah makam, salah satunya makam leluhur yang dianggap sebagai pemersatu kampung, yang dibangun tepat di depan rumah adat pokok.', 
            'mandatory_equipment' => 'This location is a traditional village area in which there are traditional houses, offering stones and areas/land for carrying out traditional traditions in the form of traditional boxing processions as an overflow of gratitude for the harvest. The village is laid out in such a way, where the village area (which is also used as a traditional boxing arena) is made elongated in a rectangular shape from north to south. This area is limited by the installation of piles of stones in such a way that functions as a barrier. Traditional houses are built around the village area facing the center. The main house of this village is built on the north side facing the village entrance. In the village area, there are several graves, one of which is the ancestral grave which is considered to unify the village, which was built right in front of the main traditional house.', 
            'contact' => '02340283042', 
            'url_website' => 'https://kebudayaan.kemdikbud.go.id/bpcbbali/situs-kampung-adat-tutubhada/', 
            'url_facebook' => 'facebook.com', 
            'url_instagram' => 'instagram.com', 
            'url_twitter' => 'twitter.com', 
        ]);
    }
}
