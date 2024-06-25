<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Food::create([
            'name' => 'Plecing Kangkung', 
            'photo_path' => 'plecing.jpg', 
            'category' => 'tradisional food', 
            'description' => 'Kemunculan ayam taliwang sendiri pertama kali pada saat terjadi perang antara Kerajaan Selaparang dan Kerajaan Karangasem Bali. Pada masa itu pasukan Kerajaan Taliwang didatangkan ke Lombok untuk membantu Kerajaan Selaparang yang mendapat serangan dari kerajaan Karangasem Bali. Orang-orang Taliwang yang bertugas sebagai prajurit pendaman tersebut ditempatkan di suatu wilayah yang diberi nama Karang Taliwang sesuai dengan tempat mereka. Tugas orang-orang Taliwang ini adalah melakukan pendekatan dengan Raja Karangasem agar pertempuran yang menelan banyak kerugian warga dan harta benda tidak berlanjut. Dalam misi perdamaian itu ikut serta para pemuka Agama Islam, juru kuda dan juru masak. Masing-masing memiliki tugas tersendiri. Pemuka agama bertugas memberi tuntunan kehidupan kepada masyarakat dan melakukan pendekatan dengan Raja Karangasem. Juru kuda bertugas menjaga dan memelihara kuda. Juru masak bertugas menyiapkan logistik. Sejalan dengan tugas dan misi yang dijalankan, para juru masak dari Kerajaan Taliwang itu melakukan tugasnya dengan baik. Mereka mengolah dan memasak berbagai bahan makanan menjadi santapan para pemimpin perang beserta para prajurit. Salah satunya adalah pembuatan ayam bakar dengan campuran bumbu-bumbu tertentu sesuai selera dan tradisi masyarakat bersangkutan. Seiring berjalannya waktu para prajurit pun berbaur dengan masyarakat suku Sasak. Dari sosialisasi tersebut pada akhirnya suku Sasak bisa mencicipi enaknya ayam Taliwang dan mereka saling berbagi ilmu tentang cara pengolahannya dengan memanfaatkan bumbu-bumbu sederhana. Selain itu juga terjadi pembauran yang dominan adalah mengadopsi berbagai bentuk pengetahuan dan tatacara kehidupan sehari-hari. Misalnya pada pola makan dan pengolahan bahan makanan. Dalam hal pola makan dan jenis makanan yang diolah cenderung mengadopsi budaya masyarakat Sasak yang menyukai masakan pedas. Daging ayam diolah menjadi ayam pelalah dengan citarasa pedas. Ayam pelalah inilah yang menjadi cikal bakal dari ayam taliwang. Bumbu-bumbu yang digunakan berasal dari hasil alam sekitarnya seperti bawang merah, bawang putih, cabai, garam, dan terasi. Pada masa itu hasil olahan ayam merupakan makanan istimewa yang digunakan sebagai hidangan pada saat-saat tertentu dan hanya untuk pemenuhan konsumsi sendiri.', 
            'food_historical' => 'Kemunculan ayam taliwang sendiri pertama kali pada saat terjadi perang antara Kerajaan Selaparang dan Kerajaan Karangasem Bali. Pada masa itu pasukan Kerajaan Taliwang didatangkan ke Lombok untuk membantu Kerajaan Selaparang yang mendapat serangan dari kerajaan Karangasem Bali. Orang-orang Taliwang yang bertugas sebagai prajurit pendaman tersebut ditempatkan di suatu wilayah yang diberi nama Karang Taliwang sesuai dengan tempat mereka. Tugas orang-orang Taliwang ini adalah melakukan pendekatan dengan Raja Karangasem agar pertempuran yang menelan banyak kerugian warga dan harta benda tidak berlanjut. Dalam misi perdamaian itu ikut serta para pemuka Agama Islam, juru kuda dan juru masak. Masing-masing memiliki tugas tersendiri. Pemuka agama bertugas memberi tuntunan kehidupan kepada masyarakat dan melakukan pendekatan dengan Raja Karangasem. Juru kuda bertugas menjaga dan memelihara kuda. Juru masak bertugas menyiapkan logistik. Sejalan dengan tugas dan misi yang dijalankan, para juru masak dari Kerajaan Taliwang itu melakukan tugasnya dengan baik. Mereka mengolah dan memasak berbagai bahan makanan menjadi santapan para pemimpin perang beserta para prajurit. Salah satunya adalah pembuatan ayam bakar dengan campuran bumbu-bumbu tertentu sesuai selera dan tradisi masyarakat bersangkutan. Seiring berjalannya waktu para prajurit pun berbaur dengan masyarakat suku Sasak. Dari sosialisasi tersebut pada akhirnya suku Sasak bisa mencicipi enaknya ayam Taliwang dan mereka saling berbagi ilmu tentang cara pengolahannya dengan memanfaatkan bumbu-bumbu sederhana. Selain itu juga terjadi pembauran yang dominan adalah mengadopsi berbagai bentuk pengetahuan dan tatacara kehidupan sehari-hari. Misalnya pada pola makan dan pengolahan bahan makanan. Dalam hal pola makan dan jenis makanan yang diolah cenderung mengadopsi budaya masyarakat Sasak yang menyukai masakan pedas. Daging ayam diolah menjadi ayam pelalah dengan citarasa pedas. Ayam pelalah inilah yang menjadi cikal bakal dari ayam taliwang. Bumbu-bumbu yang digunakan berasal dari hasil alam sekitarnya seperti bawang merah, bawang putih, cabai, garam, dan terasi. Pada masa itu hasil olahan ayam merupakan makanan istimewa yang digunakan sebagai hidangan pada saat-saat tertentu dan hanya untuk pemenuhan konsumsi sendiri.', 
            'ingredients' => '<ul>
                                <li>750 gram ayam kampung</li>
                                <li>1,5 liter air</li>
                                <li>1 buah jeruk nipis</li>
                                <li>1 sdt gula pasir</li>
                                <li>1 sdt gula pasir</li>
                                <li>750 gram ayam kampung</li>
                                <li>1 buah jeruk nipis</li>
                                <li>garam secukupnya</li>
                                <li>1 sdt gula pasir</li>
                                <li>1 buah jeruk nipis</li>
                                <li>1 buah jeruk nipis</li>
                                <li>1 sdt gula pasir</li>
                                <li>1 buah jeruk nipis</li>
                                <li>1,5 liter air</li>
                                <li>750 gram ayam kampung</li>
                                <li>garam secukupnya</li>
                            </ul>', 
            'url_youtube' => 'https://www.youtube.com/watch?v=4_PMAZIqTF4', 
            'directions' => '<ul style="list-style-type: decimal;">
                <li>Siapkan bahan untuk membuat ayam taliwang.</li>
                <li>Tambahkan air sedikit.</li>
                <li>Setelah itu, tunggu sampai airnya menyusut dan daging ayam jadi empuk. Kecilkan api kompor, agar tidak terlalu gosong.</li>
                <li>Panggang potongan ayam yang telah diolesi mentega ± 10 menit untuk kedua sisinya.</li>
                <li>Oleskan dengan sedikit mentega atau minyak.</li>
                <li>Bakar ayam dengan grill pan atau teflon.</li>
                <li>Jika sudah, segera angkat dan letakkan ke dalam wadah.</li>
                <li>Setelah itu, tunggu sampai airnya menyusut dan daging ayam jadi empuk. Kecilkan api kompor, agar tidak terlalu gosong.</li>
                <li>Bumbui dengan gula dan garam secukupnya.</li>
                <li>Tambahkan air sedikit.</li>
                <li>Masak daging ayam dengan bumbu yang telah dimarinasi.</li>
                <li>Tumis bumbu yang sudah halus hingga mengeluarkan aroma harum.</li>
                <li>Siapkan minyak goreng.</li>
                <li>Haluskan dan tumis semua bumbu.</li>
                <li>Marinasi daging ayam dengan jeruk nipis.</li>
                <li>Cuci daging ayam hingga bersih, lalu tiriskan hingga kering.</li>
            </ul>', 
            'nutrition' => 'Kandungan gizi "Ayam taliwang, masakan" di bawah ini berdasarkan data Kemenkes RI, Tabel Komposisi Pangan Indonesia (TKPI). Jenis pangan: Olahan, Kode Baru: FP034 Kode Lama: -, Kelompok: Daging, Nama Inggris: Taliwang chicken, cooking. Komposisi (kandungan) gizi per 100 gram "ayam taliwang, masakan", dengan BDD = 100 % (Berat Dapat Dimakan), seperti berikut ini (urut abjad/huruf). Silakan klik gizi/vitamin/mineral yang berwarna biru untuk melihat manfaatnya serta bahan makanan yang mengandung gizi tersebut. Abu (Ash):1,5 gramAir (Water):57,5 gram, Besi (Fe), Ferrum, Iron:2,0 miligram, β-Karoten (Carotenes):-, Energi (Energy):264 Kalori, Fosfor (P), Phosphorus:164 miligram, Kalium (K), Potassium:408,0 miligram, Kalsium (Ca), Calcium:94 miligram, Karbohidrat (CHO):2,7 gram, Karoten total (Re):-, Lemak (Fat):20,1 gram, Natrium (Na), Sodium:507 miligram, Niasin, C6H5NO2, Niacin:-. Protein:18,2 gram, Retinol (vit A), C20H30O:1.067 mikrogram, Riboflavin (vitamin B2):-, Seng (Zn), Zinc:12,3 miligram, Serat (Fiber):-, Tembaga (Cu), Copper:0,40 miligram, Tiamina (vitamin B1):-, Vitamin C:-', 
            'address' => 'Lombok'
        ]);
    }
}
