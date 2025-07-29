<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleImage;
use Hashids\Hashids;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function getBerita_terbaru()
    {
        $hashids = new Hashids('cendana_salt_rahasia', 8);
        $berita_terbaru = Article::where('author', 'admincsc')
                         ->latest()
                         ->paginate(6);

        $berita_terbaru->setCollection(
            $berita_terbaru->getCollection()->map(function ($item) use ($hashids) {
                $item->id_encrypt = $hashids->encode($item->id);
                $item->id_slug = $item->id_encrypt . '-' . Str::slug($item->title);
                return $item;
            })
        );

        return $berita_terbaru;
    }

    public function index()
    {
        $berita_terbaru = $this->getBerita_terbaru();

        return view('index', [
            'css' => 'home.css',
            'navbar' => 'default',
            'berita_terbaru'=> $berita_terbaru
        ]);
    }

    // ───── PERUSAHAAN ─────
    public function tentang() {
        return view('perusahaan.tentang', [
            'css' => 'css/perusahaan/tentang.css',
            'navbar' => 'default'
        ]);
    }

    public function direksi() {
        return view('perusahaan.direksi', [
            'css' => 'css/perusahaan/direksi.css',
            'navbar' => 'default'
        ]);
    }

    public function strukturOrganisasi() {
        return view('perusahaan.struktur_organisasi', [
            'css' => 'css/perusahaan/struktur-organisasi.css',
            'navbar' => 'default'
        ]);
    }

    public function tataKelola() {
        return view('perusahaan.tata-kelola', [
            'css' => 'css/perusahaan/tata-kelola.css',
            'navbar' => 'default'
        ]);
    }

    // ───── LAYANAN ─────
    public function eventOrganizer() {
        return view('layanan.event_organizer', [
            'css' => 'css/layanan/event_organizer.css',
            'navbar' => 'default'
        ]);
    }

    public function ketahananPangan() {
        return view('layanan.ketahanan_pangan', [
            'css' => 'css/layanan/ketahanan_pangan.css',
            'navbar' => 'default'
        ]);
    }

    public function konstruksi() {
        return view('layanan.konstruksi', [
            'css' => 'css/layanan/konstruksi.css',
            'navbar' => 'default'
        ]);
    }

    // ───── PROGRAM ─────
    public function koperasiDesa() {
        return view('klien-sejarah.kopdes', [
            'css' => 'css/klien-sejarah/kopdes.css',
            'navbar' => 'default'
        ]);
    }

    // ───── HALAMAN LAIN ─────
    public function klien() {
        return view('klien-sejarah.klien', [
            'css' => 'css/klien-sejarah/klien.css',
            'navbar' => 'default'
        ]);
    }

    public function sejarah() {
        return view('klien-sejarah.sejarah', [
            'css' => 'css/klien-sejarah/sejarah.css',
            'navbar' => 'default'
        ]);
    }

    public function karier() {
        return view('klien-sejarah.karier', [
            'css' => 'css/klien-sejarah/karier.css',
            'navbar' => 'default'
        ]);
    }

    public function berita() {
        $berita_terbaru = $this->getBerita_terbaru();
        return view('klien-sejarah.berita', [
            'css' => 'css/klien-sejarah/berita.css',
            'navbar' => 'default',
            'berita_terbaru' => $berita_terbaru
        ]);
    }

    public function csr() {
        $berita_terbaru = $this->getBerita_terbaru();
        return view('klien-sejarah.csr', [
            'css' => 'css/klien-sejarah/csr.css',
            'navbar' => 'default',
            'berita_terbaru' => $berita_terbaru
        ]);
    }

    public function hubungi() {
        return view('klien-sejarah.hubungi', [
            'css' => 'css/klien-sejarah/hubungi.css',
            'navbar' => 'default'
        ]);
    }

    public function detail_berita($id_slug) {
        $hashids = new Hashids('cendana_salt_rahasia', 8);
        $parts = explode('-', $id_slug);
        $id_encrypt = $parts[0];

        $decoded = $hashids->decode($id_encrypt);
        $id = $decoded[0] ?? null;
        $berita = Article::findOrFail($id);
        $gambars = ArticleImage::where('article_id', $id)->get();

        $berita_terbaru = $this->getBerita_terbaru();

        return view('components.detail_berita', [
            'css' => 'css/detail_berita.css',
            'navbar' => 'default',
            'berita'=>$berita,
            'gambars'=>$gambars,
            'berita_terbaru' => $berita_terbaru
        ]);
    }
}
