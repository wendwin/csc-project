<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('index', ['css'=> 'home.css']);
})->name('home');

// Perusahaan
Route::prefix('perusahaan')->group(function () {
    Route::get('/tentang', function () {
        return view('perusahaan.tentang', ['css' => 'css/perusahaan/tentang.css']);
    })->name('perusahaan.tentang');
    Route::get('/direksi', function () {
        return view('perusahaan.direksi', ['css' => 'css/perusahaan/direksi.css']);
    })->name('perusahaan.direksi');
    Route::get('/struktur_organisasi', function () {
        return view('perusahaan.struktur_organisasi', ['css' => 'css/perusahaan/struktur-organisasi.css']);
    })->name('perusahaan.struktur_organisasi');
    Route::get('/tata-kelola', function () {
        return view('perusahaan.tata-kelola', ['css' => 'css/perusahaan/tata-kelola.css']);
    })->name('perusahaan.tata-kelola');
});

// Layanan
Route::prefix('layanan')->group(function () {
    Route::get('/event_organizer', function () {
        return view('layanan.event_organizer', ['css' => 'css/layanan/event_organizer.css']);
    })->name('layanan.event_organizer');
    Route::get('/ketahanan_pangan', function () {
        return view('layanan.ketahanan_pangan', ['css' => 'css/layanan/ketahanan_pangan.css']);
    })->name('layanan.ketahanan_pangan');
    Route::get('/konstruksi', function () {
        return view('layanan.konstruksi', ['css' => 'css/layanan/konstruksi.css']);
    })->name('layanan.konstruksi');
});

// Klien dan Sejarah
Route::get('/klien', function () {
    return view('klien-sejarah/klien', ['css' => 'css/klien-sejarah/klien.css']);
})->name('klien');

Route::get('/sejarah', function () {
    return view('klien-sejarah/sejarah', ['css' => 'css/klien-sejarah/sejarah.css']);
})->name('sejarah');

Route::get('/karier', function () {
    return view('klien-sejarah/karier', ['css' => 'css/klien-sejarah/karier.css']);
})->name('karier');