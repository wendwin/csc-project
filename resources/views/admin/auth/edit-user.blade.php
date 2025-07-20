@extends('layouts.adminlayout')

@section('content')

@if ($errors->has('old_password') || $errors->has('password') || $errors->has('password_confirmation'))
<div x-data="{ show: true }" x-show="show" x-transition.duration.300ms
    class="fixed z-50 w-full max-w-md px-3 py-2 mt-12 text-red-500 transform -translate-x-1/2 bg-blue-100 border border-blue-200 rounded top-2 left-1/2"
    role="alert">
    <div class="flex items-start justify-between">
        <div class="space-y-1 text-sm font-medium text-left">
            @foreach (['old_password', 'password', 'password_confirmation'] as $field)
            @if ($errors->has($field))
            <div>{{ $errors->first($field) }}</div>
            @endif
            @endforeach
        </div>
        <button @click="show = false" class="ml-4 text-red-600 hover:text-red-900">
            &times;
        </button>
    </div>
</div>
@endif

<div class="flex items-center gap-2 mb-2 mt-14">
    <a href="{{ route('admin.users') }}"
        class="flex items-center gap-2 text-black font-bold text-[20px] hover:text-blue-700">
        <div
            class="flex items-center justify-center w-6 h-6 border-2 border-blue-600 rounded-full hover:border-blue-700">
            <i data-lucide="arrow-left" class="w-4 h-4 text-blue-600 hover:text-blue-700"></i>
        </div>
    </a>
    <h2 class="text-[20px] font-bold  ml-2">Edit Profil</h2>
</div>

