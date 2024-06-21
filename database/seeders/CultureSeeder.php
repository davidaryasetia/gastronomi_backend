<?php

namespace Database\Seeders;

use App\Models\Culture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CultureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Culture::create([
           'name_culture' => 'Gendang Beleq', 
           'description' => 'Gendang beleq adalah alat musik tradisional yang dimainkan secara berkelompok, di indonesia', 
           'url_youtube' => 'https://www.youtube.com/watch?v=LQZukeWPkVg', 
           'photo_path' => 'gendang.jpg',  
        ]);
        Culture::create([
           'name_culture' => 'Upacara Rebo Bontong', 
           'description' => 'Kebudayaan ini merupakan ritual adat masyarakat Pringgabaya yang dilaksanakan sekali dalam setahun khususnya oleh masyarakat Pringgabaya. Kegiatan ini berupa mandi Safar atau mandi bersih agar terhindar dari penyakit.', 
           'url_youtube' => 'https://www.youtube.com/watch?v=LQZukeWPkVg', 
           'photo_path' => 'rebo.jpg',  
        ]);
        Culture::create([
           'name_culture' => 'Tari Tendang Mendet', 
           'description' => 'Tari Tendang Mendet adalah seni yang berbentuk tarian dan masih dilestarikan hingga sekarang. Tari Tendang Mendet biasanya dimainkan oleh belasan orang yang diiringi dengan Gendang Beleq. Tarian ini dapat dikatakan sebagai sambutan ataupun tanda terimakasih yang ditunjukkan melalui bentuk tarian-tarian di Suku Sasak.', 
           'url_youtube' => 'https://www.youtube.com/watch?v=LQZukeWPkVg', 
           'photo_path' => 'tari.jpg',  
        ]);
    }
}
