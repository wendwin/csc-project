{{-- HANDLE BY PUTRA --}}
@extends('layouts.guest')

@section('content')

<div class="bg-white rounded-[50px] shadow-xl w-full max-w-xs sm:max-w-sm px-4 py-6 sm:px-6 sm:py-8 text-center mx-auto mb-0">

    {{-- messages --}}
    @if ($errors->any())
    <div x-data="{ show: true }" x-cloak>
        <div 
            x-show="show"
            x-transition
            class="fixed top-4 left-1/2 transform -translate-x-1/2 z-[9999] bg-white border border-red-500 text-red-700 px-4 py-3 rounded-[30px] shadow-lg w-[90%] sm:w-[70%] md:w-[50%] lg:w-[40%] xl:w-[30%]"
        >
            <div class="flex justify-between items-center gap-4">
                <span class="text-sm">{{ $errors->first() }}</span>
                <button @click="show = false" class="ml-auto text-red-600 hover:text-red-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    @endif

    {{-- Logo --}}
    <div class="flex justify-center gap-4 sm:gap-6 mb-6 sm:mb-8">
        <img src="{{ asset('img/logindashboard/pspi1.png') }}" class="h-12 sm:h-16" alt="Logo 1">
        <img src="{{ asset('img/logindashboard/csc.png') }}" class="h-12 sm:h-16" alt="Logo 2">
        <img src="{{ asset('img/logindashboard/Logo PustakaPemda 1.png') }}" class="h-12 sm:h-16" alt="Logo 3">
    </div>

    {{-- Header --}}
    <h1 class="text-black font-bold text-lg sm:text-xl">
        <span class="text-blue-500">Login</span> Admin
    </h1>
    <p class="text-sm sm:text-md text-gray-400 font-medium mb-8">Silahkan masuk untuk melanjutkan</p>

    {{-- Form --}}
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-1 text-left p-4 mb-0 -mt-11">
        @csrf

            <div>
                <label class="block text-md font-bold text-blue-500">Email</label>
                <input type="email" name="email" required
                    class="w-full px-2 h-[36px] border border-blue-500 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-md font-bold text-blue-500">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required
                        class="w-full px-2 h-[36px] border border-blue-500 rounded-md pr-10 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    <button type="button" onclick="togglePassword()" class="absolute top-2.5 right-2 text-gray-500 hover:text-gray-800">
                        <i id="eye-icon" data-lucide="eye" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
            <div>
            <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold h-[36px] rounded-md mt-10 mb-1 transition-all">
            Masuk
        </button>
        </div>
        
        {{-- Footer --}}
        <p class="text-md text-gray-300 font-semibold text-center mb-0 pt-0">&copy; {{ date('Y') }} Admin Panel. All right reserved.</p>
    </div>
</form>

{{-- Script --}}
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
