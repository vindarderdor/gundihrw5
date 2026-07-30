<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Profil Kelurahan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.profile-kelurahan.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Logo -->
                            <div class="md:col-span-2">
                                <label for="logo" class="block text-sm font-medium text-gray-700">Logo Kelurahan (Opsional)</label>
                                @if($profile->logo)
                                    <div class="mt-2 mb-4">
                                        <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="w-32 h-32 object-contain bg-gray-50 border rounded p-2">
                                    </div>
                                @endif
                                <input type="file" name="logo" id="logo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                @error('logo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Deskripsi Singkat -->
                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                                <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('deskripsi', $profile->deskripsi) }}</textarea>
                                @error('deskripsi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Visi -->
                            <div>
                                <label for="visi" class="block text-sm font-medium text-gray-700">Visi</label>
                                <textarea name="visi" id="visi" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('visi', $profile->visi) }}</textarea>
                                @error('visi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Misi -->
                            <div>
                                <label for="misi" class="block text-sm font-medium text-gray-700">Misi</label>
                                <textarea name="misi" id="misi" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('misi', $profile->misi) }}</textarea>
                                @error('misi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Alamat Kantor -->
                            <div>
                                <label for="alamat_kantor" class="block text-sm font-medium text-gray-700">Alamat Kantor</label>
                                <textarea name="alamat_kantor" id="alamat_kantor" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('alamat_kantor', $profile->alamat_kantor) }}</textarea>
                                @error('alamat_kantor') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Kontak Resmi -->
                            <div>
                                <label for="kontak" class="block text-sm font-medium text-gray-700">Kontak Resmi (Telp/Email)</label>
                                <textarea name="kontak" id="kontak" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('kontak', $profile->kontak) }}</textarea>
                                @error('kontak') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Peta Embed Google Maps -->
                            <div class="md:col-span-2">
                                <label for="peta_embed" class="block text-sm font-medium text-gray-700">Peta Lokasi Kantor Kelurahan (Google Maps Embed)</label>
                                <p class="text-xs text-gray-500 mb-1">Cara mendapatkan: Buka Google Maps > Cari Lokasi > Bagikan > Sematkan Peta (Embed a map) > Salin HTML (Copy HTML)</p>
                                <textarea name="peta_embed" id="peta_embed" rows="3" placeholder='<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('peta_embed', $profile->peta_embed) }}</textarea>
                                @error('peta_embed') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
