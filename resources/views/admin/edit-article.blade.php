@extends('layouts.adminlayout')

@section('content')
    <div class="flex items-center gap-2 mb-6 mt-2">
        <a href="{{ route('articles.index') }}">
            <div
                class="w-6 h-6 rounded-full border-2 border-blue-600 hover:border-blue-700 flex items-center justify-center cursor-pointer">
                <i data-lucide="arrow-left" class="w-4 h-4 text-blue-600 hover:text-blue-700"></i>
            </div>
        </a>
    </div>
        <div class="p-2 bg-[#FCFDFD] rounded-t-lg shadow border-b-1 border-gray-300 z-20 relative">
            <h2 class="text-[18px] font-bold  ml-6">Edit Artikel</h2>
        </div>

                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-2 p-8 -mt-2 bg-white rounded-xl shadow-xl">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Judul Artikel</label>
                            <input type="text" name="title" required
                                value="{{ old('title', $article->title) }}"
                                class="w-full px-3 py-2 rounded-lg border border-blue-300 focus:outline-none focus:ring-1 focus:ring-blue-500 shadow-sm"
                                placeholder="Masukkan judul artikel">
                        </div>

                    {{-- Kategori --}}
                    <div class="mb-4">
                        <label for="target_website" class="block font-medium">Target Website</label>
                        <select id="target_website" name="target_website" class="w-full border rounded px-3 py-2 border-blue-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <option value="">-- Pilih Target Website --</option>
                            <option value="csc" {{ old('target_website', $article->target_website ?? '') === 'csc' ? 'selected' : '' }}>CSC
                            </option>
                            <option value="pustaka-pemda" {{ old('target_website', $article->target_website ?? '') === 'pustaka-pemda' ? 'selected' : '' }}>Pustaka Pemda</option>
                            <option value="pspi" {{ old('target_website', $article->target_website ?? '') === 'pspi' ? 'selected' : '' }}>PSPI
                            </option>
                        </select>      </div>

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
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konten Artikel</label>
                        <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
                        <trix-editor input="content"
                            class="trix-content bg-gray-100 border-[#ced1d6] rounded-b-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 min-h-[300px] mb-4 -mt-2"></trix-editor>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      {{-- Penulis --}}
                      <div>
                          <label class="block text-sm font-semibold text-gray-700 mb-1">Penulis</label>
                          <select name="author"
                              class="w-full px-3 py-2 rounded-lg border border-blue-300 focus:outline-none focus:ring-1 focus:ring-blue-500 shadow-sm">
                              @foreach ($defaultAuthors as $author)
                                <option value="{{ $author }}" {{ $author == $article->author ? 'selected' : '' }}>
                                          {{ ucwords(str_replace('-', ' ', $author)) }}
                                </option>
                                @endforeach
                          </select>
                      </div>

                      {{-- Target Website --}}
                    <div class="mb-4">
                        <label for="category" class="block font-medium">Kategori</label>
                        <select id="category" name="category" class="w-full border rounded px-3 py-2 border-blue-300 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            {{-- akan diisi oleh JS --}}
                        </select>
                    </div>
                  </div>

                    {{-- Aksi --}}
                    <div class="pt-4 flex justify-between items-center">
                        <a href="{{ route('articles.index') }}" class="bg-[#FF0000] hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg shadow text-[16px] transition duration-200 cursor-pointer">Kembali</a>
                        <button type="submit"
                            class="bg-[#4880FF] hover:bg-blue-700 text-white font-semibold px-4 py-2 text-[16px] rounded-lg shadow-lg transition duration-200 cursor-pointer">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
