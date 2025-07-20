@extends('layouts.adminlayout')

@section('content')
<div class="flex items-center gap-2 mb-2 mt-14 ">
    <a href="{{ route('admin.users') }}"
        class="flex items-center gap-2 text-black font-bold text-[20px] hover:text-blue-700">
        <div
            class="flex items-center justify-center w-6 h-6 border-2 border-blue-600 rounded-full hover:border-blue-700">
            <i data-lucide="arrow-left" class="w-4 h-4 text-blue-600 hover:text-blue-700"></i>
        </div>
    </a>
</div>

<div :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full px-4 sm:px-6 md:px-0' : 'w-full px-4 sm:px-6 md:px-4'"
    class="transition-all duration-300">

    <div class="p-2 bg-[#FCFDFD] rounded-t-lg shadow border-b-1 border-gray-300 z-20 relative transition-all duration-300"
        :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full' : 'w-full'">
        <h2 class="text-[18px] font-bold ml-6">Tambah User</h2>
    </div>

    <form method="POST" action="{{ route('admin.store-user') }}" enctype="multipart/form-data"
        class="p-6 -mt-2 bg-white shadow-xl rounded-xl md:p-10">
        @csrf

        {{-- Avatar --}}
        <div class="flex justify-center mb-8">
            <div class="relative w-24 h-24 cursor-pointer group">
                <div id="defaultIcon"
                    class="flex items-center justify-center w-24 h-24 text-gray-400 bg-white border-4 border-white rounded-full shadow-md">
                    <i data-lucide="user" class="w-10 h-10"></i>
                </div>
                <img id="avatarPreview" src="#" alt="Preview"
                    class="hidden object-cover object-top w-24 h-24 bg-white border-4 border-white rounded-full shadow-md" />
                <div class="absolute bottom-0 right-0 bg-white p-[6px] rounded-full shadow-sm z-10 pointer-events-none">
                    <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                </div>
                <input type="file" name="profile_image" accept="image/*"
                    class="absolute inset-0 z-20 opacity-0 cursor-pointer" onchange="previewImage(event)">
            </div>
        </div>


        <div class="mt-4 space-y-5">
            <div class="flex items-center mb-4">
                <label class="flex justify-between w-48 text-sm font-medium text-gray-700">
                    <span><span class="text-red-600">*</span> Nama</span>
                    <span class="pl-1">:</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] ml-2 focus:ring-blue-500 focus:outline-none bg-gray-50">
            </div>

            <div class="flex items-center mb-4">
                <label class="flex justify-between w-48 text-sm font-medium text-gray-700">
                    <span><span class="text-red-600">*</span> Email</span>
                    <span class="pl-1">:</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] ml-2 focus:ring-blue-500 focus:outline-none bg-gray-50">
            </div>

            <div class="flex items-center mb-4">
                <label class="flex justify-between w-48 text-sm font-medium text-gray-700">
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
            <div class="hidden max-w-lg mt-4 space-y-3 md:block">
                <div x-data="{ show: false }" class="relative flex items-center">
                    <label class="flex items-center justify-between w-48 text-sm font-medium text-gray-700">
                        <span><span class="text-red-600">*</span> Atur Password</span>
                        <span class="pl-1">:</span>
                    </label>
                    <input :type="show ? 'text' : 'password'" name="password"
                        class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50 ml-2 pr-10">

                    <div class="absolute transform -translate-y-1/2 cursor-pointer right-4 top-1/2"
                        @click="show = !show">
                        <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                        <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>

                <div x-data="{ show: false }" class="relative flex items-center">
                    <label class="flex items-center justify-between w-48 text-sm font-medium text-gray-700">
                        <span><span class="text-red-600">*</span> Konfirmasi Password</span>
                        <span class="pl-1">:</span>
                    </label>
                    <input :type="show ? 'text' : 'password'" name="password_confirmation"
                        class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50 ml-2 pr-10">

                    <div class="absolute transform -translate-y-1/2 cursor-pointer right-4 top-1/2"
                        @click="show = !show">
                        <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                        <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>
            </div>

            {{-- Password Section - Tablet & Mobile --}}
            <div class="max-w-lg mt-4 space-y-3 md:hidden">
                <div x-data="{ show: false }" class="relative">
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        <span class="text-red-600">*</span> Atur Password
                    </label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" name="password"
                            class="w-full border border-gray-300 rounded-md px-2 h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50 pr-10">
                        <div class="absolute inset-y-0 flex items-center cursor-pointer right-3" @click="show = !show">
                            <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                            <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                        </div>
                    </div>
                </div>

                <div x-data="{ show: false }" class="relative">
                    <label class="block mb-1 text-sm font-medium text-gray-700">
                        <span class="text-red-600">*</span> Konfirmasi Password
                    </label>
                    <div class="relative">
                        <input :type="show ? 'text' : 'password'" name="password_confirmation"
                            class="w-full border border-gray-300 rounded-md px-2 h-[39px] focus:ring-blue-500 focus:outline-none bg-gray-50 pr-10">
                        <div class="absolute inset-y-0 flex items-center cursor-pointer right-3" @click="show = !show">
                            <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                            <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol - Tablet & Desktop --}}
            <div class="hidden pt-6 md:flex md:flex-row md:justify-between md:gap-4 sm:px-28">
                <a href="{{ route('admin.users') }}"
                    class="w-full md:w-[48%] lg:w-[100px] text-center bg-[#FF0000] hover:bg-red-500 text-white font-semibold py-2 px-4 rounded-md">
                    Batal
                </a>
                <button type="submit"
                    class="w-full md:w-[48%] lg:w-[100px] bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md transition">
                    Simpan
                </button>
            </div>

            {{-- Tombol - Mobile Only --}}
            <div class="flex flex-col gap-3 px-4 pt-6 md:hidden">
                <a href="{{ route('admin.users') }}"
                    class="w-full text-center bg-[#FF0000] hover:bg-red-500 text-white font-semibold py-2 px-4 rounded-md">
                    Batal
                </a>
                <button type="submit"
                    class="w-full px-4 py-2 font-semibold text-white transition bg-blue-500 rounded-md hover:bg-blue-600">
                    Simpan
                </button>
            </div>
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