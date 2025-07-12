@extends('layouts.adminlayout')

@section('content')
<div class="max-w-4xl mx-auto mt-12 bg-white shadow-xl rounded-2xl p-8 relative">

    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Tambah User Baru</h2>

    <form method="POST" action="{{ route('admin.store-user') }}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama *</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Masukkan nama lengkap" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="example@email.com" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password *</label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Minimal 6 karakter" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password *</label>
                <input type="password" name="password_confirmation"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Ulangi password" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Role *</label>
                <select name="role"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:outline-none"
                    required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin pustaka pemda">Admin Pustaka Pemda</option>
                    <option value="admin csc">Admin CSC</option>
                    <option value="admin pspi">Admin PSPI</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil (Opsional)</label>
                <input type="file" name="profile_image" accept="image/*"
                    class="w-full text-sm border border-gray-300 rounded-lg px-4 py-2 file:mr-4 file:py-2 file:px-4
                           file:rounded file:border-0 file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                    onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="Preview" class="mt-3 w-24 h-24 rounded-full object-cover hidden" />
            </div>
        </div>

        <div class="flex justify-between gap-4 pt-8">
            <a href="{{ route('admin.users') }}"
               class="w-1/2 text-center bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg">
                Batal
            </a>
            <button type="submit"
                class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                Simpan
            </button>
        </div>
    </form>
</div>

{{-- Script Preview Gambar --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
