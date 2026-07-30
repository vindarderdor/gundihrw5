@extends('layouts.public')

@section('title', 'Tentang RW 5 Kelurahan Gundih')

@section('content')
<!-- Header Banner -->
<div class="py-32 relative overflow-hidden flex items-center justify-center min-h-[450px]">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/bg_rw.jpg') }}" alt="Background Profil RW 5" class="w-full h-full object-cover filter brightness-90">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
        <div class="absolute inset-0 bg-blue-900/30 mix-blend-multiply"></div>
    </div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up mt-8">
        <h1 class="text-5xl font-extrabold text-white sm:text-6xl md:text-7xl font-heading tracking-tight mb-6 drop-shadow-xl">Profil RW 5 Kelurahan Gundih</h1>
        <div class="w-32 h-1.5 bg-kelurahan-accent mx-auto rounded-full mb-8 shadow-lg"></div>
        <p class="text-xl text-gray-100 max-w-3xl mx-auto font-light drop-shadow-md leading-relaxed">
            Bersama membangun ekonomi dan kesejahteraan masyarakat yang mandiri dan berdaya saing melalui inovasi dan gotong royong.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 -mt-24 relative z-20">
    @if($profile)
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-12">
            
            <!-- Tentang Kami Card (Left) -->
            <div class="lg:col-span-7 bg-white rounded-3xl shadow-2xl border border-gray-100 p-10 md:p-14 overflow-hidden relative group hover:shadow-kelurahan-primary/10 transition-shadow duration-500">
                <!-- Decorative blur -->
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 group-hover:bg-blue-100 transition-colors duration-500"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-6 mb-8">
                        @if($profile->logo)
                            <div class="w-20 h-20 flex-shrink-0 bg-white rounded-2xl shadow-md border border-gray-100 p-2 transform group-hover:rotate-3 transition-transform duration-300">
                                <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="w-full h-full object-contain">
                            </div>
                        @else
                            <div class="w-20 h-20 bg-gradient-to-br from-kelurahan-primary to-blue-700 rounded-2xl shadow-md flex items-center justify-center flex-shrink-0 text-white font-bold text-xl transform group-hover:rotate-3 transition-transform duration-300">
                                RW 5
                            </div>
                        @endif
                        <div>
                            <h2 class="text-4xl font-bold text-gray-900 font-heading">Tentang Kami</h2>
                            <p class="text-kelurahan-primary font-medium mt-1">Sejarah & Gambaran Umum</p>
                        </div>
                    </div>
                    
                    <div class="prose prose-lg text-gray-600 whitespace-pre-line leading-relaxed text-justify">
                        {{ $profile->deskripsi ?: 'Belum ada deskripsi profil RW 5.' }}
                    </div>
                </div>
            </div>

            <!-- Profil Ketua RW (Right) -->
            <div class="lg:col-span-5 bg-gradient-to-br from-gray-900 to-kelurahan-primary rounded-3xl shadow-2xl p-10 flex flex-col items-center text-center relative overflow-hidden group">
                <!-- Decorative circles -->
                <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
                    <div class="absolute -bottom-16 -right-16 w-64 h-64 border-[30px] border-white/10 rounded-full transition-transform duration-700 group-hover:scale-110"></div>
                    <div class="absolute -top-12 -left-12 w-40 h-40 border-[20px] border-white/5 rounded-full transition-transform duration-700 group-hover:scale-110"></div>
                </div>

                <div class="relative z-10 w-48 h-48 md:w-56 md:h-56 rounded-full overflow-hidden border-[6px] border-white/20 shadow-[0_0_40px_rgba(0,0,0,0.4)] mb-8 transform group-hover:scale-105 transition-transform duration-500 bg-gray-200">
                    <img src="{{ asset('images/pak bana.jpg') }}" alt="Bana Supeno" class="w-full h-full object-cover object-top" onerror="this.src='https://ui-avatars.com/api/?name=Ketua+RW+5&background=0D8ABC&color=fff&size=200'">
                </div>
                
                <h3 class="relative z-10 text-3xl font-bold text-white font-heading mb-3">Bana Supeno</h3>
                <div class="relative z-10 inline-block px-5 py-2 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-blue-50 text-sm font-semibold tracking-wider mb-8 shadow-inner">
                    Ketua RW 5 Kelurahan Gundih
                </div>
                
                <div class="relative z-10 text-gray-100 leading-relaxed italic text-base md:text-lg">
                    <svg class="w-10 h-10 mx-auto text-white/20 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                    "Selamat datang di Sistem Informasi UMKM RW 5. Kami berdedikasi memajukan usaha warga, menjalin kebersamaan, dan meningkatkan ekonomi di lingkungan RW 5 tercinta."
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">

            <!-- Visi Misi -->
            <div class="grid grid-cols-1 md:grid-cols-2 bg-gray-50">
                <div class="p-10 md:p-16 border-b md:border-b-0 md:border-r border-gray-200 hover:bg-white transition-colors duration-300">
                    <div class="w-16 h-16 bg-blue-100 text-kelurahan-primary rounded-2xl flex items-center justify-center mb-8 shadow-sm">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 font-heading">
                        Visi Kami
                    </h3>
                    <div class="prose prose-lg text-gray-600 whitespace-pre-line leading-relaxed">
                        {{ $profile->visi ?: 'Belum ada visi.' }}
                    </div>
                </div>
                <div class="p-10 md:p-16 hover:bg-white transition-colors duration-300">
                    <div class="w-16 h-16 bg-blue-100 text-kelurahan-primary rounded-2xl flex items-center justify-center mb-8 shadow-sm">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 font-heading">
                        Misi Kami
                    </h3>
                    <div class="prose prose-lg text-gray-600 whitespace-pre-line list-inside leading-relaxed">
                        {{ $profile->misi ?: 'Belum ada misi.' }}
                    </div>
                </div>
            </div>

            <!-- Peta Interaktif Leaflet RW 5 -->
            <div class="p-10 md:p-16 border-t border-gray-100 bg-white">
                <h3 class="text-3xl font-bold text-gray-900 mb-8 font-heading text-center">
                    Wilayah RW 5
                </h3>
                
                <!-- Map Controls (Search & Filter) -->
                <div class="mb-6 flex flex-col md:flex-row gap-4 justify-between items-center bg-gray-50 p-5 rounded-xl border border-gray-200 shadow-sm">
                    <!-- Search -->
                    <div class="relative w-full md:w-1/3">
                        <input type="text" id="map-search" placeholder="Cari nama UMKM..." class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-kelurahan-primary focus:border-kelurahan-primary text-sm transition-colors">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    
                    <!-- Filters -->
                    <div class="flex flex-wrap gap-3 w-full md:w-auto items-center justify-end" id="map-filters">
                        <span class="text-sm font-semibold text-gray-700 mr-1"><i class="fas fa-filter mr-1"></i> Filter Kategori:</span>
                        @foreach($categories as $cat)
                            <label class="inline-flex items-center cursor-pointer group">
                                <input type="checkbox" value="{{ $cat->id }}" class="category-filter rounded border-gray-300 text-kelurahan-primary focus:ring-kelurahan-primary transition-colors" checked>
                                <span class="ml-2 text-sm text-gray-600 group-hover:text-kelurahan-primary transition-colors">{{ $cat->nama_kategori }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Leaflet Container -->
                <div id="map-wrapper" class="relative rounded-2xl overflow-hidden shadow-lg border border-gray-200 w-full h-[600px] z-0 transition-all duration-300">
                    <div id="leaflet-map" class="w-full h-full"></div>
                    
                    <!-- Custom Buttons -->
                    <div class="leaflet-top leaflet-right mt-[80px] mr-2 flex flex-col gap-2 z-[400]" style="position: absolute; right: 10px; top: 80px;">
                        <button id="map-locate-btn" class="bg-white border-2 border-black/20 text-gray-700 hover:bg-gray-50 focus:outline-none w-[34px] h-[34px] rounded flex items-center justify-center transition-colors" title="Lokasi Saya" style="box-shadow: 0 1px 5px rgba(0,0,0,0.65);">
                            <i class="fas fa-location-arrow"></i>
                        </button>
                        <button id="map-fullscreen-btn" class="bg-white border-2 border-black/20 text-gray-700 hover:bg-gray-50 focus:outline-none w-[34px] h-[34px] rounded flex items-center justify-center transition-colors" title="Layar Penuh" style="box-shadow: 0 1px 5px rgba(0,0,0,0.65);">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                    
                    <!-- Legend -->
                    <div class="absolute bottom-6 right-6 z-[400] bg-white/95 backdrop-blur-sm p-4 rounded-xl shadow-xl border border-gray-100 text-sm">
                        <h4 class="font-bold text-gray-900 mb-3 border-b border-gray-200 pb-2 font-heading">Legenda Peta</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 bg-blue-500/20 border-2 border-blue-600 rounded-sm"></div> 
                                <span class="text-gray-700 font-medium">Batas RW 5</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center shadow-sm border border-orange-200"><i class="fas fa-store text-xs"></i></div>
                                <span class="text-gray-700 font-medium">UMKM</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shadow-sm border border-blue-200"><i class="fas fa-building text-xs"></i></div>
                                <span class="text-gray-700 font-medium">Balai RW</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-red-100 text-red-600 flex items-center justify-center shadow-sm border border-red-200"><i class="fas fa-notes-medical text-xs"></i></div>
                                <span class="text-gray-700 font-medium">Posyandu</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center shadow-sm border border-green-200"><i class="fas fa-mosque text-xs"></i></div>
                                <span class="text-gray-700 font-medium">Masjid / Mushola</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 rounded-2xl shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-lg font-medium text-yellow-800">
                        Profil RW 5 belum diatur oleh Admin.
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('styles')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <!-- MarkerCluster CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Map CSS -->
    <link rel="stylesheet" href="{{ asset('css/leaflet-map.css') }}">
@endpush

@push('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- MarkerCluster JS -->
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
    <!-- Pass Data to JS -->
    <script>
        window.umkmData = @json($umkms ?? []);
    </script>
    <!-- Custom Map JS -->
    <script src="{{ asset('js/leaflet-map.js') }}"></script>
@endpush
