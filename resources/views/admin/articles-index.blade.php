@extends('layouts.adminlayout')

@section('content')
    <h1 class="text-[32px] font-bold text-gray-800 mb-6 -mt-1">Daftar Artikel</h1>

    {{-- FORM FILTER --}}
    <form method="GET" action="{{ route('articles.index') }}" class="w-full">
        <div class="flex flex-wrap items-center gap-2 w-full mt-4">
            <div
                class="flex flex-col md:flex-row md:items-center w-full md:w-auto border border-gray-300 rounded-lg font-bold text-[14px] divide-y md:divide-y-0 md:divide-x divide-gray-300">
                <div class="flex items-center px-3 py-2 text-sm font-semibold text-gray-700">
                    <i data-lucide="filter" class="w-4 h-4 mr-1"></i>
                    <span>Filter By</span>
                </div>
                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="px-3 py-2 text-sm text-gray-800 bg-transparent focus:outline-none" />
                <select name="target_website" class="px-3 py-2 text-sm text-gray-800 bg-transparent focus:outline-none">
                    <option value="">Target Website</option>
                    <option value="pustaka-pemda" {{ request('target_website') == 'pustaka-pemda' ? 'selected' : '' }}>
                        Pustaka
                        Pemda</option>
                    <option value="csc" {{ request('target_website') == 'csc' ? 'selected' : '' }}>CSC</option>
                    <option value="pspi" {{ request('target_website') == 'pspi' ? 'selected' : '' }}>PSPI</option>
                </select>

                {{-- Mobile: tampilkan teks asli --}}
                <select name="category"
                    class="block md:hidden px-3 py-2 text-sm text-gray-800 bg-transparent focus:outline-none w-full">
                    <option value="">Kategori Artikel</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" title="{{ $category }}"
                            {{ request('category') == $category ? 'selected' : '' }}>
                            {{ Str::limit(ucfirst($category), 30) }}
                        </option>
                    @endforeach
                </select>

                {{-- Desktop: tampilkan teks dipotong --}}
                <select name="category"
                    class="hidden md:block px-3 py-2 text-sm text-gray-800 bg-transparent focus:outline-none w-40 truncate">
                    <option value="">Kategori Artikel</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" title="{{ $category }}"
                            {{ request('category') == $category ? 'selected' : '' }}>
                            {{ Str::limit(ucfirst($category), 20) }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="px-3 py-2 text-sm text-white bg-blue-600 hover:bg-blue-700 font-semibold">
                    Filter
                </button>
                <a href="{{ route('articles.index') }}"
                    class="flex items-center gap-1 px-3 py-2 text-sm text-red-500 hover:bg-red-100 border rounded-r-lg border-red-300">
                    <i data-lucide="refresh-ccw" class="w-4 h-4"></i>
                    <span>Reset Filter</span>
                </a>
            </div>

            {{-- Tambah Artikel --}}
            <a href="{{ route('articles.create') }}"
                class="hidden md:flex items-center gap-1 px-3 py-2 text-sm text-white bg-[#4379EE] hover:bg-blue-700 font-semibold rounded-lg">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span>Tambah Artikel</span>
            </a>
        </div>
    </form>

    {{-- TOMBOL TAMBAH ARTIKEL - MOBILE & TABLET --}}
    <div class="flex md:hidden mt-4 w-full justify-end">
        <a href="{{ route('articles.create') }}"
            class="bg-[#4379EE] hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Tambah Artikel
        </a>
    </div>


    {{-- FLASH MESSAGE --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition
            class="mb-4 mt-2 p-4 text-sm text-green-800 bg-green-100 border border-green-200 rounded-lg flex items-center justify-between">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-green-600 hover:text-green-800">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
    @endif

    {{-- TABEL ARTIKEL --}}
    <div class="w-full rounded-2xl shadow-md bg-white mt-4 md:mt-10">
        <div class="w-full overflow-x-auto  rounded-2xl ">
            <table
                class="min-w-[1024px] w-full text-[10px] sm:text-[11px] md:text-[10px] lg:text-[14px] text-left text-gray-700">
                <thead class="bg-[#FCFDFD]">
                    <tr
                        class="font-semibold text-gray-700 border-b border-gray-200 uppercase text-[12px] sm:text-[13px] md:text-[14px]">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Penulis</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Target</th>
                        <th class="px-4 py-3">Gambar Utama</th>
                        <th class="px-4 py-3">Jumlah Gambar</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $index => $article)
                        <tr
                            class="border-b border-gray-200 hover:bg-gray-100 transition duration-150 bg-white text-[14px] font-semibold text-[#202224]">
                            <td class="px-4 py-3">{{ ($articles->currentPage() - 1) * $articles->perPage() + $index + 1 }}
                            </td>
                            <td class="px-4 py-3" title="{{ $article->title }}">
                                {{ \Illuminate\Support\Str::words($article->title, 2, '...') }}
                            </td>
                            <td class="px-4 py-3">{{ ucwords(str_replace('-', ' ', $article->author)) }}</td>
                            <td class="px-4 py-3" title="{{ $article->category }}">
                                {{ \Illuminate\Support\Str::words($article->category, 2, '...') }}
                            </td>
                            <td class="px-4 py-3">{{ $article->target_website }}</td>
                            <td class="px-4 py-3 text-center">
                                @if ($article->main_image)
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset('storage/' . $article->main_image) }}"
                                            class="w-20 h-10 object-cover rounded-md border" alt="">
                                    </div>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">{{ $article->images->count() }}</td>
                            <td class="px-4 py-3">
                                <div class="flex space-x-2 items-center">
                                    <a href="{{ route('articles.show', $article->id) }}" title="Lihat"
                                        class="text-blue-600 hover:text-blue-800 transition">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                    <a href="{{ route('articles.edit', $article->id) }}" title="Edit"
                                        class="text-yellow-500 hover:text-yellow-700 transition">
                                        <i data-lucide="edit-3" class="w-5 h-5"></i>
                                    </a>

                                    {{-- Delete Modal --}}
                                    <div x-data="{ showModal: false }" class="inline-block">
                                        <button type="button" @click="showModal = true" title="Hapus"
                                            class="text-red-600 hover:text-red-800 transition">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>

                                        <div x-show="showModal" x-cloak
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                            <div @click.away="showModal = false"
                                                class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center space-y-4">
                                                <h2 class="text-lg font-bold text-gray-800">Konfirmasi Hapus</h2>
                                                <p class="text-sm text-gray-600">Yakin ingin menghapus artikel ini?</p>

                                                <div class="flex justify-center gap-4 mt-4">
                                                    <form action="{{ route('articles.destroy', $article->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                    <button type="button" @click="showModal = false"
                                                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium transition">
                                                        Batal </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center px-4 py-4 text-gray-500">Tidak ada data artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- PAGINATION --}}
            <div class="mt-8 flex justify-center mb-4">
                <div class="w-full max-w-4xl">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
