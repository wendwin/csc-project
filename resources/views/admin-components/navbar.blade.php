{{-- HANDLE BY PUTRA --}}
<header class="bg-white shadow px-4 py-2 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0">
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4 w-full sm:w-auto">
        {{-- Tombol toggle sidebar --}}
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 hover:text-blue-600 focus:outline-none">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>

        {{-- Kolom Search --}}
        <div class="relative w-full sm:w-64">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                <i data-lucide="search" class="w-4 h-4"></i>
            </span>
            <input
                type="text"
                placeholder="Cari..."
                class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-sm"
            >
        </div>
    </div>

    <div class="flex items-center gap-2 sm:gap-4 w-full sm:w-auto justify-between sm:justify-end">
        {{-- Foto Profil --}}
        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full overflow-hidden border-2 border-gray-300">
            <img src="https://i.pravatar.cc/100" alt="Profile" class="object-cover w-full h-full">
        </div>

        {{-- Nama dan Role --}}
        <div class="text-left sm:text-right">
            <div class="text-sm font-semibold text-gray-700 leading-tight">{{ Auth::user()->name ?? 'Vampire' }}</div>
            <div class="text-xs text-gray-500">Admin</div>
        </div>

        {{-- Dropdown Icon --}}
        <div class="w-6 h-6 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-100 cursor-pointer">
            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-600"></i>
        </div>
    </div>
</header>
