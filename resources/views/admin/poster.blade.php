@extends('layouts.adminlayout')

@section('content')
<div x-data="{ showAddModal: false, showEditModal: false, editPoster: {} }" class="container mx-auto mt-12">
    <h1 class="mb-6 text-2xl font-bold text-gray-700 ">Daftar Poster</h1>

    {{-- FLASH MESSAGE --}}
    @if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-transition.duration.300ms
        class="fixed z-50 w-full max-w-md px-3 py-2 mt-12 text-green-800 transform -translate-x-1/2 bg-green-100 border border-green-300 rounded top-2 left-1/2"
        role="alert">
        <div class="flex items-start justify-between">
            <div class="text-sm font-medium">
                {{ session('success') }}
            </div>
            <button @click="show = false" class="ml-4">
                <i data-lucide="x" class="w-4 h-4 text-green-600 hover:text-green-800"></i>
            </button>
        </div>
    </div>
    @endif
    
    {{-- Filter + Tombol Tambah Poster (Desktop Only) --}}
    <div class="items-center hidden gap-3 mt-10 mb-12 lg:flex">
        <form method="GET" action="{{ route('admin.posters.index') }}"
            class="flex items-center border border-gray-300 rounded-md px-3 py-2 h-[42px]">
            <i data-lucide="filter" class="w-4 h-4 mr-2 text-gray-500"></i>
            <label for="target_website" class="mr-2 text-sm font-bold text-gray-600">Filter By:</label>
            <select name="target_website" id="target_website" onchange="this.form.submit()"
                class="text-sm border-0 border-l-1 focus:ring-0 focus:outline-none bg-transparent w-[160px] text-gray-600 {{ request('target_website') == '' ? 'font-bold' : 'font-normal' }}">
                <option value="">Semua Website</option>
                <option value="pustaka-pemda" {{ request('target_website') == 'pustaka-pemda' ? 'selected' : '' }}>Pustaka Pemda</option>
                <option value="csc" {{ request('target_website') == 'csc' ? 'selected' : '' }}>Cendana Solution</option>
                <option value="pspi" {{ request('target_website') == 'pspi' ? 'selected' : '' }}>PSPI</option>
            </select>
        </form>
        <button @click="showAddModal = true"
            class="px-3 py-2 bg-[#4379EE] hover:bg-blue-600 text-white font-bold rounded-md shadow-sm flex items-center">
            <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Tambah Poster
        </button>
    </div>
    {{-- Mobile & Tablet Only --}}
    <div class="mb-4 space-y-3 lg:hidden">
        <div class="flex justify-end">
            <button @click="showAddModal = true"
                class="px-3 py-2 bg-[#4379EE] hover:bg-blue-600 text-white font-bold rounded-md shadow-sm flex items-center">
                <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Tambah Poster
            </button>
        </div>
        <form method="GET" action="{{ route('admin.posters.index') }}"
            class="p-4 space-y-2 bg-white border border-gray-300 rounded-md shadow">
            <div class="flex items-center gap-2 mb-2">
                <i data-lucide="filter" class="w-4 h-4 text-gray-500"></i>
                <span class="text-sm font-bold text-gray-700">Filter Poster</span>
            </div>
            <label for="target_website" class="block text-sm font-medium text-gray-600">Pilih Website:</label>
            <select name="target_website" id="target_website" onchange="this.form.submit()"
                class="w-full text-sm p-1 text-gray-700 border border-gray-300 rounded-sm focus:ring-[#4379EE] focus:border-[#4379EE]">
                <option value="">Semua Website</option>
                <option value="pustaka-pemda" {{ request('target_website') == 'pustaka-pemda' ? 'selected' : '' }}>Pustaka Pemda</option>
                <option value="csc" {{ request('target_website') == 'csc' ? 'selected' : '' }}>Cendana Solution</option>
                <option value="pspi" {{ request('target_website') == 'pspi' ? 'selected' : '' }}>PSPI</option>
            </select>
        </form>
    </div>

    {{-- Modal Tambah Poster --}}
    <div x-show="showAddModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-sky-200/20 backdrop-blur-sm">
        <div @click.away="showAddModal = false"
            class="w-full max-w-md p-6 space-y-4 text-center bg-white shadow-lg rounded-xl">
            <h2 class="mb-4 text-lg font-semibold">Tambah Poster</h2>
            <form action="{{ route('admin.posters.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block mb-1 text-sm font-medium text-left text-gray-500">Judul Poster</label>
                    <input type="text" name="title" id="title" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="target_website" class="block mb-1 text-sm font-medium text-left text-gray-500">Target Website</label>
                    <select name="target_website" id="target_website" class="w-full p-2 border rounded" required>
                        <option value="">-- Pilih Website --</option>
                        <option value="pustaka-pemda">Pustaka Pemda</option>
                        <option value="csc">CSC</option>
                        <option value="pspi">PSPI</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="image" class="block mb-1 text-sm font-medium text-left text-gray-500">Gambar Poster</label>
                    <input type="file" name="image" id="image" class="w-full p-2 border rounded" accept="image/*" required>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <button type="button" @click="showAddModal = false"
                        class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 text-white bg-[#4379EE] rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Tabel Poster --}}
    <div class="w-full mt-4 overflow-x-auto bg-white rounded-md shadow-md">
        <table
            class="min-w-[640px] sm:min-w-full text-[10px] sm:text-[11px] md:text-[10px] lg:text-[14px] text-left text-gray-700">
            <thead class="bg-[#FCFDFD]">
                <tr
                    class="font-semibold text-gray-600 border-b border-gray-200 uppercase text-[12px] sm:text-[13px] md:text-[14px] text-center">
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3 text-left">Judul</th>
                    <th class="px-4 py-3 text-left">Poster</th>
                    <th class="px-4 py-3 text-left">Target Website</th>
                    <th class="py-3 pl-8 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posters as $poster)
                <tr
                    class="border-b border-gray-200 hover:bg-slate-50 transition duration-150 bg-white text-[14px] font-semibold text-gray-500 text-left">
                    <td class="px-4 py-3 text-center">{{ ($posters->currentPage() - 1) * $posters->perPage() + $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $poster->title }}</td>
                    <td class="px-4 py-3">
                        <a href="{{ asset('storage/' . $poster->image_path) }}"
                            class="glightbox group"
                            data-gallery="gallery"
                            data-title="Poster: {{ $poster->title }}">
                            
                            <img src="{{ asset('storage/' . $poster->image_path) }}"
                                alt="Poster Image"
                                loading="lazy"
                                class="w-16 h-16 transition-all duration-300 ease-in-out transform rounded cursor-pointer group-hover:scale-110 group-hover:brightness-110 group-hover:shadow-lg" />
                        </a>
                    </td>
                    <td class="px-4 py-3 capitalize">
                        @php
                            $urls = [
                                'pustaka-pemda' => 'http://pustakapemda.test/',
                                'csc' => 'http://cendanasolution.test/',
                                'pspi' => 'http://pspi.test/',
                            ];
                            $url = $urls[$poster->target_website] ?? '#';
                            $label = str_replace('-', ' ', $poster->target_website); 
                        @endphp
                        <a href="{{ $url }}" target="_blank" class="text-blue-600 underline hover:underline">
                            {{ $label }}
                        </a>
                    </td>
                    <td class="py-3 pl-6">
                        <div class="flex items-center space-x-2">
                            {{-- Tombol Edit --}}
                            <button @click="editPoster = {{ $poster }}; showEditModal = true"
                                class="text-yellow-600 hover:underline hover:text-yellow-700">
                                <i data-lucide="pencil" class="w-5 h-5 mr-1"></i>
                            </button>

                            {{-- Tombol Hapus --}}
                            <div x-data="{ showConfirm: false }">
                                <button type="button" @click="showConfirm = true"
                                    class="text-red-600 hover:underline hover:text-red-700">
                                    <i data-lucide="trash-2" class="w-5 h-5 mr-1"></i>
                                </button>

                                <!-- Modal Konfirmasi -->
                                <div x-show="showConfirm" x-cloak
                                    class="fixed inset-0 z-50 flex items-center justify-center bg-sky-200/20 backdrop-blur-sm">
                                    <div @click.away="showConfirm = false"
                                        class="w-full max-w-sm p-6 space-y-4 bg-white rounded-lg shadow-lg">
                                        <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Hapus</h2>
                                        <p class="text-sm text-gray-600">Apakah kamu yakin ingin menghapus poster ini?
                                        </p>
                                        <div class="flex justify-center space-x-3">
                                            <button @click="showConfirm = false"
                                                class="px-4 py-2 text-sm text-gray-800 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                                            <form action="{{ route('admin.posters.destroy', $poster->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 text-sm text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
         <div class="flex justify-center mt-8 mb-4">
                <div class="w-full max-w-6xl text-gray-500">
            {{ $posters->withQueryString()->links('vendor.pagination.tailwind') }}
        </div>
        </div>
    </div>

   {{-- Modal Edit Poster --}}
    <div x-show="showEditModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-sky-200/20 backdrop-blur-sm">
        <div @click.away="showEditModal = false"
            class="w-full max-w-md p-6 space-y-4 text-center bg-white shadow-lg rounded-xl">
            <h2 class="mb-4 text-lg font-semibold">Edit Poster</h2>
            <form :action="`/admin/posters/${editPoster.id}`" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-left text-gray-500">Judul Poster</label>
                    <input type="text" name="title" x-model="editPoster.title" class="w-full p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-left text-gray-500">Target Website</label>
                    <select name="target_website" x-model="editPoster.target_website" class="w-full p-2 border rounded" required>
                        <option value="">-- Pilih Website --</option>
                        <option value="pustaka-pemda">Pustaka Pemda</option>
                        <option value="csc">CSC</option>
                        <option value="pspi">PSPI</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 text-sm font-medium text-left text-gray-500">Gambar Poster (opsional)</label>
                    <input type="file" name="image" class="w-full p-2 border rounded" accept="image/*">
                </div>
                <div class="flex items-center justify-between mt-4">
                <button type="button" @click="showEditModal = false"
                    class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 text-white bg-[#4379EE] rounded hover:bg-blue-700">
                    Update
                </button>
            </div>

            </form>
        </div>
    </div>
</div>

{{-- glightbox script --}}
<script>
    const lightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        closeButton: true,
        zoomable: true,
        openEffect: 'zoom',
        closeEffect: 'fade',
        slideEffect: 'slide',
        plyr: {
            css: 'https://cdn.plyr.io/3.6.8/plyr.css',
            js: 'https://cdn.plyr.io/3.6.8/plyr.js',
        }
    });
</script>

@endsection
