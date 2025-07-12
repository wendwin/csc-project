<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleImage;

class ArticleSeeder extends Seeder
{
    public function run()
    {

        $authors = [
            'pustaka-pemda' => 'admin-pustaka-pemda',
            'csc' => 'admincsc',
            'pspi' => 'admin-pspi',
        ];

        $kategoriPerTarget = [
            'csc' => [
                'Event Organizer',
                'Ketahanan Pangan',
                'Konstruksi',
            ],
            'pustaka-pemda' => [
                'Bimbingan Teknis (Bimtek)',
                'Pengelolaan Keuangan Desa (APBDes, Dana Desa, dll.)',
                'Perencanaan dan Pelaporan Pembangunan Desa',
                'Pelatihan Penyusunan RPJMDes dan RKPDes',
                'Manajemen Aset Desa',
                'Digitalisasi Administrasi Desa',
                'Studi Banding',
                'Kunjungan ke desa-desa percontohan',
                'Pertukaran pengalaman dan pembelajaran praktik terbaik',
                'Pemantapan inovasi pelayanan publik desa',
                'Workshop dan Seminar Tematik',
                'Inovasi tata kelola pemerintahan digital',
                'Peningkatan kapasitas leadership kepala desa dan perangkatnya',
            ],
            'pspi' => [
                'Bimbingan Teknis',
                'Pengelolaan Keuangan Desa (APBDes, Dana Desa, dll.)',
                'Perencanaan dan Pelaporan Pembangunan Desa',
                'Pelatihan Penyusunan RPJMDes dan RKPDes',
                'Manajemen Aset Desa',
                'Digitalisasi Administrasi Desa',
                'Studi Banding',
                'Kunjungan ke desa-desa percontohan',
                'Pertukaran pengalaman dan pembelajaran praktik terbaik',
                'Pemantapan inovasi pelayanan publik desa',
                'Workshop dan Seminar Tematik',
                'Inovasi tata kelola pemerintahan digital',
                'Peningkatan kapasitas leadership kepala desa dan perangkatnya',
            ],
        ];

        $konten = "
            <p><strong>Digitalisasi informasi</strong> menjadi kunci penting dalam mendukung transparansi dan efisiensi layanan publik. Dengan pemanfaatan teknologi, penyampaian informasi kini dapat dilakukan secara cepat, tepat, dan menjangkau masyarakat luas. Programmer adalah seorang profesional yang menulis, menguji, dan memelihara kode perangkat lunak. Mereka menggunakan berbagai bahasa pemrograman untuk menciptakan aplikasi, sistem, dan perangkat lunak yang membantu memecahkan masalah dan memenuhi kebutuhan pengguna.</p>
            
            <p>Berikut manfaat digitalisasi informasi:</p>
            <ul>
                <li>Meningkatkan efisiensi dan kecepatan akses informasi.</li>
                <li>Mempermudah transparansi antar lembaga dan publik.</li>
                <li>Mendorong partisipasi masyarakat dalam pembangunan.</li>
                <li>Setelah menulis kode, mereka melakukan pengujian untuk memastikan bahwa perangkat lunak berfungsi dengan baik dan bebas dari bug.</li>
                <li>Programmer juga bertanggung jawab untuk memperbarui dan memperbaiki perangkat lunak yang sudah ada agar tetap relevan dan aman.</li>
            </ul>

            <p>Oleh karena itu, <strong>instansi pemerintah</strong> maupun organisasi harus terus berinovasi dalam menyediakan konten yang <em>informatif</em>, akurat, dan mudah diakses oleh semua kalangan. Programmer memainkan peran penting dalam dunia teknologi saat ini. Dengan keterampilan dan pengetahuan yang tepat, mereka dapat menciptakan solusi yang mengubah cara kita berinteraksi dengan teknologi. Jika Anda tertarik untuk menjadi programmer, mulailah belajar bahasa pemrograman dan terlibat dalam proyek pengembangan perangkat lunak!</p>
        ";


        for ($i = 1; $i <= 12; $i++) {
            // Acak target website
            $target = array_rand($kategoriPerTarget);

            // Ambil random kategori dari target yang dipilih
            $category = $kategoriPerTarget[$target][array_rand($kategoriPerTarget[$target])];

            // Ambil author berdasarkan target
            $author = $authors[$target];


            $article = Article::create([
                'title' => "Judul Artikel ke-$i",
                'author' => $author,
                'category' => $category,
                'target_website' => $target,
                'content' => $konten,
                'main_image' => '/img/asean-bac.jpg',
            ]);

            for ($j = 1; $j <= 4; $j++) {
                $article->images()->create([
                    'image_path' => "article-images/$j.png"
                ]);
            }
        }
    }
}
