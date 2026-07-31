@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gray-900 h-[600px] flex items-center justify-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/gundih kel.jpg') }}" alt="Kantor Kelurahan Gundih" class="w-full h-full object-cover opacity-40 mix-blend-overlay">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto mt-10">
        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl font-heading animate-fade-in-up">
            <span class="block mb-2 text-kelurahan-accent/90 text-2xl sm:text-3xl md:text-4xl font-latin font-normal tracking-wider">Selamat Datang di Portal Resmi</span>
            <span class="block xl:inline drop-shadow-md">Sistem Informasi UMKM</span>
            <span class="block text-kelurahan-secondary mt-1 font-latin text-5xl sm:text-6xl md:text-7xl">RW 5 Kelurahan Gundih</span>
        </h1>
        <p class="mt-6 text-base text-gray-300 sm:text-lg sm:max-w-2xl sm:mx-auto md:text-xl font-light">
            Mendukung digitalisasi dan pertumbuhan Usaha Mikro, Kecil, dan Menengah di lingkungan RW 5 demi kesejahteraan masyarakat dan kemajuan ekonomi lokal.
        </p>
        <div class="mt-10 sm:flex sm:justify-center gap-4">
            <div class="rounded-full shadow-lg hover:scale-105 transition-transform duration-300">
                <a href="{{ route('public.umkm.index') }}" class="w-full flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-semibold rounded-full text-white bg-kelurahan-primary hover:bg-blue-600 md:py-4 md:text-lg">
                    Jelajahi Direktori UMKM
                </a>
            </div>
            <div class="mt-3 sm:mt-0 rounded-full shadow-lg hover:scale-105 transition-transform duration-300">
                <a href="/tentang" class="w-full flex items-center justify-center px-8 py-3.5 border border-white/20 backdrop-blur-sm text-base font-semibold rounded-full text-white bg-white/10 hover:bg-white/20 md:py-4 md:text-lg">
                    Profil RW 5
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section with overlapping design -->
<div class="relative z-20 -mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-xl p-8 sm:p-12 border border-gray-100 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="md:w-1/3 text-center md:text-left">
            <h2 class="text-3xl font-extrabold text-gray-900 font-heading">
                Berkembang <br class="hidden md:block"/>Bersama Masyarakatt
            </h2>
            <div class="w-16 h-1 bg-kelurahan-primary mt-4 mx-auto md:mx-0 rounded-full"></div>
            <p class="mt-4 text-gray-600">
                Digitalisasi UMKM memperluas jangkauan dan memperkuat ekonomi lokal.
            </p>
        </div>
        
        <div class="md:w-2/3 w-full grid grid-cols-1 sm:grid-cols-3 gap-6 text-center divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
            <div class="flex flex-col pt-4 sm:pt-0">
                <dt class="order-2 mt-2 text-sm font-medium text-gray-500 uppercase tracking-wide">
                    UMKM Terdaftar
                </dt>
                <dd class="order-1 text-5xl font-extrabold text-kelurahan-primary font-heading">
                    {{ $totalUmkm }}
                </dd>
            </div>
            <div class="flex flex-col pt-4 sm:pt-0">
                <dt class="order-2 mt-2 text-sm font-medium text-gray-500 uppercase tracking-wide">
                    Kategori Usaha
                </dt>
                <dd class="order-1 text-5xl font-extrabold text-kelurahan-secondary font-heading">
                    {{ $totalKategori }}
                </dd>
            </div>
            <div class="flex flex-col pt-4 sm:pt-0">
                <dt class="order-2 mt-2 text-sm font-medium text-gray-500 uppercase tracking-wide">
                    Dukungan
                </dt>
                <dd class="order-1 text-5xl font-extrabold text-blue-600 font-heading">
                    100%
                </dd>
            </div>
        </div>
    </div>
</div>

<!-- Highlight UMKM Section -->
@if($featuredUmkms->count() > 0)
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-base text-kelurahan-primary font-bold tracking-widest uppercase mb-2">Etalase Digital</h2>
            <p class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl font-heading mb-4">
                UMKM Pilihan Kami
            </p>
            <p class="text-xl text-gray-500">
                Temukan berbagai produk dan jasa unggulan karya warga RW 5 Kelurahan Gundih yang siap memenuhi kebutuhan Anda.
            </p>
        </div>

        <div class="grid gap-8 grid-cols-1 md:grid-cols-3">
            @foreach($featuredUmkms as $umkm)
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                    <div class="h-56 w-full bg-gray-200 relative overflow-hidden">
                        @if($umkm->foto)
                            <img src="{{ Storage::url($umkm->foto) }}" alt="{{ $umkm->nama_usaha }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">Tanpa Foto</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <div class="absolute top-4 left-4 flex flex-wrap gap-1 z-10 max-w-[80%]">
                            @forelse($umkm->categories as $category)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/90 backdrop-blur-sm text-kelurahan-primary shadow-sm">
                                    {{ $category->nama_kategori }}
                                </span>
                            @empty
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/90 backdrop-blur-sm text-gray-500 shadow-sm">Umum</span>
                            @endforelse
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-kelurahan-primary transition-colors">{{ $umkm->nama_usaha }}</h3>
                        <p class="text-gray-500 text-sm mb-6 line-clamp-3 leading-relaxed flex-grow">
                            {{ $umkm->deskripsi ?? 'Pemilik usaha ini belum menambahkan deskripsi.' }}
                        </p>
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <a href="{{ route('public.umkm.show', $umkm->id) }}" class="inline-flex items-center text-kelurahan-primary font-semibold hover:text-blue-700 transition-colors">
                                Lihat Selengkapnya 
                                <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-16 text-center">
            <a href="{{ route('public.umkm.index') }}" class="inline-flex items-center px-8 py-3.5 border-2 border-kelurahan-primary rounded-full text-base font-semibold text-kelurahan-primary bg-transparent hover:bg-kelurahan-primary hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                Lihat Seluruh Direktori UMKM
            </a>
        </div>
    </div>
</div>
@endif
@endsection
