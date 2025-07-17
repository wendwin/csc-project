<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{
    
    public function index()
    {
        $posters = Poster::all();
        return view('admin.poster', compact('posters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        $path = $request->file('image')->store('posters', 'public');

        Poster::create([
            'title' => $validated['title'],
            'image_path' => $path,
        ]);

        return redirect()->route('admin.posters.index')->with('success', 'Poster berhasil ditambahkan.');
    }

    public function show($id)
    {
        $poster = Poster::findOrFail($id);
        return view('admin.poster-show', compact('poster')); 
    }

    public function edit($id)
    {
        $poster = Poster::findOrFail($id);
        return view('admin.poster-edit', compact('poster'));
    }

    public function update(Request $request, $id)
    {
        $poster = Poster::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($poster->image_path);
            $path = $request->file('image')->store('posters', 'public');
            $poster->image_path = $path;
        }

        $poster->title = $validated['title'];
        $poster->save();

        return redirect()->route('admin.posters.index')->with('success', 'Poster berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $poster = Poster::findOrFail($id);
        Storage::disk('public')->delete($poster->image_path);
        $poster->delete();

        return redirect()->route('admin.posters.index')->with('success', 'Poster berhasil dihapus.');
    }
}