<div :class="sidebarOpen ? 'max-w-[1138px] mx-auto w-full px-4 sm:px-6 md:px-0' : 'w-full px-4 sm:px-6 md:px-1'"
    class="transition-all duration-300">

    <div class="p-2 bg-[#FCFDFD] rounded-t-lg shadow border-b-1 border-gray-300 z-20 relative transition-all duration-300"
        :class="sidebarOpen ? 'max-w-[1138px] mx-auto w-full' : 'w-full'">
        <h2 class="text-[18px] font-bold ml-6">Profil</h2>
    </div>

    <form method="POST" action="{{ route('admin.update-user', $user->id) }}" enctype="multipart/form-data"
        class="p-6 -mt-2 bg-white shadow-xl rounded-xl md:p-10">
        @csrf
        @method('PUT')

        {{-- Avatar --}}
        <div class="flex justify-center mb-6">
            <div class="relative w-24 h-24 cursor-pointer group">
                <img id="avatarPreview"
                    src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('default-avatar.png') }}"
                    alt="Foto Profil"
                    class="object-cover object-top w-24 h-24 bg-white border-4 border-white rounded-full shadow-md" />
                <div class="absolute bottom-0 right-0 bg-white p-[6px] rounded-full shadow-sm z-10 pointer-events-none">
                    <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                </div>
                <input type="file" name="profile_image" accept="image/*"
                    class="absolute inset-0 z-20 opacity-0 cursor-pointer" onchange="previewAvatar(event)">
            </div>
        </div>

        {{-- Form Fields --}}
        <div class="space-y-5">
            <div class="relative flex items-center w-full mb-4">
                <label class="flex justify-between w-24 text-sm font-medium text-gray-700">
                    <span><span class="text-red-600">*</span> Nama</span>
                    <span class="pl-1">:</span>
                </label>
                <div class="relative flex-1 ml-2">
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full border border-gray-300 rounded-md px-3 pr-10 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none">
                    <div class="absolute transform -translate-y-1/2 pointer-events-none right-3 top-1/2">
                        <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="relative flex items-center w-full mb-4">
                <label class="flex justify-between w-24 text-sm font-medium text-gray-700">
                    <span><span class="text-red-600">*</span> Email</span>
                    <span class="pl-1">:</span>
                </label>
                <div class="relative flex-1 ml-2">
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border border-gray-300 rounded-md px-3 pr-10 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none">
                    <div class="absolute transform -translate-y-1/2 pointer-events-none right-3 top-1/2">
                        <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="relative flex items-center w-full mb-4">
                <label class="flex justify-between w-24 text-sm font-medium text-gray-700">
                    <span><span class="text-red-600">*</span> Role</span>
                    <span class="pl-1">:</span>
                </label>
                <div class="relative flex-1 ml-2">
                    <select name="role"
                        class="w-full border border-gray-300 rounded-md px-3 pr-10 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none">
                        <option value="">-- Pilih Role --</option>
                        <option value="admin pustaka pemda" {{ old('role', $user->role) === 'admin pustaka pemda' ?
                            'selected' : '' }}>Admin Pustaka Pemda</option>
                        <option value="admin csc" {{ old('role', $user->role) === 'admin csc' ? 'selected' : '' }}>Admin
                            CSC</option>
                        <option value="admin pspi" {{ old('role', $user->role) === 'admin pspi' ? 'selected' : ''
                            }}>Admin PSPI</option>
                    </select>
                    <div class="absolute transform -translate-y-1/2 pointer-events-none right-3 top-1/2">
                        <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>
            </div>

            {{-- Password Section --}}
            <div x-data="{ showPasswordForm: false }" class="hidden max-w-lg md:block">
                <h3 @click="showPasswordForm = !showPasswordForm"
                    class="pt-4 text-sm font-semibold text-gray-500 transition cursor-pointer hover:underline">
                    Ubah Password?
                </h3>
                <div x-show="showPasswordForm" x-transition class="mt-4 space-y-4">
                    <div x-data="{ show: false }" class="relative flex items-center">
                        <label class="flex items-center justify-between w-48 text-sm font-medium text-gray-700">
                            <span>Password Saat Ini</span>
                            <span class="ml-4 mr-2">:</span>
                        </label>
                        <input :type="show ? 'text' : 'password'" name="old_password"
                            class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none ml-2 pr-10">
                        <div class="absolute transform -translate-y-1/2 cursor-pointer right-4 top-1/2"
                            @click="show = !show">
                            <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                            <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                        </div>
                    </div>
                    <div x-data="{ show: false }" class="relative flex items-center">
                        <label class="flex items-center justify-between w-48 text-sm font-medium text-gray-700">
                            <span>Password Baru</span>
                            <span class="ml-4 mr-2">:</span>
                        </label>
                        <input :type="show ? 'text' : 'password'" name="password"
                            class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none ml-2 pr-10">
                        <div class="absolute transform -translate-y-1/2 cursor-pointer right-4 top-1/2"
                            @click="show = !show">
                            <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                            <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                        </div>
                    </div>
                    <div x-data="{ show: false }" class="relative flex items-center">
                        <label class="flex items-center justify-between w-48 text-sm font-medium text-gray-700">
                            <span>Konfirmasi Password Baru</span>
                            <span class="ml-4 mr-2">:</span>
                        </label>
                        <input :type="show ? 'text' : 'password'" name="password_confirmation"
                            class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none ml-2 pr-10">
                        <div class="absolute transform -translate-y-1/2 cursor-pointer right-4 top-1/2"
                            @click="show = !show">
                            <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                            <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Password Section - Mobile Only --}}
            <div x-data="{ showPasswordForm: false }" class="max-w-lg md:hidden">
                <h3 @click="showPasswordForm = !showPasswordForm"
                    class="pt-4 text-sm font-semibold text-gray-500 transition cursor-pointer hover:underline">
                    Ubah Password?
                </h3>

                <div x-show="showPasswordForm" x-transition class="mt-4 space-y-4">
                    <div x-data="{ show: false }">
                        <label class="block mb-1 text-sm font-medium text-gray-700">Password Saat Ini</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="old_password"
                                class="w-full border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none pr-10">
                            <div class="absolute inset-y-0 flex items-center cursor-pointer right-3"
                                @click="show = !show">
                                <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                                <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ show: false }">
                        <label class="block mb-1 text-sm font-medium text-gray-700">Password Baru</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="password"
                                class="w-full border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none pr-10">
                            <div class="absolute inset-y-0 flex items-center cursor-pointer right-3"
                                @click="show = !show">
                                <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                                <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ show: false }">
                        <label class="block mb-1 text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="password_confirmation"
                                class="w-full border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none pr-10">
                            <div class="absolute inset-y-0 flex items-center cursor-pointer right-3"
                                @click="show = !show">
                                <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                                <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                            </div>
                        </div>
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