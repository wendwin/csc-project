@extends('layouts.adminlayout')

@section('content')
    <div class="p-6 bg-white rounded-xl shadow-md">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Artikel</h1>
            <a href="{{ route('articles.create') }}"
                class="inline-block px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition duration-200">
                + Tambah Artikel
            </a>
        </div>

        @if (session('success'))
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-transition 
            class="mb-4 p-4 text-sm text-green-800 bg-green-100 border border-green-200 rounded-lg flex items-center justify-between"
        >
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-green-600 hover:text-green-800">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
    @endif
    

        <div class="overflow-x-auto">
            <table class="min-w-full border text-sm text-left text-gray-700">
                <thead class="bg-gray-100">
                    <tr class="text-md font-semibold text-gray-700">
                        <th class="px-4 py-3 border">No</th>
                        <th class="px-4 py-3 border">Judul</th>
                        <th class="px-4 py-3 border">Penulis</th>
                        <th class="px-4 py-3 border">Kategori</th>
                        <th class="px-4 py-3 border">Target</th>
                        <th class="px-4 py-3 border">Gambar Utama</th>
                        <th class="px-4 py-3 border">Jumlah Gambar</th>
                        <th class="px-4 py-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $index => $article)
                        <tr class="border-t hover:bg-gray-50 transition duration-150">
                            <td class="px-4 py-3">{{ ($articles->currentPage() - 1) * $articles->perPage() + $index + 1 }}</td>
                            <td class="px-4 py-3">{{ $article->title }}</td>
                            <td class="px-4 py-3">{{ ucwords(str_replace('-', ' ', $article->author)) }}</td>
                            <td class="px-4 py-3">{{ $article->category }}</td>
                            <td class="px-4 py-3">{{ $article->target_website }}</td>
                            <td class="px-4 py-3">
                                @if ($article->main_image)
                                    <img src="{{ asset('storage/' . $article->main_image) }}"
                                        class="w-14 h-14 object-cover rounded-md border" alt="">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">{{ $article->images->count() }}</td>
                            <td class="px-4 py-3">
                                <div class="flex space-x-2 items-center">
                                    {{-- Preview --}}
                                    <a href="{{ route('articles.show', $article->id) }}" title="Lihat"
                                        class="text-blue-600 hover:text-blue-800 transition">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('articles.edit', $article->id) }}" title="Edit"
                                        class="text-yellow-500 hover:text-yellow-700 transition">
                                        <i data-lucide="edit-3" class="w-5 h-5"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <div x-data="{ showModal: false }" class="inline-block">
                                        <button @click="showModal = true" title="Hapus"
                                            class="text-red-600 hover:text-red-800 transition">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>

                                        {{-- Modal --}}
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
                                                    <button @click="showModal = false"
                                                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium transition">
                                                        Batal
                                                    </button>
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
            <div class="mt-6">
                {{ $articles->links() }}
            </div>            
        </div>
    </div>
@endsection
