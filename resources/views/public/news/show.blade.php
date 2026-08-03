@extends('layouts.public')

@section('title', $newsItem->title . ' - RW 5 Kelurahan Gundih')

@section('content')
<div class="bg-gray-50 py-10 sm:py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-kelurahan-primary transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('public.news.index') }}" class="ml-1 text-sm font-medium text-gray-600 hover:text-kelurahan-primary md:ml-2 transition-colors">Berita</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2 truncate max-w-[150px] sm:max-w-xs">{{ $newsItem->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <article class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            @if($newsItem->image)
                <div class="w-full h-64 sm:h-96 relative">
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 sm:p-10 w-full">
                        <div class="flex items-center space-x-4 text-white/90 text-sm font-medium mb-3">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $newsItem->published_at->format('d M Y') }}
                            </span>
                        </div>
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight font-playfair">{{ $newsItem->title }}</h1>
                    </div>
                </div>
            @else
                <div class="p-6 sm:p-10 pb-0">
                    <div class="flex items-center space-x-4 text-gray-500 text-sm font-medium mb-4">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $newsItem->published_at->format('d M Y') }}
                        </span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-6 font-playfair">{{ $newsItem->title }}</h1>
                    <hr class="border-gray-100">
                </div>
            @endif

            <div class="p-6 sm:p-10 prose prose-lg prose-blue max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($newsItem->content)) !!}
            </div>

            @if($newsItem->images && count($newsItem->images) > 0)
                <div class="px-6 sm:px-10 pb-10">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 font-heading border-b pb-2">Galeri Foto</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($newsItem->images as $img)
                            <div class="aspect-w-1 aspect-h-1 w-full h-48 overflow-hidden rounded-xl bg-gray-100 group">
                                <img src="{{ asset('storage/' . $img) }}" alt="Galeri Berita" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 hover:shadow-md cursor-pointer border border-gray-200">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </article>

        @if($relatedNews->count() > 0)
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-900 mb-8 font-playfair border-b pb-4">Berita Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($relatedNews as $related)
                        <a href="{{ route('public.news.show', $related->slug) }}" class="group block bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden">
                            @if($related->image)
                                <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-40 object-cover transform group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-40 bg-gray-100 flex items-center justify-center">
                                    <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 7H20"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-4">
                                <span class="text-xs font-semibold text-kelurahan-primary mb-1 block">{{ $related->published_at->format('d M Y') }}</span>
                                <h4 class="font-bold text-gray-900 group-hover:text-kelurahan-primary transition-colors line-clamp-2 text-sm">{{ $related->title }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
