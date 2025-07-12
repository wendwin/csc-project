@extends('layouts.adminlayout')

@section('content')
<div
  :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full px-4 sm:px-6 md:px-0' : 'w-full px-4 sm:px-6 md:px-4'"
  class="transition-all duration-300 mt-4">


        <div class="p-2 bg-[#FCFDFD] rounded-t-lg shadow border-b-1 border-gray-300 z-20 relative transition-all duration-300"
            :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full' : 'w-full'">
            <h2 class="text-[18px] font-bold ml-6">Edit User</h2>
        </div>

    <form method="POST" action="{{ route('admin.update-user', $user->id) }}" enctype="multipart/form-data"
        class="bg-white rounded-xl shadow-xl p-6 md:p-10 -mt-2">
        @csrf
        @method('PUT')

     {{-- Avatar --}}
<div class="flex justify-center mb-6">
   <div class="relative w-24 h-24 group cursor-pointer">
    {{-- Preview Gambar --}}
    <img id="avatarPreview"
         src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('default-avatar.png') }}"
         alt="Foto Profil"
         class="w-24 h-24 rounded-full border-4 border-white shadow-md object-cover object-top bg-white" />

    {{-- Icon edit (Lucide) --}}
    <div class="absolute bottom-0 right-0 bg-white p-[6px] rounded-full shadow-sm z-10 pointer-events-none">
        <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
    </div>

    {{-- Input file hidden --}}
    <input type="file" name="profile_image" accept="image/*"
           class="absolute inset-0 opacity-0 cursor-pointer z-20"
           onchange="previewAvatar(event)">
</div>
</div>


        {{-- Form Fields --}}
        <div class="space-y-5">
           <div class="flex items-center mb-4">
    <label class="w-24 text-sm text-gray-700 font-medium flex justify-between">
        <span>
            <span class="text-red-600">*</span> Nama
        </span>
        <span class="pl-1">:</span>
    </label>
    <input type="text" name="name" value="{{ old('name', $user->name) }}"
           class="flex-1 border border-gray-300 rounded-md px-3 h-[39px] ml-2 focus:ring-blue-500 focus:outline-none bg-gray-50">
</div>

<div class="flex items-center mb-4">
    <label class="w-24 text-sm text-gray-700 font-medium flex justify-between">
        <span>
            <span class="text-red-600">*</span> Email
        </span>
        <span class="pl-1">:</span>
    </label>
    <input type="email" value="{{ $user->email }}"
           class="flex-1 border border-gray-300 rounded-md px-3 h-[39px] ml-2 bg-gray-50" disabled>
</div>

<div class="flex items-center mb-4">
    <label class="w-24 text-sm text-gray-700 font-medium flex justify-between">
        <span>
            <span class="text-red-600">*</span> Role
        </span>
        <span class="pl-1">:</span>
    </label>
    <select name="role"
            class="flex-1 border border-gray-300 rounded-md px-3 h-[39px] ml-2 focus:ring-blue-500 focus:outline-none bg-gray-50">
        <option value="">-- Pilih Role --</option>
        <option value="admin pustaka pemda" {{ old('role', $user->role) === 'admin pustaka pemda' ? 'selected' : '' }}>Admin Pustaka Pemda</option>
        <option value="admin csc" {{ old('role', $user->role) === 'admin csc' ? 'selected' : '' }}>Admin CSC</option>
        <option value="admin pspi" {{ old('role', $user->role) === 'admin pspi' ? 'selected' : '' }}>Admin PSPI</option>
    </select>
</div>


    {{-- Password Section --}}
<h3 class="text-sm text-gray-500 font-semibold pt-4 max-w-lg">Ubah Password?</h3>

<div class="space-y-3 max-w-lg mt-4">
    <div class="flex items-center">
        <label class="w-48 text-sm text-gray-700 font-medium flex justify-between items-center">
            <span>Password Saat Ini</span>
            <span class="ml-4 mr-2">:</span>
        </label>
        <input type="password" name="current_password"
               class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50">
    </div>

    <div class="flex items-center">
        <label class="w-48 text-sm text-gray-700 font-medium flex justify-between items-center">
            <span>Password Baru</span>
            <span class="ml-4 mr-2">:</span>
        </label>
        <input type="password" name="password"
               class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50">
    </div>

    <div class="flex items-center">
        <label class="w-48 text-sm text-gray-700 font-medium flex justify-between items-center">
            <span>Konfirmasi Password Baru</span>
            <span class="ml-4 mr-2">:</span>
        </label>
        <input type="password" name="password_confirmation"
               class="flex-1 border border-gray-300 rounded-md px-2  h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50">
    </div>
</div>
        </div>

{{-- Tombol --}}
<div class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-between gap-4 mt-8 sm:px-28">
    <a href="{{ route('admin.users') }}"
       class="min-w-full sm:min-w-[48%] md:min-w-[120px] text-center bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg">
        Batal
    </a>
    <button type="submit"
        class="min-w-full sm:min-w-[48%] md:min-w-[120px] bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition">
        Simpan
    </button>
</div>



    </form>
</div>
@endsection

<script>
    function previewAvatar(event) {
        const input = event.target;
        const preview = document.getElementById('avatarPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
