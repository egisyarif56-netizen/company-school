<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     
     */
    public function index()
    {
        $kepalaSekolah = [
            'nama' => 'Drs. Mulya Murprihartono, M.Si',
            'jabatan' => 'Kepala SMKN 4 KOTA BOGOR',
            'sambutan' => 'Assalamu\'alaikum warahmatullahi wabarakatuh. Selamat datang di '
                . 'website resmi SMKN 4 KOTA BOGOR. Puji syukur kami panjatkan kehadirat Tuhan Yang '
                . 'Maha Esa atas segala limpahan rahmat-Nya, sehingga sekolah kami dapat terus '
                . 'berkembang dan berkontribusi dalam mencetak generasi muda yang unggul, '
                . 'kompeten, dan berkarakter. Kami berkomitmen memberikan pendidikan vokasi '
                . 'terbaik agar setiap lulusan siap menghadapi dunia kerja maupun melanjutkan '
                . 'pendidikan ke jenjang yang lebih tinggi.',
        ];

        $sejarah = [
            'paragraf' => [
                'SMKN 4 KOTA BOGOR didirikan dengan tujuan menyediakan pendidikan kejuruan '
                    . 'berkualitas bagi masyarakat sekitar. Sejak awal berdiri, sekolah ini '
                    . 'terus berkembang baik dari segi jumlah siswa, program keahlian, '
                    . 'maupun fasilitas penunjang pembelajaran.',
                'Hingga saat ini, SMKN 4 KOTA BOGOR telah meluluskan ribuan siswa yang tersebar '
                    . 'di berbagai bidang industri, dunia usaha, dan dunia kerja, serta '
                    . 'terus berinovasi mengikuti perkembangan teknologi dan kebutuhan '
                    . 'dunia industri masa kini.',
            ],
            'caption_foto' => '',
        ];

        $visiMisi = [
            'visi' => 'Menjadi lembaga pendidikan kejuruan unggulan yang menghasilkan '
                . 'lulusan kompeten, mandiri, berdaya saing global, dan berakhlak mulia.',
            'misi' => [
                'Menyelenggarakan pendidikan dan pelatihan berbasis kompetensi sesuai '
                    . 'kebutuhan dunia usaha dan dunia industri.',
                'Mengembangkan sarana dan prasarana pembelajaran yang relevan dengan '
                    . 'perkembangan teknologi terkini.',
                'Membangun karakter siswa yang disiplin, jujur, dan bertanggung jawab.',
                'Menjalin kerja sama aktif dengan dunia industri dan masyarakat.',
            ],
        ];

        // Data-data di atas dikirim ke view resources/views/profil.blade.php
        return view('profil', compact('kepalaSekolah', 'sejarah', 'visiMisi'));
    }
}
