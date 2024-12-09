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
    Route::get('/ringkasan', function () {
        return view('layanan.ringkasan', ['css' => 'css/layanan/ringkasan.css']);
    })->name('layanan.ringkasan');
    Route::get('/pameran', function () {
        return view('layanan.pameran', ['css' => 'css/layanan/pameran.css']);
    })->name('layanan.pameran');
    Route::get('/konferensi', function () {
        return view('layanan.konferensi', ['css' => 'css/layanan/konferensi.css']);
    })->name('layanan.konferensi');
    Route::get('/acara_khusus', function () {
        return view('layanan.acara_khusus', ['css' => 'css/layanan/acara_khusus.css']);
    })->name('layanan.acara_khusus');
});