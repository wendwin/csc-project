@extends('layouts.adminlayout')

@section('content')
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition.duration.300ms
            class="fixed top-2 mt-12 left-1/2 transform -translate-x-1/2 z-50 bg-green-100 border border-green-300 text-green-800 px-3 py-2 rounded w-full max-w-md"
            role="alert">
            <div class="flex justify-between items-start">
                <div class="text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button @click="show = false" class="ml-4">
                    <i data-lucide="x" class="w-4 h-4 text-green-600 hover:text-green-800"></i>
                </button>
            </div>
        </div>
    @endif

    <h1 class="text-[32px] font-bold text-gray-800 mb-6 -mt-1">Daftar Pengguna</h1>

    {{-- FORM FILTER USER BY ROLE --}}
    <form method="GET" action="{{ route('admin.users') }}" class="w-full">
        <div class="flex flex-wrap items-center gap-2 w-full mt-4 mb-8">
            <div
                class="flex flex-col md:flex-row md:items-center w-full md:w-auto border border-gray-300 rounded-lg font-bold text-[14px] divide-y md:divide-y-0 md:divide-x divide-gray-300">
                <div class="flex items-center px-3 py-2 text-sm font-semibold text-gray-700">
                    <i data-lucide="filter" class="w-4 h-4 mr-1"></i>
                    <span>Filter By</span>
                </div>

                <select name="role" class="px-3 py-2 text-sm text-gray-800 bg-transparent focus:outline-none">
                    <option value="">Semua Role</option>
                    <option value="admin pustaka pemda" {{ request('role') == 'admin pustaka pemda' ? 'selected' : '' }}>
                        Admin Pustaka Pemda
                    </option>
                    <option value="admin csc" {{ request('role') == 'admin csc' ? 'selected' : '' }}>
                        Admin CSC
                    </option>
                    <option value="admin pspi" {{ request('role') == 'admin pspi' ? 'selected' : '' }}>
                        Admin PSPI
                    </option>
                </select>

                <button type="submit" class="px-3 py-2 text-sm text-white bg-[#4379EE] hover:bg-blue-600 font-semibold">
                    Filter
                </button>
                <a href="{{ route('admin.users') }}"
                    class="flex items-center gap-1 px-3 py-2 text-sm text-[#EA0234] hover:bg-red-200 border rounded-r-lg border-red-300">
                    <i data-lucide="refresh-ccw" class="w-4 h-4"></i>
                    <span>Reset Filter</span>
                </a>
            </div>
            <div class="hidden md:flex">
                <a href="{{ route('admin.auth.add-user') }}"
                    class="bg-[#4379EE] hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded-lg flex items-center gap-2">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Tambah User
                </a>
            </div>
        </div>
    </form>
    {{-- TOMBOL TAMBAH USER - MOBILE & TABLET --}}
    <div class="flex md:hidden mb-6 -mt-2 w-full justify-end">
        <a href="{{ route('admin.auth.add-user') }}"
            class="bg-[#4379EE] hover:bg-blue-600 text-white font-semibold py-2 px-3 rounded-lg flex items-center gap-2">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Tambah User
        </a>
    </div>

    <div class="w-full overflow-x-auto rounded-2xl shadow-md bg-white mt-4">
        <table
            class="min-w-[640px] sm:min-w-full text-[10px] sm:text-[11px] md:text-[10px] lg:text-[14px] text-left text-gray-700">
            <thead class="bg-[#FCFDFD]">
                <tr
                    class="font-semibold text-gray-700 border-b border-gray-200 uppercase text-[12px] sm:text-[13px] md:text-[14px] text-center">
                    <th class="px-4 py-3 text-center">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-center">Foto Profil</th>
                    <th class="pl-8 py-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $index => $user)
                    <tr
                        class="border-b border-gray-200 hover:bg-gray-100 transition duration-150 bg-white text-[14px] font-semibold text-[#202224] text-left">
                        <td class=" px-4 py-3 text-center">{{ $users->firstItem() + $index }}</td>
                        <td class=" px-4 py-3">{{ $user->name }}</td>
                        <td class=" px-4 py-3">{{ $user->email }}</td>
                        <td class=" px-4 py-3">{{ ucfirst($user->role) }}</td>
                        <td class=" px-4 py-3 text-center">
                            @if ($user->profile_image)
                                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Foto Profil"
                                    class="w-12 h-12 object-cover rounded-full mx-auto">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="pl-6 py-3">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.edit-user', $user->id) }}"
                                    class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                    <i data-lucide="pencil" class="w-5 h-5"></i>
                                </a>
                                <form action="{{ route('admin.delete-user', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus user ini?')" title="Hapus"
                                        class="text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-8 flex justify-center mb-4">
            <div class="w-full max-w-4xl">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
