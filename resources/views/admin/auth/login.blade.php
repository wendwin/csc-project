{{-- HANDLE BY PUTRA --}}
@extends('layouts.guest')

@section('content')
<div class="bg-white shadow-xl rounded-2xl p-8">
    <div class="text-center mb-6">
        <div class="w-16 h-16 mx-auto mb-2 text-blue-600">
            <i data-lucide="shield-check" class="w-full h-full"></i>
        </div>
        <h1 class="text-2xl font-bold text-blue-600">Login Admin</h1>
        <p class="text-sm text-gray-500">Silakan masuk untuk melanjutkan</p>
    </div>

    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
        @csrf
        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
            <div class="relative">
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 pr-10">
                <button type="button" onclick="togglePassword()" class="absolute top-2.5 right-2 text-gray-600 hover:text-gray-800">
                    <i id="eye-icon" data-lucide="eye" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <div>
            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all">
                Masuk
            </button>
        </div>
    </form>

    <div class="mt-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Admin Panel. All rights reserved.
    </div>
</div>

{{-- Script toggle password + render icon --}}
<script>
    lucide.createIcons();

    function togglePassword() {
        const input = document.getElementById("password");
        const eyeIcon = document.getElementById("eye-icon");

        if (input.type === "password") {
            input.type = "text";
            eyeIcon.setAttribute("data-lucide", "eye-off");
        } else {
            input.type = "password";
            eyeIcon.setAttribute("data-lucide", "eye");
        }

        lucide.createIcons(); 
    }
</script>
@endsection
