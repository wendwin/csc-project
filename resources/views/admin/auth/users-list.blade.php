@extends('layouts.adminlayout')

@section('content')
<h1 class="text-[32px] font-bold text-gray-800 mb-6">Daftar User</h1>

<div class="flex justify-end mb-4">
    <a href="{{ route('admin.auth.add-user') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center gap-2">
        <i data-lucide="user-plus" class="w-4 h-4"></i>
        Tambah User
    </a>
</div>

<div class="w-full overflow-x-auto rounded-2xl shadow-md bg-white mt-2">
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Role</th>
                <th class="px-4 py-2 border">Foto</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr class="text-center">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($user->role) }}</td>
                    <td class="border px-4 py-2">
                        @if ($user->profile_image)
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Foto Profil"
                                class="w-12 h-12 object-cover rounded-full mx-auto">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2 flex justify-center gap-2">
                       <a href="{{ route('admin.edit-user', $user->id) }}" 
   class="text-blue-600 hover:text-blue-800" title="Edit">
   <i data-lucide="edit" class="w-5 h-5"></i>
</a>

                     <form action="{{ route('admin.delete-user', $user->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Yakin hapus user ini?')" title="Hapus" class="text-red-600 hover:text-red-800">
        <i data-lucide="trash" class="w-5 h-5"></i>
    </button>
</form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
