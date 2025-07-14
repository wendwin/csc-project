{{-- INI NAVBAR UNTUK WEBISTE PUSTAKA PEMDA, SILAHKAN DISESUIKAN. INGET!!! HARUS CLINE CODE --}}
{{-- HANDLE BY ALDO OR FAISAL --}}

<div class="min-h-full" x-data="{ isOpen: false, showTopbar: true }" x-init="let lastScroll = window.pageYOffset;
window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    showTopbar = currentScroll === 0;
    lastScroll = currentScroll;
});">

    {{-- Top Navbar --}}
    <nav class="hidden xl:block fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-[#2C80FF] via-[#4576F0] to-[#2C437F]"
        :class="{ '-translate-y-full': !showTopbar, 'translate-y-0': showTopbar }">
        <div class="mx-auto px-8 py-2 flex justify-between items-center">

            <!-- Kontak -->
            <div class="flex items-center gap-6 text-xs text-white">
                <a href="#" class="flex items-center gap-1">
                    <i data-lucide="mail" class="w-4 h-4"></i>
                    <span>pustakapemda@gmail.com</span>
                </a>
                <div class="flex items-center gap-1">
                    <i data-lucide="phone" class="w-3 h-3"></i>
                    <span>0822-2122-2177</span>
                </div>
            </div>

            <!-- Alamat dan Sosial Media -->
            <div class="flex items-center gap-8">
                <p class="text-xs text-white">
                    <span class="font-semibold">Office</span> : Jl. Sidomukti No 30, Kel. Kadipaten, Kec. Keraton, Kota
                    Yogyakarta, Daerah Istimewa Yogyakarta (55132)
                </p>
                <div class="flex items-center gap-3">
                    <a href="#" class="group">
                        <div
                            class="w-6 h-6 rounded-full bg-white flex items-center justify-center group-hover:bg-[#2C80FF]">
                            <i data-lucide="facebook" class="w-4 h-4 text-[#2C437F] group-hover:text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="group">
                        <div
                            class="w-6 h-6 rounded-full bg-white flex items-center justify-center group-hover:bg-[#2C80FF]">
                            <i data-lucide="instagram" class="w-4 h-4 text-[#2C437F] group-hover:text-white"></i>
                        </div>
                    </a>
                    <a href="#" class="group">
                        <div
                            class="w-6 h-6 rounded-full bg-white flex items-center justify-center group-hover:bg-[#2C80FF]">
                            <i data-lucide="linkedin" class="w-4 h-4 text-[#2C437F] group-hover:text-white"></i>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </nav>

    {{-- Main Navbar --}}
    <nav class="bg-white shadow-md fixed top-0 inset-x-0 z-40 transition duration-300 ease-in-out py-2"
        :class="showTopbar ? 'xl:mt-[40px]' : 'xl:mt-0'">
        <div class="mx-auto max-w-7xl px-4">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center justify-between w-full">
                    <div class="shrink-0 flex items-center gap-3">
                        <a href="{{ route('website2.home') }}">
                            <img class="h-14 w-14" src="{{ asset('img/pustakapemda/Logo PustakaPemda 1.png') }}"
                                alt="Pustaka Pemda" />
                        </a>
                        <div class="hidden lg:block lg:w-1/2">
                            <p class="text-base font-semibold text-[#2C437F]">PUSAT TATA KELOLA KEUANGAN DAN PEMBANGUNAN
                                DAERAH</p>
                        </div>
                    </div>

                    <div class="hidden md:flex items-center space-x-4">
                        <!-- Menu -->
                        <a href="{{ route('website2.home') }}"
                            class="rounded-full px-3 py-2 text-sm font-medium flex items-center gap-1
                            {{ request()->routeIs('website2.home')
                                ? 'bg-gradient-to-r from-[#2C80FF] to-[#436dd7] text-white'
                                : 'text-gray-700 hover:bg-gradient-to-r from-[#2C80FF] to-[#436dd7] hover:text-white' }}"
                            aria-current="page"><i data-lucide="house" class="w-5 h-5"></i>Beranda</a>
                        <a href="{{ route('website2.profil') }}"
                            class="rounded-full px-3 py-2 text-sm font-medium flex items-center gap-1
                            {{ request()->routeIs('website2.profil')
                                ? 'bg-gradient-to-r from-[#2C80FF] to-[#436dd7] text-white'
                                : 'text-gray-700 hover:bg-gradient-to-r from-[#2C80FF] to-[#436dd7] hover:text-white' }}">
                            <i data-lucide="building-2" class="w-5 h-5"></i>Profil</a>
                        <a href="{{ route('website2.layanan') }}"
                            class="rounded-full px-3 py-2 text-sm font-medium flex items-center gap-1
                            {{ request()->routeIs('website2.layanan')
                                ? 'bg-gradient-to-r from-[#2C80FF] to-[#436dd7] text-white'
                                : 'text-gray-700 hover:bg-gradient-to-r from-[#2C80FF] to-[#436dd7] hover:text-white' }}">
                            <i data-lucide="list-todo" class="w-5 h-5"></i>Layanan</a>
                        <a href="{{ route('website2.kontak') }}"
                            class="rounded-full px-3 py-2 text-sm font-medium flex items-center gap-1
                            {{ request()->routeIs('website2.kontak')
                                ? 'bg-gradient-to-r from-[#2C80FF] to-[#436dd7] text-white'
                                : 'text-gray-700 hover:bg-gradient-to-r from-[#2C80FF] to-[#436dd7] hover:text-white' }}">
                            <i data-lucide="phone" class="w-5 h-5"></i>Kontak</a>
                    </div>
                </div>


                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button @click="isOpen = !isOpen" type="button"
                        class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gradient-to-r from-[#2C80FF] to-[#436dd7] hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                            data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show="isOpen" class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{ route('website2.home') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium 
                    {{ request()->routeIs('website2.home') 
                    ? 'text-white bg-gradient-to-r from-[#2C80FF] to-[#436dd7]' 
                    : 'text-gray-900 hover:text-[#436dd7]' }}"
                    aria-current="{{ request()->routeIs('website2.home') ? 'page' : '' }}">
                    Beranda
                </a>

                <a href="{{ route('website2.profil') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium 
                    {{ request()->routeIs('website2.profil') 
                    ? 'text-white bg-gradient-to-r from-[#2C80FF] to-[#436dd7]' 
                    : 'text-gray-900 hover:text-[#436dd7]' }}"
                    aria-current="{{ request()->routeIs('website2.profil') ? 'page' : '' }}">
                    Profil
                </a>

                <a href="{{ route('website2.layanan') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium 
                    {{ request()->routeIs('website2.layanan') 
                    ? 'text-white bg-gradient-to-r from-[#2C80FF] to-[#436dd7]' 
                    : 'text-gray-900 hover:text-[#436dd7]' }}"
                    aria-current="{{ request()->routeIs('website2.layanan') ? 'page' : '' }}">
                    Layanan
                </a>

                <a href="{{ route('website2.kontak') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium 
                    {{ request()->routeIs('website2.kontak') 
                    ? 'text-white bg-gradient-to-r from-[#2C80FF] to-[#436dd7]' 
                    : 'text-gray-900 hover:text-[#436dd7]' }}"
                    aria-current="{{ request()->routeIs('website2.kontak') ? 'page' : '' }}">
                    Kontak
                </a>

            </div>
        </div>
    </nav>

    <!-- space kosong -->
    <div class="pt-[56px] xl:pt-[96px]">
    </div>
</div>
