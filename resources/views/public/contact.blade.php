@extends('layouts.public')

@section('title', 'Kontak - Kelurahan Gundih')

@section('content')
<!-- Header Banner -->
<div class="bg-gray-900 py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-tr from-kelurahan-secondary to-gray-900 opacity-90"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
        <h1 class="text-4xl font-extrabold text-white sm:text-5xl md:text-6xl font-heading tracking-tight mb-4">Layanan Pengaduan & Kontak</h1>
        <div class="w-24 h-1 bg-kelurahan-accent mx-auto rounded-full mb-6"></div>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light">
            Sampaikan aspirasi, saran, dan pertanyaan Anda. Kami siap memberikan pelayanan terbaik untuk masyarakat.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-16 relative z-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        <!-- Contact Info -->
        <div class="lg:col-span-5">
            <div class="bg-kelurahan-primary text-white rounded-3xl shadow-2xl border border-blue-400 p-10 h-full relative overflow-hidden">
                <!-- Decor circle -->
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-10"></div>
                <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 rounded-full bg-blue-900 opacity-20"></div>
                
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold mb-8 font-heading">Informasi Kontak</h2>
                    @if($profile)
                        <div class="space-y-8">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-white/20 p-3 rounded-2xl backdrop-blur-sm">
                                    <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                </div>
                                <div class="ml-6">
                                    <h3 class="text-lg font-bold tracking-wide uppercase text-blue-100 mb-2">Alamat Kantor</h3>
                                    <p class="text-white text-lg font-medium leading-relaxed whitespace-pre-line">{{ $profile->alamat_kantor ?: 'Belum ada data alamat' }}</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-white/20 p-3 rounded-2xl backdrop-blur-sm">
                                    <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                </div>
                                <div class="ml-6">
                                    <h3 class="text-lg font-bold tracking-wide uppercase text-blue-100 mb-2">Kontak Resmi</h3>
                                    <p class="text-white text-lg font-medium leading-relaxed whitespace-pre-line">{{ $profile->kontak ?: 'Belum ada data kontak' }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-white/20 p-6 rounded-2xl backdrop-blur-sm border border-white/30">
                            <p class="text-white font-medium">Informasi kontak belum diatur oleh admin.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="lg:col-span-7">
            <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-10 h-full">
                <h2 class="text-3xl font-bold text-gray-900 mb-2 font-heading">Kirim Pesan Pengaduan</h2>
                <p class="text-gray-500 mb-8">Pesan Anda akan langsung diterima oleh petugas kelurahan.</p>
                
                @if(session('success'))
                    <div class="mb-8 bg-green-50 border border-green-200 p-5 rounded-2xl flex items-center shadow-sm">
                        <div class="flex-shrink-0 bg-green-100 p-2 rounded-full">
                            <svg class="h-6 w-6 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-base text-green-800 font-bold">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('public.contact.submit') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama_pengirim" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Nama Lengkap</label>
                                <input type="text" name="nama_pengirim" id="nama_pengirim" value="{{ old('nama_pengirim') }}" required class="shadow-sm focus:ring-kelurahan-primary focus:border-kelurahan-primary block w-full sm:text-sm border-gray-200 rounded-xl py-3 px-4 bg-gray-50 focus:bg-white transition-colors" placeholder="Contoh: Budi Santoso">
                                @error('nama_pengirim')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Alamat Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="shadow-sm focus:ring-kelurahan-primary focus:border-kelurahan-primary block w-full sm:text-sm border-gray-200 rounded-xl py-3 px-4 bg-gray-50 focus:bg-white transition-colors" placeholder="Contoh: budi@email.com">
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="isi_pesan" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Pesan / Pengaduan</label>
                            <textarea id="isi_pesan" name="isi_pesan" rows="5" required class="shadow-sm focus:ring-kelurahan-primary focus:border-kelurahan-primary block w-full sm:text-sm border border-gray-200 rounded-xl py-3 px-4 bg-gray-50 focus:bg-white transition-colors" placeholder="Tuliskan pesan, saran, atau pengaduan Anda di sini...">{{ old('isi_pesan') }}</textarea>
                            @error('isi_pesan')
                                <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center py-4 px-10 border border-transparent rounded-full shadow-lg shadow-blue-200 text-base font-bold text-white bg-kelurahan-primary hover:bg-blue-700 focus:outline-none hover:-translate-y-1 transition-all duration-300">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                Kirim Pesan Sekarang
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