@endsection


    <style>
        trix-editor ul {
            list-style-type: disc;
            padding-left: 1.25rem;
        }

        trix-editor ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
        }

        trix-toolbar {
            background-color: #FCFDFD;
            border: 1px solid #ced1d6;
            border-radius: 0.5rem;
            padding: 0.25rem;
            z-index: 10;
        }

        /* Semua tombol: normal */
        trix-toolbar .trix-button {
            filter: brightness(0) saturate(100%) invert(45%) sepia(120%) saturate(686%) hue-rotate(199deg) brightness(99%) contrast(100%);
            border: none;
            transition: all 0.2s ease;
        }

        trix-toolbar .trix-button:hover,
        trix-toolbar .trix-button--active,
        trix-toolbar .trix-button.trix-active {
            background-color: rgba(72, 128, 255, 0.1);
            border-radius: 0.25rem;
        }

        trix-editor blockquote {
            border-left: 4px solid #60A5FA;
            padding-left: 1rem;
            background-color: #F0F9FF;
            font-style: italic;
            margin: 0.5rem 0;
        }

        trix-editor pre {
            background-color: #F3F4F6;
            color: #1F2937;
            font-family: monospace;
            padding: 0.75rem;
            border-radius: 0.375rem;
            overflow-x: auto;
            margin: 0.5rem 0;
        }
    </style>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const categories = {
                'csc': [
                    'Event Organizer',
                    'Ketahanan Pangan',
                    'Konstruksi',
                ],
                'pustaka-pemda': [
                    'Bimbingan Teknis (Bimtek)',
                    'Pengelolaan Keuangan Desa (APBDes, Dana Desa, dll.)',
                    'Perencanaan dan Pelaporan Pembangunan Desa',
                    'Pelatihan Penyusunan RPJMDes dan RKPDes',
                    'Manajemen Aset Desa',
                    'Digitalisasi Administrasi Desa',
                    'Studi Banding',
                    'Kunjungan ke desa-desa percontohan',
                    'Pertukaran pengalaman dan pembelajaran praktik terbaik',
                    'Pemantapan inovasi pelayanan publik desa',
                    'Workshop dan Seminar Tematik',
                    'Inovasi tata kelola pemerintahan digital',
                    'Peningkatan kapasitas leadership kepala desa dan perangkatnya',
                ],
                'pspi': [
                    'Bimbingan Teknis',
                    'Pengelolaan Keuangan Desa (APBDes, Dana Desa, dll.)',
                    'Perencanaan dan Pelaporan Pembangunan Desa',
                    'Pelatihan Penyusunan RPJMDes dan RKPDes',
                    'Manajemen Aset Desa',
                    'Digitalisasi Administrasi Desa',
                    'Studi Banding',
                    'Kunjungan ke desa-desa percontohan',
                    'Pertukaran pengalaman dan pembelajaran praktik terbaik',
                    'Pemantapan inovasi pelayanan publik desa',
                    'Workshop dan Seminar Tematik',
                    'Inovasi tata kelola pemerintahan digital',
                    'Peningkatan kapasitas leadership kepala desa dan perangkatnya',
                ]
            };

            let oldCategory = @json(old('category', $article->category ?? ''));
            const oldTarget = @json(old('target_website', $article->target_website ?? ''));

            const categorySelect = document.getElementById('category');
            const targetSelect = document.getElementById('target_website');

            function populateCategories(target) {
                const cats = categories[target] || [];
                categorySelect.innerHTML = '<option value="">-- Pilih kategori --</option>';

                if (oldCategory && !cats.includes(oldCategory)) {
                    const option = document.createElement('option');
                    option.value = oldCategory;
                    option.textContent = oldCategory + ' (tidak terdaftar)';
                    categorySelect.appendChild(option);
                }

                cats.forEach(cat => {
                    const opt = document.createElement('option');
                    opt.value = cat;
                    opt.textContent = cat;
                    categorySelect.appendChild(opt);
                });

                if (oldCategory) {
                    categorySelect.value = oldCategory;
                }
            }
            // First load
            populateCategories(oldTarget);
            // On change
            targetSelect.addEventListener('change', function () {
                oldCategory = '';
                populateCategories(this.value);
            });
        });
    </script>
@endpush