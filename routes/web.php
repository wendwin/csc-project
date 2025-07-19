<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PustakapemdaController;
use App\Http\Controllers\PspiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PosterController;

/*
|--------------------------------------------------------------------------
| Website cendanasolution.test. tidak perlu ada perubahn lagi kecuali nanti ada perubahn berita content  dari  be. handle by faisal
|--------------------------------------------------------------------------
*/
Route::domain('cendanasolution.test')->group(function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // ───── PERUSAHAAN ─────
    Route::prefix('perusahaan')->group(function () {
        Route::get('/tentang', [HomeController::class, 'tentang'])->name('perusahaan.tentang');
        Route::get('/direksi', [HomeController::class, 'direksi'])->name('perusahaan.direksi');
        Route::get('/struktur_organisasi', [HomeController::class, 'strukturOrganisasi'])->name('perusahaan.struktur_organisasi');
        Route::get('/tata-kelola', [HomeController::class, 'tataKelola'])->name('perusahaan.tata-kelola');
    });

    // ───── LAYANAN ─────
    Route::prefix('layanan')->group(function () {
        Route::get('/event_organizer', [HomeController::class, 'eventOrganizer'])->name('layanan.event_organizer');
        Route::get('/ketahanan_pangan', [HomeController::class, 'ketahananPangan'])->name('layanan.ketahanan_pangan');
        Route::get('/konstruksi', [HomeController::class, 'konstruksi'])->name('layanan.konstruksi');
    });

    // ───── PROGRAM ─────
    Route::prefix('program')->group(function () {
        Route::get('/koperasi_desa', [HomeController::class, 'koperasiDesa'])->name('koperasi_desa');
    });

    // ───── HALAMAN LAIN ─────
    Route::get('/klien', [HomeController::class, 'klien'])->name('klien');
    Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('sejarah');
    Route::get('/karier', [HomeController::class, 'karier'])->name('karier');
    Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
    Route::get('/csr', [HomeController::class, 'csr'])->name('csr');
    Route::get('/hubungi', [HomeController::class, 'hubungi'])->name('hubungi');
    Route::get('/berita/{id}', [HomeController::class, 'detail_berita'])->name('detail_berita');
});

/*
|--------------------------------------------------------------------------
| Website pustakapemda.test handle bay aldo
|--------------------------------------------------------------------------
*/
Route::domain('pustakapemda.test')->group(function () {
    Route::get('/', [PustakapemdaController::class, 'index'])->name('website2.home');
    Route::get('/berita/{id}', [PustakapemdaController::class, 'detail_berita'])->name('website2.detail_berita');
    Route::get('/profil', [PustakapemdaController::class, 'profil'])->name('website2.profil');
    Route::get('/layanan/{kategori?}', [PustakapemdaController::class, 'layanan'])->name('website2.layanan');
    Route::get('/kontak', [PustakapemdaController::class, 'kontak'])->name('website2.kontak');
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
Route::domain('dashboard.localhost')->group(function () {
    Route::get('/auth/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/auth/login', [AuthController::class, 'doLogin'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

         // Artikel (resource)
         Route::resource('/articles', ArticleController::class);
         Route::resource('articles', ArticleController::class);
        Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
        Route::post('/upload-trix-image', [App\Http\Controllers\TrixUploadController::class, 'upload'])->name('trix.upload');


        // manage user routs
        Route::get('/admin/users', [AuthController::class, 'listUsers'])->name('admin.users');
        Route::get('/admin/add-user', [AuthController::class, 'showAddUserForm'])->name('admin.auth.add-user');
        Route::post('/admin/add-user', [AuthController::class, 'storeNewUser'])->name('admin.store-user');
        Route::get('/users/{id}/edit', [AuthController::class, 'editUser'])->name('admin.edit-user');
        Route::put('/users/{id}/update', [AuthController::class, 'updateUser'])->name('admin.update-user');
        Route::delete('/users/{id}', [AuthController::class, 'deleteUser'])->name('admin.delete-user');

        //poster routs
        Route::get('/admin/posters', [PosterController::class, 'index'])->name('admin.posters.index');
        Route::post('/admin/posters', [PosterController::class, 'store'])->name('admin.posters.store');
        Route::get('/admin/posters/{id}', [PosterController::class, 'show'])->name('admin.posters.show');
        Route::get('/admin/posters/{id}/edit', [PosterController::class, 'edit'])->name('admin.posters.edit');

       Route::put('/admin/posters/{id}', [PosterController::class, 'update'])->name('admin.posters.update');

        Route::delete('/admin/posters/{id}', [PosterController::class, 'destroy'])->name('admin.posters.destroy');
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