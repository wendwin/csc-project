@extends('layouts.adminlayout')

@section('content')
<div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6">Edit Artikel</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6 bg-white p-6 rounded-xl shadow-md">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Judul --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Artikel</label>
                <input type="text" name="title" required
                    value="{{ old('title', $article->title) }}"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"
                    placeholder="Masukkan judul artikel">
            </div>

            {{-- Kategori --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                <input type="text" name="category" required
                    value="{{ old('category', $article->category) }}"
                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"
                    placeholder="Kategori artikel">
            </div>

             {{-- Gambar Utama --}}
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar Utama</label>
          <input type="file" name="main_image" accept="image/*"
              class="w-full px-3 py-2 rounded-lg border border-gray-300 bg-white file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
          
          @if (!empty($article->main_image))
              <div class="mt-3">
                  <img src="{{ asset('storage/' . $article->main_image) }}" alt="Preview Gambar Utama"
                      class="w-32 h-24 object-cover rounded-lg shadow border">
              </div>
          @endif
      </div>

      {{-- Upload Gambar Tambahan --}}
      <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Upload Gambar Tambahan Baru</label>
          <input type="file" name="images[]" multiple accept="image/*"
              class="w-full px-3 py-2 rounded-lg border border-gray-300 bg-white file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
          @error('images.*')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
          {{-- Gambar Tambahan Lama --}}
          @if (!empty($article->images) && $article->images->count())
                  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-3">
                      @foreach ($article->images as $image)
                          <div class="w-full h-24 rounded-lg overflow-hidden shadow border">
                              <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar Tambahan"
                                  class="w-full h-full object-cover">
                          </div>
                      @endforeach
              </div>
          @endif
      </div>
      </div>


        {{-- Konten --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Konten Artikel</label>
            <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
            <trix-editor input="content"
                class="trix-content bg-white border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[300px]"></trix-editor>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          {{-- Penulis --}}
          <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Penulis</label>
              <select name="author"
                  class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
                  @foreach ($defaultAuthors as $author)
                    <option value="{{ $author }}" {{ $author == $article->author ? 'selected' : '' }}>
                              {{ ucwords(str_replace('-', ' ', $author)) }}
                    </option>
                    @endforeach
              </select>
          </div>
      
          {{-- Target Website --}}
          <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Target Website</label>
              <select name="target_website" required
                  class="w-full px-3 py-2 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
                  @foreach ($targetWebsites as $target)
                    <option value="{{ $target }}" {{ $target == $article->target_website ? 'selected' : '' }}>
                    {{ ucwords(str_replace('-', ' ', $target)) }}
                    </option>
                    @endforeach
              </select>
          </div>
      </div>
      

        {{-- Aksi --}}
        <div class="pt-4 flex justify-between items-center">
            <a href="{{ route('articles.index') }}" class="text-gray-600 hover:underline">Kembali</a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-200">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    trix-editor ul {
        list-style-type: disc;
        padding-left: 1.25rem;
    }
    trix-editor ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const trixInput = document.querySelector("input[name='content']");
        if (trixInput && trixInput.value) {
            document.querySelector("trix-editor").editor.loadHTML(trixInput.value);
        }
    });
</script>
@endpush
