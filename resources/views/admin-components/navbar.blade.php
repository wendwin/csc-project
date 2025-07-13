{{-- <header :class="[
'bg-white shadow px-3 sm:px-4 py-2 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0 fixed top-0 left-0 right-0 transition-all duration-300 z-50 text-[12px] sm:text-[14px]',
sidebarOpen ? 'md:ml-64 ml-44' : 'md:ml-20 ml-0'
]"
>
    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-1 sm:gap-4 w-full sm:w-auto">
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 hover:text-blue-600 focus:outline-none">
            <i data-lucide="menu" class="w-5 h-5 sm:w-6 sm:h-6"></i>
        </button>
        <div class="relative w-full sm:w-50">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                <i data-lucide="search" class="w-4 h-4 sm:w-5 sm:h-5"></i>
            </span>
            <input
                type="text"
                placeholder="Cari..."
                class="w-full pl-9 pr-3 py-1.5 sm:py-1 rounded-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm"
            >
        </div>
    </div>

    <div class="flex items-center gap-1 sm:gap-4 w-full sm:w-auto justify-between sm:justify-end">
        <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full overflow-hidden border-2 border-gray-300">
            <img src="https://i.pravatar.cc/100" alt="Profile" class="object-cover w-full h-full">
        </div>

        <div class="text-left sm:text-right">
            <div class="text-xs sm:text-sm font-semibold text-gray-700 leading-tight">{{ Auth::user()->name ?? 'Vampire' }}</div>
            <div class="text-[10px] sm:text-xs text-gray-500">Admin</div>
        </div>

        <div class="w-5 h-5 sm:w-6 sm:h-6 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-100 cursor-pointer">
            <i data-lucide="chevron-down" class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-600"></i>
        </div>
    </div>
</header> --}}


<header
    :class="[
        'bg-white shadow px-3 py-2 flex flex-row items-center justify-between gap-2 fixed top-0 left-0 right-0 transition-all duration-300 z-50 text-xs sm:text-sm',
        sidebarOpen ? 'md:ml-64 ml-44' : 'md:ml-20 ml-0'
    ]">
    {{-- Toggle + Search --}}
    <div class="flex items-center gap-2 min-w-0 flex-1 md:max-w-[350px]">
        <button @click="sidebarOpen = !sidebarOpen"
            class="text-gray-600 hover:text-blue-600 focus:outline-none flex-shrink-0 md:ml-3">
            <i data-lucide="menu" class="w-4 h-4 sm:w-5 sm:h-5"></i>
        </button>
        <div class="relative w-full md:ml-3">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                <i data-lucide="search" class="w-3.5 h-3.5 sm:w-4 sm:h-4"></i>
            </span>
            <input type="text" placeholder="Cari..."
                class="w-full pl-9 pr-3 py-1.5 rounded-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm bg-gray-200">
        </div>
    </div>

    {{-- Profile --}}
    <div class="flex items-center gap-2 flex-shrink-0">
        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full overflow-hidden border-2 border-gray-300">
            @if (Auth::user()->profile_image)
                <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile"
                    class="w-full h-full object-cover object-top">
            @else
                <img src="https://i.pravatar.cc/100" alt="Default Profile"
                    class="w-full h-full object-cover object-top">
            @endif
        </div>
        <div class="text-left">
            <div class="text-[11px] sm:text-sm font-semibold text-gray-700 truncate max-w-[80px]">
                {{ Auth::user()->name ?? 'Vampire' }}
            </div>
            <div class="text-[10px] sm:text-xs text-gray-500 truncate">
                {{ ucfirst(Auth::user()->role) ?? '-' }}
            </div>
        </div>
        {{-- Dropdown dengan Alpine.js --}}
        <div x-data="{ open: false }" class="relative">
            <div @click="open = !open"
                class="w-5 h-5 sm:w-6 sm:h-6 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-100 cursor-pointer">
                <i data-lucide="chevron-down" class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-600"></i>
            </div>

            {{-- Dropdown Menu --}}
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg z-50 border border-gray-200">
                <a href="{{ route('admin.edit-user', Auth::user()->id) }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Edit Profil
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
