<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('images')->latest()->get();
        return view('admin.articles-index', compact('articles'));
    }

    public function create()
    {
        $defaultAuthors = ['admin-pustaka-pemda', 'admincsc', 'admin-pspi'];
        $targetWebsites = ['pustaka-pemda', 'csc', 'pspi'];
        return view('articles.create', compact('defaultAuthors', 'targetWebsites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'nullable|string',
            'category' => 'required|string',
            'target_website' => 'required|in:pustaka-pemda,csc,pspi',
            'main_image' => 'nullable|image',
            'content' => 'required|string',
            'images.*' => 'nullable|image',
        ]);

        // Simpan gambar utama
        $mainImagePath = null;
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('articles', 'public');
        }

        // Simpan artikel
        $article = Article::create([
            'title' => $request->title,
            'author' => $request->author ?? 'admin-pustaka-pemda',
            'main_image' => $mainImagePath,
            'content' => $request->content,
            'target_website' => $request->target_website,
            'category' => $request->category,
        ]);

        // Simpan gambar-gambar tambahan
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('article-images', 'public');
                $article->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil disimpan');
    }
}
