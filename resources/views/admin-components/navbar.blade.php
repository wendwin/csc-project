{{-- HANDLE BY PUTRA --}}
<header class="bg-white shadow px-4 py-2 flex justify-between items-center">
    <div class="flex items-center space-x-4">
        {{-- Tombol toggle sidebar --}}
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 hover:text-blue-600 focus:outline-none">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>

        {{-- Kolom Search --}}
        <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                <i data-lucide="search" class="w-4 h-4"></i>
            </span>
            <input
                type="text"
                placeholder="Cari..."
                class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-sm w-64"
            >
        </div>
    </div>

    <div class="flex items-center space-x-4">
        {{-- Foto Profil --}}
        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-300">
            <img src="https://i.pravatar.cc/100" alt="Profile">
        </div>
    
        {{-- Nama dan Role --}}
        <div class="text-right">
            <div class="text-sm font-semibold text-gray-700">{{ Auth::user()->name ?? 'Vampire' }}</div>
            <div class="text-xs text-gray-500">Admin</div>
        </div>
    
        {{-- Icon V Terbalik (Dropdown) --}}
        <div class="w-6 h-6 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-100 cursor-pointer">
            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-600"></i>
        </div>
    </div>
    
</header>
