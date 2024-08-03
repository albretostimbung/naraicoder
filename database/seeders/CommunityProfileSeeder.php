<?php

namespace Database\Seeders;

use App\Models\CommunityProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunityProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommunityProfile::create([
            'name' => 'Naraicoder',
            'about' => 'Narai Coder adalah komunitas non-profit bagi pegiat dan pembelajar Teknologi Informasi di Provinsi Kalimantan Tengah dengan visi menjadi wadah pengembangan minat dan bakat TI di Kalimantan Tengah.
NaraiCoder dibentuk sebagai wadah berkumpul dan berbagi wawasan para programmer/developer serta digital enthusiast di wilayah Kalimantan Tengah, juga berupaya untuk mengembangkan future tech talent di wilayah Kalteng dan sekitarnya.

Kegiatan yang telah dilakukan oleh NaraiCoder yaitu mengadakan webinar seputar programming dan dunia IT, pelatihan hardskill dan softskill dengan narasumber profesional dari berbagai perusahaan besar di Indonesia, lomba digital startup area Kalteng, menjadi jembatan talent dan recruiter serta pengembangan portfolio anggota member.

Naraicoder berharap bisa menjangkau peserta baik dari tingkat pemula hingga senior. Sehingga anggota komunitas ini tidak dibatasi latar belakang ataupun tingkat usia.',
            'social_media' => json_encode([
                'website' => 'https://naraicoder.org/',
                'instagram' => 'https://www.instagram.com/naraicoder',
                'telegram' => 'https://t.me/naraicoder',
                'email' => 'naraicoder@gmail.com',
            ]),
        ]);
    }
}
