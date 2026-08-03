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
    <div class="bg-white rounded-3xl shadow-2xl p-6 sm:p-12 border border-gray-100">
        
        <!-- Foto Tim KKN -->
        <div class="relative w-full rounded-2xl overflow-hidden shadow-2xl mb-8 transform -translate-y-12 sm:-translate-y-16 md:-translate-y-24 hover:scale-[1.01] transition-all duration-500 group border-4 md:border-8 border-white bg-white z-10 -mb-6 sm:-mb-8 md:-mb-12">
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

        <!-- Dosen Pembimbing Lapangan -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-6 font-heading text-center">Dosen Pembimbing Lapangan</h2>
            <div class="w-24 h-1 bg-kelurahan-secondary mx-auto mb-8 rounded-full"></div>
            
            <div class="max-w-3xl mx-auto bg-gradient-to-br from-blue-50 to-white rounded-3xl shadow-xl border border-blue-100 overflow-hidden transform hover:-translate-y-1 transition-transform duration-300">
                <div class="md:flex">
                    <div class="md:shrink-0 flex justify-center items-center p-8 md:p-0 md:pl-8 bg-blue-50 md:bg-transparent">
                        <!-- Placeholder / Foto DPL -->
                        <div class="h-40 w-40 rounded-full border-4 border-white shadow-lg bg-gray-200 flex items-center justify-center overflow-hidden">
                            <svg class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <!-- Jika sudah ada foto, ganti svg di atas dengan tag img seperti ini: -->
                            <!-- <img src="{{ asset('images/foto-dpl.jpg') }}" alt="Foto DPL" class="h-full w-full object-cover"> -->
                        </div>
                    </div>
                    <div class="p-8 md:p-10 text-center md:text-left flex-1 flex flex-col justify-center">
                        <div class="uppercase tracking-wide text-sm text-kelurahan-primary font-bold mb-1">DPL Kelompok Gundih 1</div>
                        <h3 class="block mt-1 text-2xl leading-tight font-bold text-gray-900 font-heading">[Nama DPL & Gelar]</h3>
                        <p class="mt-2 text-kelurahan-secondary font-medium">Fakultas / Universitas Airlangga</p>
                        
                        <div class="mt-4 relative">
                            <svg class="absolute -top-2 -left-3 h-6 w-6 text-blue-200 transform -scale-x-100" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" /></svg>
                            <p class="text-gray-600 leading-relaxed italic pl-6">
                                "[Tempat untuk pesan, sambutan, atau quote dari Dosen Pembimbing Lapangan terkait program pengabdian masyarakat di Kelurahan Gundih.]"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
                <h3 class="text-xl font-bold text-gray-900 mb-3">Misi Program</h3>
                <p class="text-gray-600">Membangun kolaborasi aktif bersama pihak kelurahan dan para pelaku UMKM setempat untuk menghadirkan website yang secara nyata memberdayakan dan menjawab kebutuhan masyarakat.</p>
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
