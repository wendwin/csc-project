<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleImage;
use Hashids\Hashids;
use Illuminate\Support\Str;
class PspiController extends Controller
// <!-- RENDER HOME WEB PSPI -->
// {{-- HANDLE BY ALDO OR FAISAL--}}
{
    public function getKategoriLayanan()
    {
        return Article::select('category')->distinct()->pluck('category');
    }
    
    public function index(Request $request)
    {
        $hashids = new Hashids('pspi_salt_rahasia', 8);
        $carouselItems = Article::where('author', 'admin-pspi')
            ->latest()
            ->take(3) 
            ->get()
            ->map(function ($item) use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                return $item;
            });

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

    $tentangItems = [
        [
            'image' => '/img/asean-bac.jpg',
        ],
        [
            'image' => '/img/g20.jpg',
        ],
        [
            'image' => '/img/expo-2020-dubai.jpg',
        ],
    ];

    $kategori_layanan = $this->getKategoriLayanan();

    // $berita_terbaru = [
    //     [
    //         'image' => '/img/asean-bac.jpg',
    //         'title' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V.6, SEKDA Balikpapan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '27/06/2025',
    //         'description' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V. 6, SEKDA Balikpapan Penyusunan dokumen kontrak melibatkan beberapa langkah penting, mulai dari...',
    //     ],
    //     [
    //         'image' => '/img/asean-bac.jpg',
    //         'title' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V.6, SEKDA Balikpapan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '27/06/2025',
    //         'description' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V. 6, SEKDA Balikpapan Penyusunan dokumen kontrak melibatkan beberapa langkah penting, mulai dari...',
    //     ],
    //     [
    //         'image' => '/img/asean-bac.jpg',
    //         'title' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V.6, SEKDA Balikpapan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '27/06/2025',
    //         'description' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V. 6, SEKDA Balikpapan Penyusunan dokumen kontrak melibatkan beberapa langkah penting, mulai dari...',
    //     ],
    // ];

    // $bimbingan_teknis = [
    //     [
    //         'image' => '/img/g20.jpg',
    //         'title' => 'Pameran G20: Inovasi Global untuk Masa Depan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '15/06/2025',
    //         'description' => 'Acara G20 memperlihatkan komitmen negara-negara dalam menghadapi tantangan global...',
    //     ],
    //     [
    //         'image' => '/img/asean-bac.jpg',
    //         'title' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V.6, SEKDA Balikpapan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '27/06/2025',
    //         'description' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V. 6, SEKDA Balikpapan Penyusunan dokumen kontrak melibatkan beberapa langkah penting, mulai dari...',
    //     ],
    //     [
    //         'image' => '/img/asean-bac.jpg',
    //         'title' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V.6, SEKDA Balikpapan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '27/06/2025',
    //         'description' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V. 6, SEKDA Balikpapan Penyusunan dokumen kontrak melibatkan beberapa langkah penting, mulai dari...',
    //     ],
    // ];


    // $workshop_seminar = [
    //     [
    //         'image' => '/img/g20.jpg',
    //         'title' => 'Pameran G20: Inovasi Global untuk Masa Depan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '15/06/2025',
    //         'description' => 'Acara G20 memperlihatkan komitmen negara-negara dalam menghadapi tantangan global...',
    //     ],
    //     [
    //         'image' => '/img/asean-bac.jpg',
    //         'title' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V.6, SEKDA Balikpapan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '27/06/2025',
    //         'description' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V. 6, SEKDA Balikpapan Penyusunan dokumen kontrak melibatkan beberapa langkah penting, mulai dari...',
    //     ],
    //     [
    //         'image' => '/img/asean-bac.jpg',
    //         'title' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V.6, SEKDA Balikpapan',
    //         'publisher' => 'Pustaka Pemda',
    //         'date' => '27/06/2025',
    //         'description' => 'Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V. 6, SEKDA Balikpapan Penyusunan dokumen kontrak melibatkan beberapa langkah penting, mulai dari...',
    //     ],
    // ];
        
        $berita_terbaru = Article::where('author', 'admin-pustaka-pemda')
                         ->latest()
                         ->paginate(5);
        
        $berita_terbaru->setCollection(
        $berita_terbaru->getCollection()->map(function ($item)use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                return $item;
            })
        );

        $bimbingan_teknis = Article::where('author', 'admin-pustaka-pemda')
                         ->where('category', 'Bimbingan Teknis (Bimtek)')
                         ->latest()
                         ->paginate(5);

        $workshop_seminar = Article::where('author', 'admin-pustaka-pemda')
                         ->where('category', 'Workshop dan Seminar Tematik')
                         ->latest()
                         ->paginate(5);

        $galeri_pelatihan = Article::where('author', 'admin-pustaka-pemda')
                         ->paginate(8);


        if ($request->ajax()) {
            if ($request->get('section') === 'workshop') {
                return view('pspi-components.landingpage.workshop_seminar', compact('workshop_seminar'))->render();
            }

            if ($request->get('section') === 'bimtek') {
                return view('pspi-components.landingpage.bimbingan-teknis', compact('bimbingan_teknis'))->render();
            }

            if ($request->get('section') === 'galeri') {
                return view('pspi-components.landingpage.galeri-pelatihan', compact('galeri_pelatihan'))->render();
            }
        
            return view('pspi-components.landingpage.berita-terbaru', compact('berita_terbaru'))->render();
        }

        

        return view('pspi.index', compact(
            'cards', 
            'carouselItems', 
            'tentangItems',
            'berita_terbaru', 
            'kategori_layanan', 
            'bimbingan_teknis',
            'workshop_seminar',
            'galeri_pelatihan',
        ));
    }
}
