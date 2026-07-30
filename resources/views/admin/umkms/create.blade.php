<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah UMKM Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.umkms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nama_usaha" class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                                <input type="text" name="nama_usaha" id="nama_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('nama_usaha') }}" required>
                                @error('nama_usaha') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="pemilik" class="block text-sm font-medium text-gray-700">Pemilik</label>
                                <input type="text" name="pemilik" id="pemilik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('pemilik') }}" required>
                                @error('pemilik') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori (Bisa lebih dari satu)</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 p-4 border border-gray-200 rounded-md bg-gray-50">
                                    @foreach($categories as $category)
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                            <span class="ml-2 text-sm text-gray-700">{{ $category->nama_kategori }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('categories') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            
                            <div>
                                <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('no_telepon') }}">
                                @error('no_telepon') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('alamat') }}</textarea>
                                @error('alamat') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi (Opsional)</label>
                                <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="peta_embed" class="block text-sm font-medium text-gray-700">Link Embed Google Maps (Opsional)</label>
                                <p class="text-xs text-gray-500 mb-1">Cara mendapatkan: Buka Google Maps > Cari Lokasi > Bagikan > Sematkan Peta (Embed a map) > Salin HTML (Copy HTML)</p>
                                <textarea name="peta_embed" id="peta_embed" rows="3" placeholder='<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('peta_embed') }}</textarea>
                                @error('peta_embed') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="jam_operasional" class="block text-sm font-medium text-gray-700">Jam Operasional (Opsional)</label>
                                <input type="text" name="jam_operasional" id="jam_operasional" placeholder="Cth: Senin-Jumat, 08:00 - 17:00" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('jam_operasional') }}">
                                @error('jam_operasional') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="link_sosmed" class="block text-sm font-medium text-gray-700">Link Sosmed/Website (Opsional)</label>
                                <input type="text" name="link_sosmed" id="link_sosmed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('link_sosmed') }}">
                                @error('link_sosmed') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                @error('status') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            
                            <div>
                                <label for="foto" class="block text-sm font-medium text-gray-700">Foto UMKM (Opsional)</label>
                                <input type="file" name="foto" id="foto" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none" accept="image/*">
                                @error('foto') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.umkms.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-3">Batal</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
