<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleImage;
use App\Models\Poster;
use Hashids\Hashids;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


class PustakapemdaController extends Controller
// <!-- RENDER VIEW WEB PUSTAKAPEMDA -->
// {{-- HANDLE BY ALDO OR FAISAL--}}
{
 
    public function getKategoriLayanan()
    {
        return Article::select('category')->distinct()->pluck('category');
    }
    
    public function index(Request $request)
    {
        $hashids = new Hashids('pustakapemda_salt_rahasia', 8);
        $carouselItems = Article::where('author', 'admin-pustaka-pemda')
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

        $bimbingan_teknis->setCollection(
        $bimbingan_teknis->getCollection()->map(function ($item)use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                return $item;
            })
        );
        
        $workshop_seminar = Article::where('author', 'admin-pustaka-pemda')
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
        
        
        $galeri_pelatihan = Article::where('author', 'admin-pustaka-pemda')
                            ->paginate(8);

        $galeri_pelatihan->setCollection(
        $galeri_pelatihan->getCollection()->map(function ($item)use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                return $item;
            })
        );

        $posters = Poster::where('target_website', 'pustaka-pemda')
                ->latest()
                ->paginate(5);

        

        if ($request->ajax() && ($request->has('section') || $request->has('pagination'))) {
            if ($request->get('section') === 'workshop') {
                return view('pustakapemda-components.landingpage.workshop_seminar', compact('workshop_seminar'))->render();
            }
        
            if ($request->get('section') === 'bimtek') {
                return view('pustakapemda-components.landingpage.bimbingan-teknis', compact('bimbingan_teknis'))->render();
            }
        
            if ($request->get('section') === 'galeri') {
                return view('pustakapemda-components.landingpage.galeri-pelatihan', compact('galeri_pelatihan'))->render();
            }
        
            // Pagination untuk berita
            if ($request->has('pagination')) {
                return view('pustakapemda-components.landingpage.berita-terbaru', compact('berita_terbaru'))->render();
            }
        }

        

        return view('pustakapemda.index', compact(
            'cards', 
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
        $hashids = new Hashids('pustakapemda_salt_rahasia', 8);
        $parts = explode('-', $id_slug);
        $id_encrypt = $parts[0];

        $decoded = $hashids->decode($id_encrypt);
        $id = $decoded[0] ?? null;
        $berita = Article::findOrFail($id);
        $gambars = ArticleImage::where('article_id', $id)->get();
        $kategori_layanan = $this->getKategoriLayanan();
        $selected_category = $berita->category; 

        return view('pustakapemda-components.landingpage.detail_berita', compact('berita','gambars', 'kategori_layanan','selected_category'));
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
        return view('pustakapemda.profil', compact('tentangItems'));
    }

    public function layanan(Request $request, $kategori = null)
    {
        $hashids = new Hashids('pustakapemda_salt_rahasia', 8);
        $kategori_layanan = $this->getKategoriLayanan();
        $selected_category = $kategori ?? $kategori_layanan[0];

        $layanan_select = Article::where('category', $selected_category)
                                ->where('author', 'admin-pustaka-pemda')
                                ->latest()
                                ->paginate(4);
        $layanan_select->setCollection(
                        $layanan_select->getCollection()->map(function ($item)use ($hashids) {
                                    $item->id_encrypt = $hashids->encode($item->id);
                                    $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                                    return $item;
                                })
                            );

        $posters = Poster::where('target_website', 'pustaka-pemda')
                ->latest()
                ->paginate(4);

        if ($request->ajax()) {
            return view('pustakapemda-components.landingpage.layanan_select', compact('layanan_select'))->render();
        }

        return view('pustakapemda.layanan', compact('layanan_select', 'kategori_layanan', 'selected_category','posters'));
    }

    public function kontak()
    {

        return view('pustakapemda.kontak');
    }
    public function search(Request $request)
    {
        $hashids = new Hashids('pustakapemda_salt_rahasia', 8);    
        $keyword = $request->get('query');

        $results = Article::where('title', 'like', '%' . $keyword . '%')
            ->where('target_website', 'pustaka-pemda')
            ->limit(5)
            ->get(['id', 'title']);
        $results->transform(function ($item) use ($hashids) {
            $item->id_encrypt = $hashids->encode($item->id);
            $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
            return $item;
        });
        return response()->json($results);
    }
}
