<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleImage;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $authors = ['Pustaka Pemda', 'CSC Admin', 'PSPI Admin'];
        $targets = ['pustaka-pemda', 'csc', 'pspi'];
        $categories = ['Berita', 'Pengumuman', 'Info', 'Artikel Umum', 'Workshop'];

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


        for ($i = 1; $i <= 25; $i++) {
            $article = Article::create([
                'title' => "Judul Artikel ke-$i",
                'author' => $authors[array_rand($authors)],
                'category' => $categories[array_rand($categories)],
                'target_website' => $targets[array_rand($targets)],
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
