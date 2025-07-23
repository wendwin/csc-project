{{-- INI NAVBAR UNTUK WEBISTE PSPI, SILAHKAN DISESUIKAN. INGET!!! HARUS CLINE CODE --}}
{{-- HANDLE BY ALDO OR FAISAL --}}
<div class="min-h-full z-50"
     x-data="{ isOpen: false, showTopbar: true }"
     x-init="
        const offset = 10;
        window.addEventListener('scroll', () => {
            showTopbar = window.pageYOffset > offset ? false : true;
        });
     ">

    <!-- Top Info Bar (Desktop only) -->
    <nav class="hidden xl:block fixed top-0 left-0 right-0 z-50 bg-[#002789] py-4 transition-transform duration-300 ease-in-out"
         :class="{ '-translate-y-full': !showTopbar, 'translate-y-0': showTopbar }">
        <div class="flex items-center justify-around mx-auto max-w-3xl gap-2">
            <img src="{{ asset('/img/logo/sertifikasi.png') }}" alt="" width="90">
            <div class="text-white">
                <p class="font-semibold text-xl mb-2">Pusat Sertifikasi Profesi Indonesia</p>
                <p class="font-semibold text-xs">Alamat : Jl. Sidomukti No 30, Kel. Kadipaten, Kec.Keraton, Kota Yogyakarta, Daerah Istimewa Yogyakarta (55132)</p>
                <p class="font-semibold text-xs">Telp: 0857-2976-2708</p>
                <p class="font-semibold text-xs">Email: pspindonesia2025@gmail.com</p>
            </div>
        </div>
    </nav>

    <!-- Main Navbar -->
    <nav class="bg-[#fff] shadow-md fixed top-0 inset-x-0 z-40 translate-y-0 transition-transform duration-300 ease-in-out py-4"
         :class="{ 'xl:translate-y-[120px]': showTopbar }">
        <div class="mx-auto max-w-7xl px-4">
            <div class="flex h-12 items-center justify-between">

                <!-- Brand -->
                <div class="shrink-0 flex items-center gap-3">
                    <!-- Mobile & Tablet (logo selalu tampil) -->
                    <a href="{{ route('website3.home') }}" class="block xl:hidden">
                        <img class="h-10 w-10" src="{{ asset('/img/logo/sertifikasi.png') }}" alt="PSPI">
                    </a>
                    <!-- Desktop: logo + nama saat scroll -->
                    <template x-if="!showTopbar">
                        <div class="hidden xl:flex items-center gap-3">
                            <a href="{{ route('website3.home') }}">
                                <img class="h-16 w-16" src="{{ asset('/img/logo/sertifikasi.png') }}" alt="PSPI">
                            </a>
                            <p class="text-base font-semibold text-[#2C437F] uppercase">Pusat Sertifikasi Profesi Indonesia</p>
                        </div>
                    </template>
                    <!-- Tablet nama (selalu tampil lg<xl) -->
                    <div class="hidden lg:block xl:hidden">
                        <p class="text-base font-semibold text-[#2C437F] uppercase">Pusat Sertifikasi Profesi Indonesia</p>
                    </div>
                </div>

                <!-- Desktop/Tablet Menu + Sosial -->
                <div class="hidden md:flex items-center gap-8">
                    <div class="flex space-x-4">
                        <a href="{{ route('website3.home') }}"
                           class="relative group px-3 py-2 text-sm font-medium flex items-center gap-1 {{ request()->routeIs('website3.home') ? 'text-[#002789]' : 'text-gray-700 hover:text-[#002789]' }}"
                           aria-current="page">
                            <i data-lucide="house" class="w-5 h-5"></i>Beranda
                            <span class="pointer-events-none absolute left-0 bottom-0 h-[3px] w-full origin-left scale-x-0 bg-[#002789] transition-transform duration-300 ease-out {{ request()->routeIs('website3.home') ? 'scale-x-100' : 'group-hover:scale-x-100' }}"></span>
                        </a>
                        <a href="{{ route('website3.profil') }}"
                           class="relative group px-3 py-2 text-sm font-medium flex items-center gap-1 {{ request()->routeIs('website3.profil') ? 'text-[#002789]' : 'text-gray-700 hover:text-[#002789]' }}">
                            <i data-lucide="building-2" class="w-5 h-5"></i>Profil
                            <span class="pointer-events-none absolute left-0 bottom-0 h-[3px] w-full origin-left scale-x-0 bg-[#002789] transition-transform duration-300 ease-out {{ request()->routeIs('website3.profil') ? 'scale-x-100' : 'group-hover:scale-x-100' }}"></span>
                        </a>
                        <a href="{{ route('website3.layanan') }}"
                           class="relative group px-3 py-2 text-sm font-medium flex items-center gap-1 {{ request()->routeIs('website3.layanan') ? 'text-[#002789]' : 'text-gray-700 hover:text-[#002789]' }}">
                            <i data-lucide="list-todo" class="w-5 h-5"></i>Layanan
                            <span class="pointer-events-none absolute left-0 bottom-0 h-[3px] w-full origin-left scale-x-0 bg-[#002789] transition-transform duration-300 ease-out {{ request()->routeIs('website3.layanan') ? 'scale-x-100' : 'group-hover:scale-x-100' }}"></span>
                        </a>
                        <a href="{{ route('website3.kontak') }}"
                           class="relative group px-3 py-2 text-sm font-medium flex items-center gap-1 {{ request()->routeIs('website3.kontak') ? 'text-[#002789]' : 'text-gray-700 hover:text-[#002789]' }}">
                            <i data-lucide="phone" class="w-5 h-5"></i>Kontak
                            <span class="pointer-events-none absolute left-0 bottom-0 h-[3px] w-full origin-left scale-x-0 bg-[#002789] transition-transform duration-300 ease-out {{ request()->routeIs('website3.kontak') ? 'scale-x-100' : 'group-hover:scale-x-100' }}"></span>
                        </a>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="#" class="group">
                            <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center group-hover:bg-[#002789]">
                                <i data-lucide="facebook" class="w-4 h-4 text-[#2C437F] group-hover:text-white"></i>
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center group-hover:bg-[#002789]">
                                <i data-lucide="instagram" class="w-4 h-4 text-[#2C437F] group-hover:text-white"></i>
                            </div>
                        </a>
                        <a href="#" class="group">
                            <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center group-hover:bg-[#002789]">
                                <i data-lucide="linkedin" class="w-4 h-4 text-[#2C437F] group-hover:text-white"></i>
                            </div>
                        </a>
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
                <a href="{{ route('website3.home') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium 
                    {{ request()->routeIs('website3.home')
                        ? 'text-white bg-gradient-to-r from-[#2C80FF] to-[#436dd7]'
                        : 'text-gray-900 hover:text-[#436dd7]' }}"
                    aria-current="{{ request()->routeIs('website3.home') ? 'page' : '' }}">
                    Beranda
                </a>

                <a href="{{ route('website3.profil') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium 
                    {{ request()->routeIs('website3.profil')
                        ? 'text-white bg-gradient-to-r from-[#2C80FF] to-[#436dd7]'
                        : 'text-gray-900 hover:text-[#436dd7]' }}"
                    aria-current="{{ request()->routeIs('website3.profil') ? 'page' : '' }}">
                    Profil
                </a>

                <a href="{{ route('website3.layanan') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium 
                    {{ request()->routeIs('website3.layanan')
                        ? 'text-white bg-gradient-to-r from-[#2C80FF] to-[#436dd7]'
                        : 'text-gray-900 hover:text-[#436dd7]' }}"
                    aria-current="{{ request()->routeIs('website3.layanan') ? 'page' : '' }}">
                    Layanan
                </a>

                <a href="{{ route('website3.kontak') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium 
                    {{ request()->routeIs('website3.kontak')
                        ? 'text-white bg-gradient-to-r from-[#2C80FF] to-[#436dd7]'
                        : 'text-gray-900 hover:text-[#436dd7]' }}"
                    aria-current="{{ request()->routeIs('website3.kontak') ? 'page' : '' }}">
                    Kontak
                </a>

            </div>
        </div>
    </nav>

    <!-- space kosong -->
    <div class="pt-[56px] xl:pt-[96px]">
    </div>
</div>
