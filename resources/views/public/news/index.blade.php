@extends('layouts.public')

@section('title', 'Berita & Informasi - RW 5 Kelurahan Gundih')

@section('content')
<div class="bg-gradient-to-b from-blue-50 to-white py-16 sm:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mb-4 font-playfair">Berita & <span class="text-kelurahan-primary">Informasi</span></h1>
            <p class="text-lg text-gray-600">Kabar terbaru, kegiatan, dan pengumuman seputar RW 5 Kelurahan Gundih dan UMKM di wilayah kami.</p>
        </div>

        @if($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $item)
                    <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col group">
                        <div class="aspect-w-16 aspect-h-10 w-full overflow-hidden relative">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-56 object-cover transform group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-56 bg-gray-200 flex items-center justify-center transform group-hover:scale-105 transition-transform duration-500">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20M9 11l3-3m0 0l3 3m-3-3v8"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4">
                                <span class="bg-white/90 backdrop-blur-sm text-kelurahan-primary text-xs font-bold px-3 py-1 rounded-full shadow-sm">
                                    {{ $item->published_at->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h2 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-kelurahan-primary transition-colors">
                                <a href="{{ route('public.news.show', $item->slug) }}">
                                    {{ $item->title }}
                                </a>
                            </h2>
                            <p class="text-gray-600 mb-6 line-clamp-3 text-sm flex-1">
                                {{ Str::limit(strip_tags($item->content), 120) }}
                            </p>
                            <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                                <a href="{{ route('public.news.show', $item->slug) }}" class="inline-flex items-center text-sm font-semibold text-kelurahan-primary group-hover:text-blue-700 transition-colors">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $news->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20" />
                </svg>
                <h3 class="text-xl font-medium text-gray-900 mb-2">Belum ada berita</h3>
                <p class="text-gray-500">Kabar terbaru akan segera hadir di sini.</p>
            </div>
        @endif
    </div>
</div>
@endsection
