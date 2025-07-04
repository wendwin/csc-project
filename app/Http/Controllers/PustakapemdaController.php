<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PustakapemdaController extends Controller
// <!-- RENDER VIEW WEB PUSTAKAPEMDA -->
// {{-- HANDLE BY ALDO OR FAISAL--}}
{
    public function index()
    {
         $cards = [
        [
            'title' => 'Jaringan Kemitraan Luas dan Terpercaya',
            'img' => '/img/pustakapemda/tata_kelola/jaringan.png',
            'text' => 'Lebih dari 10.000 desa di seluruh Indonesia telah menjadi mitra aktif kami.'
        ],
        [
            'title' => 'Fokus pada Peningkatan Kapasitas Aparatur Desa & Kecamatan',
            'img' => '/img/pustakapemda/tata_kelola/fokus.png',
            'text' => 'Kami memiliki spesialisasi dalam penyelenggaraan bimtek dan studi banding yang relevan dengan tantangan nyata di lapangan.'
        ],
        [
            'title' => 'Narasumber dan Fasilitator Profesional',
            'img' => '/img/pustakapemda/tata_kelola/narasumber.png',
            'text' => 'Didukung oleh tenaga ahli dari kementerian, akademisi, praktisi pemerintahan, serta tokoh-tokoh desa inspiratif yang memiliki pengalaman langsung di lapangan.'
        ],
        [
            'title' => 'Materi dan Metode Pelatihan Sesuai Kebutuhan',
            'img' => '/img/pustakapemda/tata_kelola/materi.png',
            'text' => 'Materi disusun secara kontekstual dan sesuai dengan regulasi terbaru serta praktik terbaik di bidang tata kelola keuangan dan pembangunan desa.'
        ],
        [
            'title' => 'Studi Banding di Lokasi Terpilih',
            'img' => '/img/pustakapemda/tata_kelola/studi.png',
            'text' => 'Lokasi studi banding dipilih dari desa-desa percontohan yang telah terbukti sukses.'
        ],
        [
            'title' => 'Komitmen terhadap Inovasi dan Pembaruan',
            'img' => '/img/pustakapemda/tata_kelola/komitmen.png',
            'text' => 'Kami terus mengikuti kebijakan terbaru, memanfaatkan teknologi desa, dan menerapkan pendekatan partisipatif serta transparan.'
        ],
        [
            'title' => 'Kolaborasi Lintas Sektor',
            'img' => '/img/pustakapemda/tata_kelola/kolaborasi.png',
            'text' => 'Kami bekerja sama dengan berbagai pihak untuk menciptakan dampak positif yang berkelanjutan.'
        ],
    ];

        return view('pustakapemda.index', compact('cards'));
    }
}
