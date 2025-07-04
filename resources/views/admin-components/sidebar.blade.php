{{-- HANDLE BY PUTRA --}}
<aside 
    class="bg-white shadow-xl h-screen sticky top-0 hidden md:block transition-all duration-300"
    :class="sidebarOpen ? 'w-64' : 'w-20'"
>
    {{-- Judul Sidebar --}}
    <div class="px-6 py-4 text-2xl flex items-center space-x-2">
        <div 
            class="transition-all duration-200 flex items-center space-x-1"
            :class="sidebarOpen ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'"
        >
        <h3 class="text-blue-700 font-bold">Dash<span class="text-black">Publikasi</span>
        </h3>
        </div>
    </div>

    {{-- Menu Utama --}}
    <nav class="px-4 mt-4 space-y-2 text-gray-700 font-medium">
        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
        class="group flex items-center justify-center md:justify-start py-2 rounded-lg
               {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
         <div class="w-12 flex justify-center">
             <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
         </div>
         <span 
             class="transition-all duration-200 overflow-hidden whitespace-nowrap"
             :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
             Dashboard
         </span>
     </a>

       {{-- Daftar Artikel --}}
    <a href="{{ route('articles.index') }}"
        class="group flex items-center justify-center md:justify-start py-2 rounded-lg
            {{ request()->routeIs('articles.*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-100 text-gray-700' }}">
        <div class="w-12 flex justify-center">
            <i data-lucide="file-text" class="w-5 h-5"></i>
        </div>
        <span 
            class="transition-all duration-200 overflow-hidden whitespace-nowrap"
            :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
            Daftar Artikel
        </span>
        </a>
        
        <a href="#"
                class="group flex items-center justify-center md:justify-start py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                <div class="w-12 flex justify-center">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                </div>
                <span 
                    class="transition-all duration-200 overflow-hidden whitespace-nowrap"
                    :class="sidebarOpen ? 'opacity-100 w-auto' : 'ml-0 opacity-0 w-0'">
                    Tambah Anggota
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
