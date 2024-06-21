<?php

namespace Database\Seeders;

use App\Models\Food_Historical;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodHistoricalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Food_Historical::create([
            'food_id' => 1, 
            'description' => 'Kemunculan ayam taliwang sendiri pertama kali pada saat terjadi perang antara Kerajaan Selaparang dan Kerajaan Karangasem Bali. Pada masa itu pasukan Kerajaan Taliwang didatangkan ke Lombok untuk membantu Kerajaan Selaparang yang mendapat serangan dari kerajaan Karangasem Bali. Orang-orang Taliwang yang bertugas sebagai prajurit pendaman tersebut ditempatkan di suatu wilayah yang diberi nama Karang Taliwang sesuai dengan tempat mereka. Tugas orang-orang Taliwang ini adalah melakukan pendekatan dengan Raja Karangasem agar pertempuran yang menelan banyak kerugian warga dan harta benda tidak berlanjut. Dalam misi perdamaian itu ikut serta para pemuka Agama Islam, juru kuda dan juru masak. Masing-masing memiliki tugas tersendiri. Pemuka agama bertugas memberi tuntunan kehidupan kepada masyarakat dan melakukan pendekatan dengan Raja Karangasem. Juru kuda bertugas menjaga dan memelihara kuda. Juru masak bertugas menyiapkan logistik. Sejalan dengan tugas dan misi yang dijalankan, para juru masak dari Kerajaan Taliwang itu melakukan tugasnya dengan baik. Mereka mengolah dan memasak berbagai bahan makanan menjadi santapan para pemimpin perang beserta para prajurit. Salah satunya adalah pembuatan ayam bakar dengan campuran bumbu-bumbu tertentu sesuai selera dan tradisi masyarakat bersangkutan. Seiring berjalannya waktu para prajurit pun berbaur dengan masyarakat suku Sasak. Dari sosialisasi tersebut pada akhirnya suku Sasak bisa mencicipi enaknya ayam Taliwang dan mereka saling berbagi ilmu tentang cara pengolahannya dengan memanfaatkan bumbu-bumbu sederhana. Selain itu juga terjadi pembauran yang dominan adalah mengadopsi berbagai bentuk pengetahuan dan tatacara kehidupan sehari-hari. Misalnya pada pola makan dan pengolahan bahan makanan. Dalam hal pola makan dan jenis makanan yang diolah cenderung mengadopsi budaya masyarakat Sasak yang menyukai masakan pedas. Daging ayam diolah menjadi ayam pelalah dengan citarasa pedas. Ayam pelalah inilah yang menjadi cikal bakal dari ayam taliwang. Bumbu-bumbu yang digunakan berasal dari hasil alam sekitarnya seperti bawang merah, bawang putih, cabai, garam, dan terasi. Pada masa itu hasil olahan ayam merupakan makanan istimewa yang digunakan sebagai hidangan pada saat-saat tertentu dan hanya untuk pemenuhan konsumsi sendiri.', 
        ]);
    }
}
