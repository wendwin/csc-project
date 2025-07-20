<div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
    class="fixed inset-0 h-screen bg-sky-200/20 backdrop-blur-sm z-[10] md:hidden"></div>

{{-- SIDEBAR MOBILE --}}
<aside x-show="sidebarOpen" x-transition @click.away="sidebarOpen = false"
    class="fixed inset-y-0 left-0 z-50 h-screen p-4 transition-all duration-300 bg-white border shadow-sm border-r-1 border-slate-50 w-44 md:hidden">
    <div class="mb-4 ml-1 text-xl font-bold text-blue-700">
        Dash<span class="text-black">Publikasi</span>
    </div>

    <nav class="space-y-2 text-gray-700 font-medium z-99 text-[10px] -ml-2">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 py-2 px-3 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">
            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
            Dashboard
        </a>

        <a href="{{ route('articles.index') }}"
            class="flex items-center gap-3 py-2 px-3 rounded-md {{ request()->routeIs('articles.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">
            <i data-lucide="list" class="w-5 h-5"></i>
            Daftar Artikel
        </a>

        <a href="{{ route('admin.users') }}"
            class="flex items-center gap-3 py-2 px-3 rounded-md {{ request()->routeIs(['admin.users', 'admin.edit-user', 'admin.auth.add-user']) ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">
            <i data-lucide="users" class="w-5 h-5"></i>
            Daftar Pengguna
        </a>
        
        <a href="{{ route('admin.posters.index') }}"
            class="flex items-center gap-3 py-2 px-3 rounded-md {{ request()->routeIs('admin.posters.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">
            <i data-lucide="image" class="w-5 h-5"></i>
            Daftar Poster
        </a>
    </nav>

    <form method="POST" action="{{ route('admin.logout') }}" class="absolute w-full px-4 bottom-6">
        @csrf
        <button type="submit"
            class="flex items-center w-full gap-2 px-3 py-2 -ml-4 text-sm text-white bg-red-600 rounded-md hover:text-red-500">
            <i data-lucide="log-out" class="w-5 h-5"></i>
            Logout
        </button>
    </form>
</aside>

{{-- SIDEBAR DESKTOP --}}
<aside
    class="fixed top-0 left-0 z-40 hidden h-screen overflow-y-auto transition-all duration-300 bg-white border shadow-sm border-r-1 md:block border-slate-50"
    :class="sidebarOpen ? 'w-64' : 'w-20'">
    <div class="flex items-center justify-center px-6 py-4 text-2xl">
        <div class="flex items-center mr-3 transition-all duration-200" x-show="sidebarOpen" x-cloak>
            <h3 class="text-2xl font-bold text-blue-700">Dash<span class="text-black">Publikasi</span></h3>
        </div>
        <div class="flex items-center space-x-0 transition-all duration-200" x-show="!sidebarOpen" x-cloak>
            <h3 class="text-xl font-bold">
                <span class="text-blue-700">DS</span><span class="text-black">P</span>
            </h3>
        </div>
    </div>

    {{-- Menu Utama --}}
    <nav class="left-0 px-4 mt-2 space-y-2 font-medium text-gray-700">
        @php $isActive = request()->routeIs('admin.dashboard'); @endphp
        <a href="{{ route('admin.dashboard') }}" class="relative block pl-2 group">
            @if ($isActive)
                <span class="absolute w-1 bg-blue-600 rounded-r-full -left-2 top-1 bottom-1"></span>
            @endif
            <div class="flex items-center justify-center md:justify-start py-2 pr-2 pl-2 rounded-md transition-all
                {{ $isActive ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-black' }}">
                
                <div class="flex justify-center w-12">
                    <img src="{{ asset($isActive ? 'img/logindashboard/icon/dashicon.png' : 'img/logindashboard/icon/dashiconblack.png') }}"
                        alt="Dashboard Icon" class="w-5 h-5">
                </div>
                <span class="overflow-hidden transition-all duration-200 whitespace-nowrap"
                    :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                    Dashboard
                </span>
            </div>
        </a>

        {{-- Daftar Artikel --}}
        @php $isArticleActive = request()->routeIs('articles.*'); @endphp
        <a href="{{ route('articles.index') }}" class="relative block pl-2 group">
            @if ($isArticleActive)
                <span class="absolute w-1 bg-blue-600 rounded-r-full -left-2 top-1 bottom-1"></span>
            @endif

            <div class="flex items-center justify-center md:justify-start py-2 pr-2 pl-2 rounded-md transition-all
                {{ $isArticleActive ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-black' }}">
                
                <div class="flex justify-center w-12">
                    <img src="{{ asset($isArticleActive ? 'img/logindashboard/icon/listiconwhite.png' : 'img/logindashboard/icon/listicon.png') }}"
                        alt="Daftar Artikel Icon" class="w-5 h-5">
                </div>
                <span class="overflow-hidden transition-all duration-200 whitespace-nowrap"
                    :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                    Daftar Artikel
                </span>
            </div>
        </a>

   {{-- Daftar Pengguna --}}
        @php
            $isUserListActive = request()->routeIs(['admin.users', 'admin.edit-user', 'admin.auth.add-user']);
        @endphp
        <a href="{{ route('admin.users') }}" class="relative block pl-2 group">
            @if ($isUserListActive)
                <span class="absolute w-1 bg-blue-600 rounded-r-full -left-2 top-1 bottom-1"></span>
            @endif

            <div class="flex items-center justify-center md:justify-start py-2 pr-2 pl-2 rounded-md transition-all
                {{ $isUserListActive ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-black' }}">
                
                <div class="flex justify-center w-12">
                    <i data-lucide="users" class="w-5 h-5 {{ $isUserListActive ? 'text-white' : 'text-black' }}"></i>
                </div>
                <span class="overflow-hidden transition-all duration-200 whitespace-nowrap"
                    :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                    Daftar Pengguna
                </span>
            </div>
        </a>


            @php $isPosterActive = request()->routeIs('admin.posters.*'); @endphp
        <a href="{{ route('admin.posters.index') }}" class="relative block pl-2 group">
            @if ($isPosterActive)
                <span class="absolute w-1 bg-blue-600 rounded-r-full -left-2 top-1 bottom-1"></span>
            @endif

            <div class="flex items-center justify-center md:justify-start py-2 pr-2 pl-2 rounded-md transition-all
                {{ $isPosterActive ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-black' }}">
                
                <div class="flex justify-center w-12">
                    <i data-lucide="image"
                        class="w-5 h-5 {{ $isPosterActive ? 'text-white' : 'text-gray-700 group-hover:text-black' }}"></i>
                </div>
                <span class="overflow-hidden transition-all duration-200 whitespace-nowrap"
                    :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                    Daftar Poster
                </span>
            </div>
        </a>
    </nav>

   {{-- Logout --}}
<div class="absolute w-full px-4 bottom-6">
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="relative block w-full pl-2 group">
            {{-- Border kiri biru --}}
            <span class="absolute w-1 bg-red-600 rounded-r-full -left-2 top-1 bottom-1"></span>

            <div class="flex items-center justify-center py-2 pl-2 pr-2 text-white transition-all bg-red-500 border border-red-600 rounded-md md:justify-start hover:bg-red-600">
                
                <div class="flex justify-center w-12">
                    <i data-lucide="log-out" class="w-5 h-5 text-white"></i>
                </div>
                <span class="overflow-hidden transition-all duration-200 whitespace-nowrap"
                    :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0'">
                    Logout
                </span>
            </div>
        </button>
    </form>
</div>



</aside>
