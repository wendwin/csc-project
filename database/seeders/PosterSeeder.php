<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poster;

class PosterSeeder extends Seeder
{
    public function run()
    {

        $kategoriPerTarget = [
           'pustaka-pemda',
           'pspi',
           'csc',
        ];

        for ($i = 1; $i <= 20; $i++) {
        Poster::create([
            'title' => 'Poster ' . $i,
            'image_path' => '/img/asean-bac.jpg',
            'target_website' => $kategoriPerTarget[array_rand($kategoriPerTarget)],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        }


    }
}