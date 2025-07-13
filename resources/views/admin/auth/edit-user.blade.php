@extends('layouts.adminlayout')

@section('content')

    @if ($errors->has('old_password') || $errors->has('password') || $errors->has('password_confirmation'))
        <div x-data="{ show: true }" x-show="show" x-transition.duration.300ms
            class="fixed top-2 mt-12 left-1/2 transform -translate-x-1/2 z-50 bg-blue-100 border border-blue-200 text-red-500 px-3 py-2 rounded w-full max-w-md"
            role="alert">
            <div class="flex justify-between items-start">
                <div class="text-sm text-left space-y-1 font-medium">
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

    <div class="flex items-center gap-2 mb-2">
        <a href="{{ route('admin.users') }}"
            class="flex items-center gap-2 text-black font-bold text-[20px] hover:text-blue-700">
            <div
                class="w-6 h-6 rounded-full border-2 border-blue-600 hover:border-blue-700 flex items-center justify-center">
                <i data-lucide="arrow-left" class="w-4 h-4 text-blue-600 hover:text-blue-700"></i>
            </div>
        </a>
        <h2 class="text-[20px] font-bold  ml-2">Edit Profil</h2>
    </div>

    <div :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full px-4 sm:px-6 md:px-0' : 'w-full px-4 sm:px-6 md:px-1'"
        class="transition-all duration-300">

        <div class="p-2 bg-[#FCFDFD] rounded-t-lg shadow border-b-1 border-gray-300 z-20 relative transition-all duration-300"
            :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full' : 'w-full'">
            <h2 class="text-[18px] font-bold ml-6">Profil</h2>
        </div>

        <form method="POST" action="{{ route('admin.update-user', $user->id) }}" enctype="multipart/form-data"
            class="bg-white rounded-xl shadow-xl p-6 md:p-10 -mt-2">
            @csrf
            @method('PUT')

            {{-- Avatar --}}
            <div class="flex justify-center mb-6">
                <div class="relative w-24 h-24 group cursor-pointer">
                    <img id="avatarPreview"
                        src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('default-avatar.png') }}"
                        alt="Foto Profil"
                        class="w-24 h-24 rounded-full border-4 border-white shadow-md object-cover object-top bg-white" />
                    <div class="absolute bottom-0 right-0 bg-white p-[6px] rounded-full shadow-sm z-10 pointer-events-none">
                        <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                    </div>
                    <input type="file" name="profile_image" accept="image/*"
                        class="absolute inset-0 opacity-0 cursor-pointer z-20" onchange="previewAvatar(event)">
                </div>
            </div>

            {{-- Form Fields --}}
            <div class="space-y-5">
            <div class="flex items-center mb-4 relative w-full">
                <label class="w-24 text-sm text-gray-700 font-medium flex justify-between">
                    <span><span class="text-red-600">*</span> Nama</span>
                    <span class="pl-1">:</span>
                </label>
                <div class="relative flex-1 ml-2">
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full border border-gray-300 rounded-md px-3 pr-10 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none">
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                        <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="flex items-center mb-4 relative w-full">
                <label class="w-24 text-sm text-gray-700 font-medium flex justify-between">
                    <span><span class="text-red-600">*</span> Email</span>
                    <span class="pl-1">:</span>
                </label>
                <div class="relative flex-1 ml-2">
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border border-gray-300 rounded-md px-3 pr-10 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none">
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                        <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="flex items-center mb-4 relative w-full">
                <label class="w-24 text-sm text-gray-700 font-medium flex justify-between">
                    <span><span class="text-red-600">*</span> Role</span>
                    <span class="pl-1">:</span>
                </label>
                <div class="relative flex-1 ml-2">
                    <select name="role"
                        class="w-full border border-gray-300 rounded-md px-3 pr-10 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none">
                        <option value="">-- Pilih Role --</option>
                        <option value="admin pustaka pemda" {{ old('role', $user->role) === 'admin pustaka pemda' ? 'selected' : '' }}>Admin Pustaka Pemda</option>
                        <option value="admin csc" {{ old('role', $user->role) === 'admin csc' ? 'selected' : '' }}>Admin CSC</option>
                        <option value="admin pspi" {{ old('role', $user->role) === 'admin pspi' ? 'selected' : '' }}>Admin PSPI</option>
                    </select>
                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                        <i data-lucide="pencil" class="w-4 h-4 text-blue-600"></i>
                    </div>
                </div>
            </div>
            
                {{-- Password Section --}}
                <div x-data="{ showPasswordForm: false }" class="max-w-lg">
                    <h3 @click="showPasswordForm = !showPasswordForm"
                        class="text-sm text-gray-500 font-semibold pt-4 cursor-pointer hover:underline transition">
                        Ubah Password?
                    </h3>
                   <div x-show="showPasswordForm" x-transition class="space-y-4 mt-4">
                    <div x-data="{ show: false }" class="flex items-center relative">
                        <label class="w-48 text-sm text-gray-700 font-medium flex justify-between items-center">
                            <span>Password Saat Ini</span>
                            <span class="ml-4 mr-2">:</span>
                        </label>
                        <input :type="show ? 'text' : 'password'" name="old_password"
                            class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none ml-2 pr-10">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer" @click="show = !show">
                            <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                            <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                        </div>
                    </div>
                    <div x-data="{ show: false }" class="flex items-center relative">
                        <label class="w-48 text-sm text-gray-700 font-medium flex justify-between items-center">
                            <span>Password Baru</span>
                            <span class="ml-4 mr-2">:</span>
                        </label>
                        <input :type="show ? 'text' : 'password'" name="password"
                            class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none ml-2 pr-10">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer" @click="show = !show">
                            <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                            <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                        </div>
                    </div>
                    <div x-data="{ show: false }" class="flex items-center relative">
                        <label class="w-48 text-sm text-gray-700 font-medium flex justify-between items-center">
                            <span>Konfirmasi Password Baru</span>
                            <span class="ml-4 mr-2">:</span>
                        </label>
                        <input :type="show ? 'text' : 'password'" name="password_confirmation"
                            class="flex-1 border border-gray-300 rounded-md px-2 h-[39px] bg-gray-50 focus:ring-blue-500 focus:outline-none ml-2 pr-10">
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer" @click="show = !show">
                            <i x-show="!show" data-lucide="eye" class="w-4 h-4 text-gray-500"></i>
                            <i x-show="show" data-lucide="eye-off" class="w-4 h-4 text-blue-600"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-between gap-4 mt-8 sm:px-28">
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
