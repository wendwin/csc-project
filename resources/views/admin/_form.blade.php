<form action="{{ $action }}" method="POST" enctype="multipart/form-data"
    class="space-y-6 bg-white p-8 rounded-xl shadow-xl">
    @csrf
    @if (isset($method) && $method === 'PUT')
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Judul --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 ">Judul Artikel</label>
            <input type="text" name="title" required value="{{ old('title', $article->title ?? '') }}"
                class="w-full px-2 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"
                placeholder="Masukkan judul artikel">
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">Kategori</label>
            <input type="text" name="category" required value="{{ old('category', $article->category ?? '') }}"
                class="w-full px-2 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm"
                placeholder="Kategori artikel">
        </div>

        {{-- Gambar Utama --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar Utama</label>
            <input type="file" name="main_image" accept="image/*"
                class="w-full px-2 py-2 rounded-lg border border-gray-300 bg-white file:mr-4 file:py-1 file:px-2 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            @if (!empty($article->main_image))
                <img src="{{ asset('storage/' . $article->main_image) }}" alt=""
                    class="mt-3 w-18 h-22 object-cover rounded-lg shadow-sm border">
            @endif
        </div>

        {{-- Gambar Tambahan --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar Tambahan</label>
            <input type="file" name="images[]" accept="image/*" multiple
                class="w-full px-2 py-2 rounded-lg border border-gray-300 bg-white file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-sm file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>
    </div>

    {{-- Konten Artikel --}}
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Konten Artikel</label>
        <input id="content" type="hidden" name="content" value="{{ old('content', $article->content ?? '') }}">
        <trix-editor input="content"
            class="trix-content bg-white border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 min-h-[300px]">
        </trix-editor>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Penulis --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Penulis</label>
            <select name="author"
                class="w-full px-2 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
                <option value="">Pilih penulis</option>
                @foreach ($defaultAuthors as $author)
                    <option value="{{ $author }}" {{ old('author') == $author ? 'selected' : '' }}>
                        {{ ucwords(str_replace('-', ' ', $author)) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Target Website --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Target Website</label>
            <select name="target_website" required
                class="w-full px-2 py-2 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm">
                @foreach ($targetWebsites as $target)
                    <option value="{{ $target }}"
                        {{ old('target_website', $article->target_website ?? '') === $target ? 'selected' : '' }}>
                        {{ ucwords(str_replace('-', ' ', $target)) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="pt-4 flex justify-end">
        <button type="submit"
            class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition duration-200">
            Simpan Artikel
        </button>
    </div>
</form>

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
