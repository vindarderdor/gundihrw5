@extends('layouts.public')

@section('title', 'Profil Tim KKN BBK8 UNAIR')

@section('content')
<!-- Header Page -->
<div class="bg-gray-900 py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kelurahan-primary via-blue-800 to-indigo-900 opacity-90 z-0"></div>
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] z-0"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-white/20 text-blue-100 text-sm font-bold tracking-widest uppercase mb-4 backdrop-blur-sm border border-white/30">Program Pengabdian Masyarakat</span>
        <h1 class="text-4xl font-extrabold text-white sm:text-5xl md:text-6xl font-heading tracking-tight mb-6">Tim KKN BBK 8 UNAIR</h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto font-light leading-relaxed">
            Mendedikasikan ilmu dan kreativitas untuk mendorong digitalisasi UMKM di Kelurahan Gundih 1, Surabaya.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-20 -mt-10">
    <div class="bg-white rounded-3xl shadow-2xl p-8 sm:p-12 border border-gray-100 overflow-hidden">
        
        <!-- Foto Tim KKN -->
        <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl mb-8 transform -translate-y-24 hover:scale-[1.01] transition-all duration-500 group border-8 border-white bg-white z-10 -mb-12">
            <img src="{{ asset('images/fotobareng.jpg') }}" alt="Tim KKN BBK 8 UNAIR Gundih 1" class="w-full h-auto object-cover object-center md:h-[450px] lg:h-[500px]">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end">
                <div class="p-6 md:p-8 text-center w-full transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white font-extrabold text-2xl md:text-3xl drop-shadow-xl font-heading tracking-wide mb-1">Kelompok KKN BBK 8 Gundih 1</p>
                    <p class="text-blue-200 font-medium tracking-wider text-sm md:text-base">UNIVERSITAS AIRLANGGA</p>
                </div>
            </div>
        </div>

        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 font-heading">Tentang Proyek Kami</h2>
            <div class="w-24 h-1 bg-kelurahan-secondary mx-auto mb-8 rounded-full"></div>
            <p class="text-lg text-gray-600 leading-relaxed mb-6">
                Website Sistem Informasi dan Etalase Digital UMKM Kelurahan Gundih ini merupakan hasil karya dan dedikasi dari mahasiswa <strong>Belajar Bersama Komunitas (BBK) ke-8 Universitas Airlangga (UNAIR)</strong> Kelompok Gundih 1.
            </p>
            <p class="text-lg text-gray-600 leading-relaxed">
                Tujuan utama dari proyek ini adalah untuk membantu mempromosikan, mendigitalkan, dan meningkatkan visibilitas produk maupun jasa Usaha Mikro, Kecil, dan Menengah (UMKM) yang ada di wilayah Kelurahan Gundih agar dapat bersaing di era digital.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-kelurahan-primary text-white rounded-xl flex items-center justify-center mb-6 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Visi Program</h3>
                <p class="text-gray-600">Mewujudkan UMKM Kelurahan Gundih yang mandiri, adaptif terhadap teknologi informasi, dan memiliki daya saing pasar yang lebih luas melalui etalase digital terintegrasi.</p>
            </div>

            <div class="bg-indigo-50 rounded-2xl p-8 border border-indigo-100 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-indigo-600 text-white rounded-xl flex items-center justify-center mb-6 shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Kolaborasi Tim</h3>
                <p class="text-gray-600">Proyek ini dikembangkan secara kolaboratif bersama pihak kelurahan dan para pelaku UMKM setempat untuk memastikan website ini benar-benar menjawab kebutuhan masyarakat.</p>
            </div>
        </div>

        <!-- Team Acknowledgment -->
        <div class="text-center mt-16 pt-12 border-t border-gray-100">
            <h3 class="text-2xl font-bold text-gray-900 mb-2 font-heading">Sinergi & Pengabdian</h3>
            <p class="text-gray-500 font-medium font-latin text-2xl mt-4">"Dari UNAIR, Untuk Gundih, Bagi Indonesia"</p>
        </div>
    </div>
</div>
@endsection
