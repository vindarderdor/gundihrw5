<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website UMKM RW 5 Kelurahan Gundih')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav x-data="{ open: false }" class="bg-white/90 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="/" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-kelurahan-primary to-blue-700 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md group-hover:scale-105 transition-transform">
                            G
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900 text-lg leading-tight group-hover:text-kelurahan-primary transition-colors">RW 5 Kelurahan Gundih</span>
                            <span class="block text-xs text-gray-500 font-medium tracking-wide">Sistem Informasi UMKM</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex sm:items-center sm:space-x-8">
                    <a href="/" class="{{ request()->is('/') ? 'text-kelurahan-primary border-b-2 border-kelurahan-primary font-semibold' : 'text-gray-600 hover:text-kelurahan-primary hover:border-b-2 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-sm font-medium h-20 transition-colors">Beranda</a>
                    
                    <a href="{{ route('public.umkm.index') }}" class="{{ request()->routeIs('public.umkm.*') ? 'text-kelurahan-primary border-b-2 border-kelurahan-primary font-semibold' : 'text-gray-600 hover:text-kelurahan-primary hover:border-b-2 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-sm font-medium h-20 transition-colors">Daftar UMKM</a>
                    
                    <a href="/tentang" class="{{ request()->is('tentang') ? 'text-kelurahan-primary border-b-2 border-kelurahan-primary font-semibold' : 'text-gray-600 hover:text-kelurahan-primary hover:border-b-2 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-sm font-medium h-20 transition-colors">Tentang</a>
                    
                    <a href="{{ route('public.kkn') }}" class="{{ request()->routeIs('public.kkn') ? 'text-kelurahan-primary border-b-2 border-kelurahan-primary font-semibold' : 'text-gray-600 hover:text-kelurahan-primary hover:border-b-2 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-sm font-medium h-20 transition-colors">Tim KKN</a>
                    
                    <a href="/kontak" class="{{ request()->is('kontak') ? 'text-kelurahan-primary border-b-2 border-kelurahan-primary font-semibold' : 'text-gray-600 hover:text-kelurahan-primary hover:border-b-2 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 text-sm font-medium h-20 transition-colors">Kontak</a>
                </div>

                <div class="hidden sm:flex sm:items-center">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-5 py-2.5 border border-transparent rounded-full text-sm font-semibold text-white bg-kelurahan-primary hover:bg-blue-700 hover:shadow-md transition-all duration-200">
                            Dashboard Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center px-5 py-2.5 border border-gray-300 rounded-full text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-kelurahan-primary hover:text-kelurahan-primary hover:shadow-md transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                            Login Petugas
                        </a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center sm:hidden">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-white border-t border-gray-100 shadow-lg absolute w-full">
            <div class="pt-2 pb-3 space-y-1">
                <a href="/" class="block pl-3 pr-4 py-2 border-l-4 border-kelurahan-primary text-base font-medium text-kelurahan-primary bg-blue-50">Beranda</a>
                <a href="{{ route('public.umkm.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">Daftar UMKM</a>
                <a href="/tentang" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">Tentang</a>
                <a href="{{ route('public.kkn') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">Tim KKN</a>
                <a href="/kontak" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">Kontak</a>
                <div class="border-t border-gray-200 pt-4 pb-2">
                    <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 text-base font-medium text-gray-600 hover:text-kelurahan-primary">Login Petugas</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-auto border-t border-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-heading font-bold mb-4 text-kelurahan-accent">RW 5 Kelurahan Gundih</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Portal resmi sistem informasi UMKM RW 5 Kelurahan Gundih, Kecamatan Bubutan, Kota Surabaya. Bersama memajukan ekonomi kerakyatan melalui digitalisasi.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="/" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="{{ route('public.umkm.index') }}" class="hover:text-white transition-colors">Direktori UMKM</a></li>
                        <li><a href="/tentang" class="hover:text-white transition-colors">Profil Kelurahan</a></li>
                        <li><a href="/kontak" class="hover:text-white transition-colors">Pengaduan & Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">Hubungi Kami</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 mr-2 text-kelurahan-secondary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>Gundih V / 12, Surabaya, Jawa Timur, Indonesia.</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-kelurahan-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            <span>(031) 5322799</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} RW 5 Kelurahan Gundih, Surabaya. Hak Cipta Dilindungi.
                </p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="https://web.facebook.com/p/Kelurahan-Gundih-Surabaya-100037924608876/?_rdc=1&_rdr#" target="_blank" class="text-gray-500 hover:text-white transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="https://www.instagram.com/kelurahangundih/" target="_blank" class="text-gray-500 hover:text-white transition-colors">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
