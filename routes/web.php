<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PustakapemdaController;
use App\Http\Controllers\PspiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Website cendanasolution.test. tidak perlu ada perubahn lagi kecuali nanti ada perubahn berita content  dari  be. handle by faisal
|--------------------------------------------------------------------------
*/
Route::domain('cendanasolution.test')->group(function () {

    Route::get('/', fn() => view('index', ['css'=> 'home.css']))->name('home');

    Route::prefix('perusahaan')->group(function () {
        Route::get('/tentang', fn() => view('perusahaan.tentang', ['css' => 'css/perusahaan/tentang.css']))->name('perusahaan.tentang');
        Route::get('/direksi', fn() => view('perusahaan.direksi', ['css' => 'css/perusahaan/direksi.css']))->name('perusahaan.direksi');
        Route::get('/struktur_organisasi', fn() => view('perusahaan.struktur_organisasi', ['css' => 'css/perusahaan/struktur-organisasi.css']))->name('perusahaan.struktur_organisasi');
        Route::get('/tata-kelola', fn() => view('perusahaan.tata-kelola', ['css' => 'css/perusahaan/tata-kelola.css']))->name('perusahaan.tata-kelola');
    });

    Route::prefix('layanan')->group(function () {
        Route::get('/event_organizer', fn() => view('layanan.event_organizer', ['css' => 'css/layanan/event_organizer.css']))->name('layanan.event_organizer');
        Route::get('/ketahanan_pangan', fn() => view('layanan.ketahanan_pangan', ['css' => 'css/layanan/ketahanan_pangan.css']))->name('layanan.ketahanan_pangan');
        Route::get('/konstruksi', fn() => view('layanan.konstruksi', ['css' => 'css/layanan/konstruksi.css']))->name('layanan.konstruksi');
    });

    Route::prefix('program')->group(function () {
        Route::get('/koperasi_desa', fn() => view('klien-sejarah/kopdes', ['css' => 'css/klien-sejarah/kopdes.css']))->name('koperasi_desa');
    });

    Route::get('/klien', fn() => view('klien-sejarah/klien', ['css' => 'css/klien-sejarah/klien.css']))->name('klien');
    Route::get('/sejarah', fn() => view('klien-sejarah/sejarah', ['css' => 'css/klien-sejarah/sejarah.css']))->name('sejarah');
    Route::get('/karier', fn() => view('klien-sejarah/karier', ['css' => 'css/klien-sejarah/karier.css']))->name('karier');
    Route::get('/berita', fn() => view('klien-sejarah/berita', ['css' => 'css/klien-sejarah/berita.css']))->name('berita');
    Route::get('/csr', fn() => view('klien-sejarah/csr', ['css' => 'css/klien-sejarah/csr.css']))->name('csr');
    Route::get('/hubungi', fn() => view('klien-sejarah/hubungi', ['css' => 'css/klien-sejarah/hubungi.css']))->name('hubungi');
});

/*
|--------------------------------------------------------------------------
| Website pustakapemda.test handle bay aldo
|--------------------------------------------------------------------------
*/
Route::domain('pustakapemda.test')->group(function () {
    Route::get('/', [PustakapemdaController::class, 'index'])->name('website2.home');
    // Tambahkan route lain untuk website pustakapemda disni
});

/*
|--------------------------------------------------------------------------
| Website pspi.test handle by faisal
|--------------------------------------------------------------------------
*/
Route::domain('pspi.test')->group(function () {
    Route::get('/', [PspiController::class, 'index'])->name('website3.home');
    // Tambahkan route lain untuk website pspi disni
});

/*
|--------------------------------------------------------------------------
| Dashboard/Admin Panel: dashboard.test handle by putra
|--------------------------------------------------------------------------
*/
Route::domain('dashboard.test')->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/auth/login', [AuthController::class, 'doLogin'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });
});



// Route::get('/', function () {
//     return view('index', ['css'=> 'home.css']);
// })->name('home');

// // Perusahaan
// Route::prefix('perusahaan')->group(function () {
//     Route::get('/tentang', function () {
//         return view('perusahaan.tentang', ['css' => 'css/perusahaan/tentang.css']);
//     })->name('perusahaan.tentang');
//     Route::get('/direksi', function () {
//         return view('perusahaan.direksi', ['css' => 'css/perusahaan/direksi.css']);
//     })->name('perusahaan.direksi');
//     Route::get('/struktur_organisasi', function () {
//         return view('perusahaan.struktur_organisasi', ['css' => 'css/perusahaan/struktur-organisasi.css']);
//     })->name('perusahaan.struktur_organisasi');
//     Route::get('/tata-kelola', function () {
//         return view('perusahaan.tata-kelola', ['css' => 'css/perusahaan/tata-kelola.css']);
//     })->name('perusahaan.tata-kelola');
// });

// // Layanan
// Route::prefix('layanan')->group(function () {
//     Route::get('/event_organizer', function () {
//         return view('layanan.event_organizer', ['css' => 'css/layanan/event_organizer.css']);
//     })->name('layanan.event_organizer');
//     Route::get('/ketahanan_pangan', function () {
//         return view('layanan.ketahanan_pangan', ['css' => 'css/layanan/ketahanan_pangan.css']);
//     })->name('layanan.ketahanan_pangan');
//     Route::get('/konstruksi', function () {
//         return view('layanan.konstruksi', ['css' => 'css/layanan/konstruksi.css']);
//     })->name('layanan.konstruksi');
// });

// // Program
// Route::prefix('program')->group(function () {
//     Route::get('/koperasi_desa', function () {
//         return view('klien-sejarah/kopdes', ['css' => 'css/klien-sejarah/kopdes.css']);
//     })->name('koperasi_desa');
// });

// // Klien dan Sejarah
// Route::get('/klien', function () {
//     return view('klien-sejarah/klien', ['css' => 'css/klien-sejarah/klien.css']);
// })->name('klien');

// Route::get('/sejarah', function () {
//     return view('klien-sejarah/sejarah', ['css' => 'css/klien-sejarah/sejarah.css']);
// })->name('sejarah');

// Route::get('/karier', function () {
//     return view('klien-sejarah/karier', ['css' => 'css/klien-sejarah/karier.css']);
// })->name('karier');

// Route::get('/berita', function () {
//     return view('klien-sejarah/berita', ['css' => 'css/klien-sejarah/berita.css']);
// })->name('berita');

// Route::get('/csr', function () {
//     return view('klien-sejarah/csr', ['css' => 'css/klien-sejarah/csr.css']);
// })->name('csr');

// Route::get('/hubungi', function () {
//     return view('klien-sejarah/hubungi', ['css' => 'css/klien-sejarah/hubungi.css']);
// })->name('hubungi');