@extends('layouts.adminlayout')

@section('content')
    <h1 class="text-[32px] font-bold text-gray-800 mb-6">Daftar Artikel</h1>

    {{-- FORM FILTER --}}
    <form method="GET" action="{{ route('articles.index') }}" class="mb-6">
        <div class="flex items-center ml-2 w-full mt-4 gap-2 flex-wrap">
            {{-- FILTER BAR --}}
            <div
                class="flex items-center text-[12px] sm:text-[13px] md:text-[14px] font-bold text-[#202224] rounded-lg overflow-hidden border border-gray-300 max-w-full sm:max-w-[727px]">
                {{-- Label Filter By --}}
                <div class="flex items-center px-2 py-1 sm:px-3 sm:py-2 border-l">
                    <i data-lucide="filter" class="w-4 h-4 mr-1"></i>
                    <span>Filter By</span>
                </div>

                {{-- Filter: Tanggal --}}
                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="border-l px-2 py-1 sm:px-3 sm:py-2" />

                {{-- Filter: Target Website --}}
                <select name="target_website" class="border-l px-2 py-1 sm:px-3 sm:py-2">
                    <option value="">Target Website</option>
                    <option value="pustaka-pemda" {{ request('target_website') == 'pustaka-pemda' ? 'selected' : '' }}>Pustaka
                        Pemda</option>
                    <option value="csc" {{ request('target_website') == 'csc' ? 'selected' : '' }}>CSC</option>
                    <option value="pspi" {{ request('target_website') == 'pspi' ? 'selected' : '' }}>PSPI</option>
                </select>

                {{-- Filter: Kategori --}}
                <select name="category" class="border-l px-2 py-1 sm:px-3 sm:py-2">
                    <option value="">Kategori Artikel</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>

                {{-- Tombol Filter --}}
                <button type="submit"
                    class="border-l px-2 py-1 sm:px-4 sm:py-2 bg-[#4379EE] text-white hover:bg-blue-700">Filter</button>

                {{-- Reset Filter --}}
                <a href="{{ route('articles.index') }}"
                    class="flex items-center gap-1 border-l px-2 py-1 sm:px-3 sm:py-2 text-red-500 hover:bg-red-100">
                    <i data-lucide="refresh-ccw" class="w-4 h-4"></i>
                    <span>Reset Filter</span>
                </a>
            </div>

            {{-- TOMBOL TAMBAH ARTIKEL --}}
            <a href="{{ route('articles.create') }}"
                class="inline-flex items-center gap-1 bg-[#4379EE] text-white px-3 py-2 text-[13px] font-bold rounded-lg hover:bg-blue-700">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span>Tambah Artikel</span>
            </a>
        </div>
    </form>

    {{-- FLASH MESSAGE --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition
            class="mb-4 p-4 text-sm text-green-800 bg-green-100 border border-green-200 rounded-lg flex items-center justify-between">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-green-600 hover:text-green-800">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
    @endif

    {{-- TABEL ARTIKEL --}}
    <div class="overflow-x-auto rounded-2xl shadow-md bg-white mt-10">
        <table class="min-w-full text-[10px] sm:text-[11px] md:text-[10px] lg:text-[14px] text-left text-gray-700">
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
                        <td class="px-4 py-3">{{ ($articles->currentPage() - 1) * $articles->perPage() + $index + 1 }}</td>
                        <td class="px-4 py-3">{{ $article->title }}</td>
                        <td class="px-4 py-3">{{ ucwords(str_replace('-', ' ', $article->author)) }}</td>
                        <td class="px-4 py-3">{{ $article->category }}</td>
                        <td class="px-4 py-3">{{ $article->target_website }}</td>
                        <td class="px-4 py-3 text-center">
                            @if ($article->main_image)
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset('storage/' . $article->main_image) }}"
                                        class="w-49 h-47 object-cover rounded-md border" alt="">
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
                                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                                                        Hapus
                                                    </button>
                                                </form>
                                                <button type="button" @click="showModal = false"
                                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium transition">
                                                    Batal                       </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Delete Modal --}}
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
@endsection