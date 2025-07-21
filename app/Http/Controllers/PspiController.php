<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleImage;
use App\Models\Poster;
use Hashids\Hashids;
use Illuminate\Support\Str;
class PspiController extends Controller
// <!-- RENDER HOME WEB PSPI -->
// {{-- HANDLE BY ALDO OR FAISAL--}}
{
    public function getKategoriLayanan()
    {
        return Article::where('target_website', 'pspi')
                    ->select('category')
                    ->distinct()
                    ->pluck('category');
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

         $cardsKeunggulan = [
        [
            'title' => 'Spesialisasi di Sektor Pemerintahan',
            'img' => '/img/pspi/landingpage/keunggulan/spesialisasi.png',
            'text' => 'Fokus dan pengalaman kami sepenuhnya tertuju pada kebutuhan pelatihan dan sertifikasi di lingkungan OPD hingga desa.'
        ],
        [
            'title' => 'Pendekatan Berbasis Kebutuhan Nyata',
            'img' => '/img/pspi/landingpage/keunggulan/pendekatan.png',
            'text' => 'Program kami disusun berdasarkan hasil analisis lapangan dan masukan langsung dari stakeholder pemerintahan.'
        ],
        [
            'title' => 'Kemitraan Luas dan Teruji',
            'img' => '/img/pspi/landingpage/keunggulan/kemitraan.png',
            'text' => 'Kami telah bekerja sama dengan berbagai instansi daerah dan desa di berbagai provinsi, menjadikan PSPI sebagai mitra yang dikenal dan dipercaya.'
        ],
        [
            'title' => 'Tim Ahli dan Fasilitator Berpengalaman',
            'img' => '/img/pspi/landingpage/keunggulan/timAhli.png',
            'text' => 'PSPI didukung oleh tenaga profesional dari kalangan akademisi, praktisi pemerintahan, serta asesor bersertifikat nasional.'
        ],
        [
            'title' => 'Sertifikasi berstandar nasional',
            'img' => '/img/pspi/landingpage/keunggulan/sertifikasi.png',
            'text' => 'Proses pelatihan dan sertifikasi yang kami selenggarakan sesuai dengan standar BNSP dan regulasi nasional lainnya.'
        ],
        [
            'title' => 'Fleksibilitas Pelaksanaan',
            'img' => '/img/pspi/landingpage/keunggulan/fleksibilitas.png',
            'text' => 'Dapat disesuaikan dengan kebutuhan instansi, baik secara luring, daring, maupun hybrid.'
        ],
        [
            'title' => 'Komitmen Pada Transformasi Nyata',
            'img' => '/img/pspi/landingpage/keunggulan/komitmen.png',
            'text' => 'Lebih dari sekadar pelatihan, kami mendorong terjadinya perubahan perilaku kerja dan peningkatan kinerja organisasi secara berkelanjutan.'
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
        
        $berita_terbaru = Article::where('author', 'admin-pspi')
                         ->latest()
                         ->paginate(5);
        
        $berita_terbaru->setCollection(
        $berita_terbaru->getCollection()->map(function ($item)use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                return $item;
            })
        );

        $bimbingan_teknis = Article::where('author', 'admin-pspi')
                         ->where('category', 'Bimbingan Teknis (Bimtek)')
                         ->latest()
                         ->paginate(5);

        $bimbingan_teknis->setCollection(
        $bimbingan_teknis->getCollection()->map(function ($item)use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                return $item;
            })
        );
        
        $workshop_seminar = Article::where('author', 'admin-pspi')
                            ->where('category', 'Workshop dan Seminar Tematik')
                            ->latest()
                            ->paginate(5);
        
        $workshop_seminar->setCollection(
        $workshop_seminar->getCollection()->map(function ($item)use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                return $item;
            })
        );
        
        
        $galeri_pelatihan = Article::where('author', 'admin-pspi')
                            ->paginate(8);

        $galeri_pelatihan->setCollection(
        $galeri_pelatihan->getCollection()->map(function ($item)use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                return $item;
            })
        );

        $posters = Poster::where('target_website', 'pspi')
                ->latest()
                ->paginate(5);

        

        if ($request->ajax() && ($request->has('section') || $request->has('pagination'))) {
            if ($request->get('section') === 'workshop') {
                return view('pspi-components.landingpage.workshop_seminar', compact('workshop_seminar'))->render();
            }
        
            if ($request->get('section') === 'bimtek') {
                return view('pspi-components.landingpage.bimbingan-teknis', compact('bimbingan_teknis'))->render();
            }
        
            if ($request->get('section') === 'galeri') {
                return view('pspi-components.landingpage.galeri-pelatihan', compact('galeri_pelatihan'))->render();
            }
        
            // Pagination untuk berita
            if ($request->has('pagination')) {
                return view('pspi-components.landingpage.berita-terbaru', compact('berita_terbaru'))->render();
            }
        }

        

        return view('pspi.index', compact(
            'cardsKeunggulan', 
            'carouselItems', 
            'tentangItems',
            'berita_terbaru', 
            'kategori_layanan', 
            'bimbingan_teknis',
            'workshop_seminar',
            'galeri_pelatihan',
            'posters'
        ));
    }
        public function detail_berita($id_slug)
    {
        $hashids = new Hashids('pspi_salt_rahasia', 8);
        $parts = explode('-', $id_slug);
        $id_encrypt = $parts[0];

        $decoded = $hashids->decode($id_encrypt);
        $id = $decoded[0] ?? null;
        $berita = Article::findOrFail($id);
        $gambars = ArticleImage::where('article_id', $id)->get();
        $kategori_layanan = $this->getKategoriLayanan();
        $selected_category = $berita->category; 

        return view('pspi-components.landingpage.detail_berita', compact('berita','gambars', 'kategori_layanan','selected_category'));
    }
    public function profil()
    {
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
        return view('pspi.profil', compact('tentangItems'));
    }
    public function layanan(Request $request, $kategori = null)
    {
        $hashids = new Hashids('pspi_salt_rahasia', 8);
        $kategori_layanan = $this->getKategoriLayanan();
        $selected_category = $kategori ?? $kategori_layanan[0];

        $layanan_select = Article::where('category', $selected_category)
                                ->where('author', 'admin-pspi')
                                ->latest()
                                ->paginate(4);
        $layanan_select->setCollection(
                        $layanan_select->getCollection()->map(function ($item)use ($hashids) {
                                    $item->id_encrypt = $hashids->encode($item->id);
                                    $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                                    return $item;
                                })
                            );

        $posters = Poster::where('target_website', 'pspi')
                ->latest()
                ->paginate(4);

        if ($request->ajax()) {
            return view('pspi-components.layanan.layanan_select', compact('layanan_select'))->render();
        }

        return view('pspi.layanan', compact('layanan_select', 'kategori_layanan', 'selected_category','posters'));
    }
    public function kontak()
    {

        return view('pspi.kontak');
    }
}
