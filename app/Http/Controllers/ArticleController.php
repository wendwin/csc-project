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
        return view('admin.create-articles', compact('defaultAuthors', 'targetWebsites'));
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

    public function show($id)
    {
        $article = Article::with('images')->findOrFail($id); 
        return view('admin.show-article', compact('article'));
    }


    public function edit($id)
    {
        $article = Article::with('images')->findOrFail($id);
        $defaultAuthors = ['admin-pustaka-pemda', 'admincsc', 'admin-pspi'];
        $targetWebsites = ['pustaka-pemda', 'csc', 'pspi'];

        return view('admin.edit-article', compact('article', 'defaultAuthors', 'targetWebsites'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'author' => 'nullable|string',
            'category' => 'required|string',
            'target_website' => 'required|in:pustaka-pemda,csc,pspi',
            'main_image' => 'nullable|image',
            'images.*' => 'nullable|image',
        ]);

        // Ganti main image jika diupload
        if ($request->hasFile('main_image')) {
            if ($article->main_image) {
                Storage::disk('public')->delete($article->main_image);
            }
            $path = $request->file('main_image')->store('article-main-images', 'public');
            $article->main_image = $path;
        }

        // Ganti semua gambar tambahan jika upload baru
        if ($request->hasFile('images')) {
            foreach ($article->images as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('article-images', 'public');
                $article->images()->create(['image_path' => $path]);
            }
        }

        // Update data artikel
        $article->update([
            'title' => $request->title,
            'author' => $request->author ?? 'admin-pustaka-pemda',
            'category' => $request->category,
            'target_website' => $request->target_website,
            'content' => $request->content,
            'main_image' => $article->main_image, 
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $article = Article::with('images')->findOrFail($id);
        if ($article->main_image) {
            Storage::disk('public')->delete($article->main_image);
        }
        foreach ($article->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus.');
    }




}
