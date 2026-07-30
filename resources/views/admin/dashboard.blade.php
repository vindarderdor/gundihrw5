<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Ringkasan Sistem') }}
            </h2>
            <a href="{{ url('/') }}" class="inline-flex items-center px-4 py-2 bg-slate-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-700 focus:bg-slate-700 active:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Halaman Utama
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- UMKM Card -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <div class="text-gray-500 text-xs font-bold uppercase tracking-wider">Total UMKM</div>
                            <div class="mt-2 text-4xl font-extrabold text-slate-800">{{ $umkmCount }}</div>
                        </div>
                        <div class="p-3 bg-indigo-50 rounded-full border border-indigo-100">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-lg">
                        <a href="{{ route('admin.umkms.index') }}" class="flex items-center text-indigo-600 hover:text-indigo-900 text-sm font-semibold transition-colors">
                            Kelola Data UMKM <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Category Card -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <div class="text-gray-500 text-xs font-bold uppercase tracking-wider">Total Kategori</div>
                            <div class="mt-2 text-4xl font-extrabold text-slate-800">{{ $categoryCount }}</div>
                        </div>
                        <div class="p-3 bg-emerald-50 rounded-full border border-emerald-100">
                            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-lg">
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center text-emerald-600 hover:text-emerald-900 text-sm font-semibold transition-colors">
                            Kelola Kategori <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Message Card -->
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <div class="text-gray-500 text-xs font-bold uppercase tracking-wider">Pesan Masuk</div>
                            <div class="mt-2 text-4xl font-extrabold text-slate-800">{{ $messageCount }}</div>
                        </div>
                        <div class="p-3 bg-amber-50 rounded-full border border-amber-100">
                            <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-lg">
                        <a href="{{ route('admin.messages.index') }}" class="flex items-center text-amber-600 hover:text-amber-900 text-sm font-semibold transition-colors">
                            Tinjau Pesan <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
