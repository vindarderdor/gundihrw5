@extends('layouts.public')

@section('title', 'Daftar UMKM Kelurahan Gundih')

@section('content')
<!-- Header Page -->
<div class="bg-gray-900 py-20 relative overflow-hidden" style="background-image: url('{{ asset('images/footagerw5.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-r from-kelurahan-primary/90 to-blue-900/90 mix-blend-multiply z-0"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900/50 z-0"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <h1 class="text-4xl font-extrabold text-white sm:text-5xl font-heading tracking-tight mb-4 drop-shadow-lg">Direktori UMKM</h1>
        <p class="text-lg text-blue-50 max-w-2xl mx-auto font-light drop-shadow">
            Temukan berbagai produk dan jasa unggulan dari Usaha Mikro, Kecil, dan Menengah di wilayah Kelurahan Gundih.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-8 relative z-20">
    <!-- Search & Filter -->
    <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 mb-12">
        <form action="{{ route('public.umkm.index') }}" method="GET" class="flex flex-col gap-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-grow">
                    <label for="search" class="sr-only">Cari UMKM</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari nama usaha atau deskripsi..." class="pl-10 block w-full border-gray-200 rounded-xl focus:ring-kelurahan-primary focus:border-kelurahan-primary sm:text-sm py-3 transition-colors">
                    </div>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="flex-1 md:flex-none inline-flex justify-center items-center py-3 px-8 border border-transparent shadow-sm text-sm font-bold rounded-xl text-white bg-kelurahan-primary hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kelurahan-primary transition-all duration-200">
                        Cari & Filter
                    </button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('public.umkm.index') }}" class="inline-flex justify-center items-center py-3 px-6 border border-gray-200 shadow-sm text-sm font-bold rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition-all duration-200" title="Reset Pencarian">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    @endif
                </div>
            </div>
            
            <div>
                <p class="text-sm font-medium text-gray-700 mb-3">Pilih Kategori (Bisa lebih dari satu):</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($categories as $category)
                        <label class="cursor-pointer">
                            <input type="checkbox" name="category[]" value="{{ $category->id }}" 
                                {{ in_array($category->id, (array)request('category', [])) ? 'checked' : '' }} 
                                class="peer sr-only">
                            <span class="inline-flex px-4 py-2 text-sm font-medium rounded-full border border-gray-200 text-gray-600 bg-white peer-checked:bg-kelurahan-primary peer-checked:text-white peer-checked:border-kelurahan-primary hover:bg-gray-50 transition-colors shadow-sm select-none">
                                {{ $category->nama_kategori }}
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>
        </form>
    </div>

    <!-- Grid -->
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @forelse($umkms as $umkm)
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl overflow-hidden border border-gray-100 transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                <div class="h-56 w-full bg-gray-200 relative overflow-hidden">
                    @if($umkm->foto)
                        <img src="{{ Storage::url($umkm->foto) }}" alt="{{ $umkm->nama_usaha }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">Tanpa Foto</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute top-4 right-4 flex flex-wrap justify-end gap-1 z-10 max-w-[80%]">
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
                    <h3 class="text-xl font-bold text-gray-900 mb-1 group-hover:text-kelurahan-primary transition-colors">{{ $umkm->nama_usaha }}</h3>
                    <p class="text-sm text-gray-400 mb-4 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        {{ $umkm->pemilik }}
                    </p>
                    <p class="text-gray-500 text-sm mb-6 line-clamp-3 leading-relaxed flex-grow">
                        {{ $umkm->deskripsi ?? 'Tidak ada deskripsi.' }}
                    </p>
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <a href="{{ route('public.umkm.show', $umkm->id) }}" class="flex items-center justify-center w-full py-2.5 px-4 rounded-xl text-sm font-semibold text-kelurahan-primary bg-blue-50/50 hover:bg-blue-100 transition-colors group-hover:bg-kelurahan-primary group-hover:text-white">
                            Lihat Detail Profil
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl shadow-sm border border-gray-200 p-16 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                    <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Tidak ada UMKM ditemukan</h3>
                <p class="text-gray-500 max-w-sm mx-auto">Kami tidak dapat menemukan UMKM yang sesuai dengan pencarian atau filter Anda. Silakan coba kata kunci lain.</p>
                <div class="mt-6">
                    <a href="{{ route('public.umkm.index') }}" class="inline-flex items-center px-6 py-2.5 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-kelurahan-primary hover:bg-blue-700">
                        Kembali ke Semua UMKM
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        {{ $umkms->appends(request()->query())->links() }}
    </div>
</div>
@endsection
