@extends('layouts.adminlayout')

@section('content')
<div class="flex items-center gap-2 mb-2 ">
    <a href="{{ route('admin.users') }}" class="flex items-center gap-2 text-black font-bold text-[20px] hover:text-blue-700">
        <div class="w-6 h-6 rounded-full border-2 border-blue-600 hover:border-blue-700 flex items-center justify-center">
            <i data-lucide="arrow-left" class="w-4 h-4 text-blue-600 hover:text-blue-700"></i>
        </div>
    </a>
</div>

<div
  :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full px-4 sm:px-6 md:px-0' : 'w-full px-4 sm:px-6 md:px-4'"
  class="transition-all duration-300">

    <div class="p-2 bg-[#FCFDFD] rounded-t-lg shadow border-b-1 border-gray-300 z-20 relative transition-all duration-300"
        :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full' : 'w-full'">
        <h2 class="text-[18px] font-bold ml-6">Tambah User</h2>
    </div>

    <form method="POST" action="{{ route('admin.store-user') }}" enctype="multipart/form-data"
        class="bg-white rounded-xl shadow-xl p-6 md:p-10 -mt-2">
        @csrf

     {{-- Avatar --}}
    <div class="flex justify-center">
        <div class="relative w-24 h-24 group cursor-pointer">

            {{-- Default Icon (tampil jika belum ada gambar) --}}
            <div id="defaultIcon" class="w-24 h-24 rounded-full border-4 border-white shadow-md bg-white flex items-center justify-center text-gray-400">
                <i data-lucide="user" class="w-10 h-10"></i>
            </div>

            {{-- Preview Gambar (disembunyikan awalnya) --}}
            <img id="avatarPreview" src="#" alt="Preview"
                class="w-24 h-24 rounded-full border-4 border-white shadow-md object-cover object-top bg-white hidden" />

            {{-- Icon edit --}}
            <div class="absolute bottom-0 right-0 bg-white p-[6px] rounded-full shadow-sm z-10 pointer-events-none">
                <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
            </div>

            {{-- Input file --}}
            <input type="file" name="profile_image" accept="image/*"
                class="absolute inset-0 opacity-0 cursor-pointer z-20"
                onchange="previewImage(event)">
        </div>
    </div>


        <div class="space-y-5 mt-4">
            <div class="flex items-center mb-4">
                <label class="w-48 text-sm text-gray-700 font-medium flex justify-between">
                    <span><span class="text-red-600">*</span> Nama</span>
                    <span class="pl-1">:</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] ml-2 focus:ring-blue-500 focus:outline-none bg-gray-50">
            </div>

            <div class="flex items-center mb-4">
                <label class="w-48 text-sm text-gray-700 font-medium flex justify-between">
                    <span><span class="text-red-600">*</span> Email</span>
                    <span class="pl-1">:</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] ml-2 focus:ring-blue-500 focus:outline-none bg-gray-50">
            </div>

            <div class="flex items-center mb-4">
                <label class="w-48 text-sm text-gray-700 font-medium flex justify-between">
                    <span><span class="text-red-600">*</span> Role</span>
                    <span class="pl-1">:</span>
                </label>
                <select name="role"
                    class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] ml-2 focus:ring-blue-500 focus:outline-none bg-gray-50">
                    <option value="">-- Pilih Role --</option>
                    <option value="admin pustaka pemda">Admin Pustaka Pemda</option>
                    <option value="admin csc">Admin CSC</option>
                    <option value="admin pspi">Admin PSPI</option>
                </select>
            </div>
       {{-- Password Section --}}
        <div class="space-y-3 mt-4 max-w-lg">
            <div x-data="{ show: false }" class="flex items-center relative">
                <label class="w-48 text-sm text-gray-700 font-medium flex justify-between items-center">
                    <span><span class="text-red-600">*</span> Atur Password</span>
                    <span class="pl-1">:</span>
                </label>
                <input :type="show ? 'text' : 'password'" name="password"
                    class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50 ml-2 pr-10">
                
                <div class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer" @click="show = !show">
                    <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                    <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                </div>
            </div>

            <div x-data="{ show: false }" class="flex items-center relative">
                <label class="w-48 text-sm text-gray-700 font-medium flex justify-between items-center">
                    <span><span class="text-red-600">*</span> Konfirmasi Password</span>
                    <span class="pl-1">:</span>
                </label>
                <input :type="show ? 'text' : 'password'" name="password_confirmation"
                    class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50 ml-2 pr-10">

                <div class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer" @click="show = !show">
                    <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                    <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                </div>
            </div>
        </div>
        {{-- Tombol --}}
        <div class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-between gap-4 pt-14 sm:px-28">
            <a href="{{ route('admin.users') }}"
               class="min-w-full sm:min-w-[48%] md:min-w-[100px] text-center bg-[#FF0000] hover:bg-red-500 text-white font-semibold py-2 px-4 rounded-lg">
                Batal
            </a>
            <button type="submit"
                    class="min-w-full sm:min-w-[48%] md:min-w-[100px] bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('avatarPreview');
        const icon = document.getElementById('defaultIcon');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                icon.classList.add('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
