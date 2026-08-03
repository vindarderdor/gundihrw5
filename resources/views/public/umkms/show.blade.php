@extends('layouts.public')

@section('title', $umkm->nama_usaha . ' - Kelurahan Gundih')

@section('content')
<!-- Header Banner -->
<div class="bg-gray-900 py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800 to-indigo-900 opacity-90"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10 flex items-center justify-between text-sm text-gray-300">
        <a href="{{ route('public.umkm.index') }}" class="hover:text-white transition-colors flex items-center bg-white/10 px-4 py-2 rounded-full backdrop-blur-sm shadow-sm">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Direktori
        </a>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-12 relative z-20">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Kolom Kiri: Foto & Badge -->
        <div class="lg:col-span-5 space-y-6 lg:sticky lg:top-24">
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden relative aspect-square sm:aspect-video lg:aspect-[4/3]">
                @if($umkm->foto)
                    <img src="{{ Storage::url($umkm->foto) }}" alt="{{ $umkm->nama_usaha }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 bg-gray-50">
                        <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="font-medium">Belum Ada Foto Produk</span>
                    </div>
                @endif
                
                <!-- Badges -->
                <div class="absolute top-4 left-4 flex flex-wrap gap-2 max-w-[90%]">
                    @forelse($umkm->categories as $category)
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-white/95 backdrop-blur-md shadow-sm text-indigo-700 uppercase tracking-widest border border-gray-100">
                            {{ $category->nama_kategori }}
                        </span>
                    @empty
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-white/95 backdrop-blur-md shadow-sm text-gray-600 uppercase tracking-widest border border-gray-100">Umum</span>
                    @endforelse
                </div>
            </div>

            <!-- Tombol WA diletakkan di bawah foto (opsional, cocok untuk mobile) -->
            @if($umkm->no_telepon)
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->no_telepon) }}" target="_blank" class="w-full flex items-center justify-center px-8 py-4 font-bold text-white bg-[#25D366] rounded-2xl shadow-lg shadow-green-200 hover:shadow-xl hover:shadow-green-300 hover:-translate-y-1 transition-all duration-300">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                Hubungi Pemilik (WhatsApp)
            </a>
            @endif
        </div>

        <!-- Kolom Kanan: Konten & Detail -->
        <div class="lg:col-span-7 flex flex-col gap-6">
            
            <!-- Info Utama -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-10">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 font-heading leading-tight">{{ $umkm->nama_usaha }}</h1>
                
                <div class="flex items-center gap-4 mb-8 pb-8 border-b border-gray-100">
                    <div class="w-14 h-14 bg-indigo-50 rounded-full flex items-center justify-center text-indigo-600">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Pemilik Usaha</p>
                        <p class="text-xl font-bold text-gray-900">{{ $umkm->pemilik }}</p>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                        Deskripsi Usaha
                    </h3>
                    <div class="prose prose-blue prose-lg text-gray-600 whitespace-pre-line leading-relaxed">
                        {{ $umkm->deskripsi ?: 'Pemilik UMKM belum menambahkan deskripsi untuk usaha ini. Silakan hubungi kontak yang tersedia untuk informasi lebih lanjut.' }}
                    </div>
                </div>

                <!-- Grid Info Spesifik -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex items-start gap-4">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm text-indigo-600 flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Alamat</p>
                            <p class="text-sm font-medium text-gray-900">{{ $umkm->alamat ?: '-' }}</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex items-start gap-4">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm text-indigo-600 flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Jam Operasional</p>
                            <p class="text-sm font-medium text-gray-900">{{ $umkm->jam_operasional ?: '-' }}</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex items-start gap-4">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm text-indigo-600 flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Telepon / WhatsApp</p>
                            <p class="text-sm font-medium text-gray-900">{{ $umkm->no_telepon ?: '-' }}</p>
                        </div>
                    </div>

                    @if($umkm->link_sosmed)
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100 flex items-start gap-4">
                        <div class="p-2.5 bg-white rounded-xl shadow-sm text-indigo-600 flex-shrink-0">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Media Sosial</p>
                            <a href="{{ Str::startsWith($umkm->link_sosmed, ['http://', 'https://']) ? $umkm->link_sosmed : 'https://' . $umkm->link_sosmed }}" target="_blank" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors break-all">
                                Kunjungi Tautan &rarr;
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Menu / Produk Kami -->
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-10 mb-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center font-heading">
                    <svg class="w-6 h-6 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    Menu / Produk Kami
                </h3>
                @if($umkm->products && $umkm->products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($umkm->products as $product)
                            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 flex flex-col group hover:shadow-md transition-shadow">
                                @if($product->foto)
                                    <div class="h-48 w-full overflow-hidden">
                                        <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                @endif
                                <div class="p-5 flex-1 flex flex-col justify-between">
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900 mb-1">{{ $product->nama_produk }}</h4>
                                        @if($product->deskripsi)
                                            <p class="text-sm text-gray-600 mb-3">{{ $product->deskripsi }}</p>
                                        @endif
                                    </div>
                                    @if($product->harga)
                                        <div class="mt-4 pt-3 border-t border-gray-200">
                                            <span class="text-indigo-600 font-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 bg-gray-50 rounded-2xl border border-gray-100 border-dashed">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <p class="text-gray-500 font-medium">Belum ada menu atau produk yang ditambahkan.</p>
                    </div>
                @endif
            </div>

            <!-- Peta Lokasi -->
            @if($umkm->peta_embed)
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-10 mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    Lokasi di Peta
                </h3>
                <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-200 w-full h-[350px] [&>iframe]:w-full [&>iframe]:h-full">
                    {!! $umkm->peta_embed !!}
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
