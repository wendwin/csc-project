@extends('layouts.adminlayout')

@section('content')
    <h1 class="text-[32px] font-bold text-gray-800 mb-6 -mt-1">Daftar Artikel</h1>

<form method="GET" action="{{ route('articles.index') }}" class="w-full">
    <div class="flex flex-col gap-2 mt-4 lg:flex-row lg:items-start lg:justify-start">

        {{--  Filter + Reset --}}
        <div class="flex flex-col w-full lg:flex-row border border-gray-300 rounded-lg font-bold text-sm divide-y lg:divide-y-0 lg:divide-x divide-gray-300 lg:max-w-[800px]">
            <div class="flex items-center px-4 py-2 text-gray-700 shrink-0">
                <i data-lucide="filter" class="w-4 h-4 mr-1"></i>
                <span>Filter By</span>
            </div>
            <div class="flex items-center w-full px-4 py-2 lg:w-auto">
                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="w-full text-gray-800 bg-transparent focus:outline-none !h-8 !min-h-0" />
            </div>
            <div class="flex items-center w-full px-4 py-2 lg:w-auto">
                <select name="target_website"
                    class="w-full text-gray-800 bg-transparent focus:outline-none !h-8 !min-h-0">
                    <option value="">Target Website</option>
                    <option value="pustaka-pemda" {{ request('target_website') == 'pustaka-pemda' ? 'selected' : '' }}>Pustaka Pemda</option>
                    <option value="csc" {{ request('target_website') == 'csc' ? 'selected' : '' }}>CSC</option>
                    <option value="pspi" {{ request('target_website') == 'pspi' ? 'selected' : '' }}>PSPI</option>
                </select>
            </div>
            <div class="flex items-center w-full px-4 py-2 lg:w-auto">
                <select name="category"
                    class="w-full text-gray-800 bg-transparent focus:outline-none !h-8 !min-h-0">
                    <option value="">Kategori Artikel</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" title="{{ $category }}"
                            {{ request('category') == $category ? 'selected' : '' }}>
                            {{ Str::limit(ucfirst($category), 20) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div onclick="this.closest('form').submit();"
                class="flex items-center w-full px-4 py-2 text-white bg-[#4379EE] hover:bg-blue-700 cursor-pointer md:w-auto">
                <span class="mx-auto">Filter</span>
            </div>
            <div class="items-center px-4 py-2 lg:flex flex-none lg:w-[160px] text-red-500 hover:bg-red-100">
                <a href="{{ route('articles.index') }}"
                    class="flex items-center gap-1 px-3 py-1  !h-8 !min-h-0 whitespace-nowrap w-full justify-center">
                    <i data-lucide="refresh-ccw" class="w-5 h-5"></i>
                    <span>Reset Filter</span>
                </a>
            </div>
        </div>
       <div class="items-center hidden mt-2 lg:flex lg:ml-2 lg:mt-0">
            <a href="{{ route('articles.create') }}"
                class="flex items-center gap-1 px-4 py-4 text-sm text-white bg-[#4379EE] hover:bg-blue-700 font-semibold rounded-lg !h-12 whitespace-nowrap">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span>Tambah Artikel</span>
            </a>
        </div>
    </div>
</form>

{{-- Tambah Artikel (mobile & tablet only) --}}
<div class="flex justify-end w-full mt-4 lg:hidden">
    <a href="{{ route('articles.create') }}"
        class="bg-[#4379EE] hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2">
        <i data-lucide="plus" class="w-4 h-4"></i>
        Tambah Artikel
    </a>
</div>

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


    {{-- TABEL ARTIKEL --}}
    <div class="w-full mt-4 bg-white shadow-md rounded-2xl md:mt-10">
        <div class="w-full overflow-x-auto rounded-2xl ">
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
                        <th class="px-4 py-3">Tanggal</th>
                        {{-- <th class="px-4 py-3">Gambar Utama</th>
                        <th class="px-4 py-3">Jumlah Gambar</th> --}}
                        <th class="px-4 py-3 pl-8">Aksi</th>
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
                            {{-- <td class="px-4 py-3">{{ str_replace('-', ' ', $article->target_website) }}</td> --}}
                            <td class="px-4 py-3">
                                @php
                                    $target = $article->target_website;
                                    $domain = match ($target) {
                                        'pustaka-pemda' => 'http://pustakapemda.test',
                                        'pspi' => 'http://pspi.test',
                                        'csc' => 'http://cendanasolution.test',
                                        default => null,
                                    };
                                @endphp

                                @if ($domain && !empty($article->id_encrypt))
                                    <a href="{{ $domain }}/berita/{{ $article->id_encrypt }}-{{ \Str::slug($article->title) }}"
                                    target="_blank"
                                    class="text-blue-600 underline hover:text-blue-800">
                                    {{ str_replace('-', ' ', $article->target_website) }}
                                    </a>
                                @else
                                    <span>{{ str_replace('-', ' ', $article->target_website) }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $article->created_at->format('d M Y') }}</td>
                            {{-- <td class="px-4 py-3 text-center">
                                @if ($article->main_image)
                                    <div class="flex items-center justify-center">
                                        <img src="{{ asset('storage/' . $article->main_image) }}"
                                            class="object-cover w-20 h-10 border rounded-md" alt="">
                                    </div>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">{{ $article->images->count() }}</td> --}}
                            <td class="px-3 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('articles.show', $article->id) }}" title="Lihat"
                                        class="text-blue-600 transition hover:text-blue-800">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                    <a href="{{ route('articles.edit', $article->id) }}" title="Edit"
                                        class="text-yellow-500 transition hover:text-yellow-700">
                                        <i data-lucide="edit-3" class="w-5 h-5"></i>
                                    </a>

                                    {{-- Delete Modal --}}
                                    <div x-data="{ showModal: false }" class="inline-block">
                                        <button type="button" @click="showModal = true" title="Hapus"
                                            class="text-red-600 transition hover:text-red-800">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>

                                        <div x-show="showModal" x-cloak
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-sky-200/20 backdrop-blur-sm">
                                            <div @click.away="showModal = false"
                                                class="w-full max-w-sm p-6 space-y-4 text-center bg-white shadow-lg rounded-xl">
                                                <h2 class="text-lg font-bold text-gray-800">Konfirmasi Hapus</h2>
                                                <p class="text-sm text-gray-600">Yakin ingin menghapus artikel ini?</p>

                                                <div class="flex justify-center gap-4 mt-4">
                                                    <form action="{{ route('articles.destroy', $article->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="px-4 py-2 text-sm font-medium text-white transition bg-red-600 rounded-lg hover:bg-red-700">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                    <button type="button" @click="showModal = false"
                                                        class="px-4 py-2 text-sm font-medium text-gray-800 transition bg-gray-200 rounded-lg hover:bg-gray-300">
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
                            <td colspan="8" class="px-4 py-4 text-center text-gray-500">Tidak ada data artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- PAGINATION --}}
            <div class="flex justify-center mt-8 mb-4">
                <div class="w-full max-w-4xl">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
