
<div
    x-show="sidebarOpen"
    x-transition.opacity
    @click="sidebarOpen = false"
    class="fixed inset-0 z-60  bg-black bg-opacity-50 md:hidden"
></div>

{{-- SIDEBAR MOBILE --}}
<aside
    x-show="sidebarOpen"
    x-transition
    @click.away="sidebarOpen = false"
    class="fixed inset-y-0 left-0 z-50 bg-[#D9D9D9] w-44 h-screen p-4 shadow-lg transition-all duration-300 md:hidden"
>
    <div class="text-xl font-bold mb-4 text-blue-700">
        Dash<span class="text-black">Publikasi</span>
    </div>

    <nav class="space-y-2 text-gray-700 font-medium z-99 text-[10px]">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 py-2 px-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
            Dashboard
        </a>

        <a href="{{ route('articles.index') }}"
           class="flex items-center gap-3 py-2 px-3 rounded-lg {{ request()->routeIs('articles.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">
            <i data-lucide="list" class="w-5 h-5"></i>
            Daftar Artikel
        </a>

        <a href="#" class="flex items-center gap-3 py-2 px-3 rounded-lg hover:bg-gray-100">
            <i data-lucide="user-plus" class="w-5 h-5"></i>
            Tambah Anggota
        </a>
    </nav>

    <form method="POST" action="{{ route('admin.logout') }}" class="absolute bottom-6 w-full px-4">
        @csrf
        <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm text-gray-500 hover:text-red-500">
            <i data-lucide="log-out" class="w-5 h-5"></i>
            Logout
        </button>
    </form>
</aside>

{{-- SIDEBAR DESKTOP --}}
<aside class="bg-[#D9D9D9] shadow-xl h-screen fixed top-0 left-0 z-40 hidden md:block transition-all duration-300"
    :class="sidebarOpen ? 'w-64' : 'w-20'">

<div class="px-6 py-4 text-2xl flex justify-center items-center">
    <div class="transition-all duration-200 flex items-center mr-11" x-show="sidebarOpen">
        <h3 class="text-blue-700 font-bold text-2xl">Dash<span class="text-black">Publikasi</span></h3>
    </div>
    <div class="transition-all duration-200 flex items-center space-x-0" x-show="!sidebarOpen">
        <h3 class="font-bold text-xl">
            <span class="text-blue-700">DS</span><span class="text-black">P</span>
        </h3>
    </div>
</div>

    {{-- Menu Utama --}}
    <nav class="px-4 mt-4 space-y-2 text-gray-700 font-medium">
        @php $isActive = request()->routeIs('admin.dashboard'); @endphp
        <a href="{{ route('admin.dashboard') }}"
           class="group flex items-center justify-center md:justify-start py-2 rounded-lg
           {{ $isActive ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-black' }}">
            <div class="w-12 flex justify-center">
                <img src="{{ asset($isActive ? 'img/logindashboard/icon/dashicon.png' : 'img/logindashboard/icon/dashiconblack.png') }}"
                     alt="Dashboard Icon" class="w-5 h-5">
            </div>
            <span
                class="transition-all duration-200 overflow-hidden whitespace-nowrap"
                :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                Dashboard
            </span>
        </a>

        @php $isArticleActive = request()->routeIs('articles.*'); @endphp
        <a href="{{ route('articles.index') }}"
           class="group flex items-center justify-center md:justify-start py-2 rounded-lg
           {{ $isArticleActive ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-black' }}">
            <div class="w-12 flex justify-center">
                <img src="{{ asset($isArticleActive ? 'img/logindashboard/icon/listiconwhite.png' : 'img/logindashboard/icon/listicon.png') }}"
                     alt="Daftar Artikel Icon" class="w-5 h-5">
            </div>
            <span
                class="transition-all duration-200 overflow-hidden whitespace-nowrap"
                :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                Daftar Artikel
            </span>
        </a>


        
        @php
            $isUserListActive = request()->routeIs(['admin.users', 'admin.edit-user', 'admin.auth.add-user']);
        @endphp
        <a href="{{ route('admin.users') }}" class="group flex items-center justify-center md:justify-start py-2 rounded-lg
            {{ $isUserListActive ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-black' }}">
            <div class="w-12 flex justify-center">
                <i data-lucide="users" class="w-5 h-5 {{ $isUserListActive ? 'text-white' : 'text-black' }}"></i>
            </div>
            <span class="transition-all duration-200 overflow-hidden whitespace-nowrap"
                :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                Daftar Anggota
            </span>
        </a>
    </nav>

    {{-- Logout --}}
    <div class="absolute bottom-6 w-full px-4">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center px-3 py-2 text-sm text-gray-500 hover:text-red-500">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                <span
                    class="transition-all duration-200 overflow-hidden whitespace-nowrap"
                    :class="sidebarOpen ? ' ml-3 opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                    Logout
                </span>
            </button>
        </form>
    </div>
</aside>
