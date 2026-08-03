<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit UMKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.umkms.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nama_usaha" class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                                <input type="text" name="nama_usaha" id="nama_usaha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required>
                                @error('nama_usaha') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="pemilik" class="block text-sm font-medium text-gray-700">Pemilik</label>
                                <input type="text" name="pemilik" id="pemilik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('pemilik', $umkm->pemilik) }}" required>
                                @error('pemilik') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori (Bisa lebih dari satu)</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 p-4 border border-gray-200 rounded-md bg-gray-50">
                                    @php
                                        // Get IDs of currently selected categories
                                        $selectedCategories = old('categories', $umkm->categories->pluck('id')->toArray());
                                    @endphp
                                    @foreach($categories as $category)
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
                                            <span class="ml-2 text-sm text-gray-700">{{ $category->nama_kategori }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('categories') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            
                            <div>
                                <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('no_telepon', $umkm->no_telepon) }}">
                                @error('no_telepon') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>{{ old('alamat', $umkm->alamat) }}</textarea>
                                @error('alamat') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi (Opsional)</label>
                                <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                                @error('deskripsi') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="peta_embed" class="block text-sm font-medium text-gray-700">Link Embed Google Maps (Opsional)</label>
                                <p class="text-xs text-gray-500 mb-1">Cara mendapatkan: Buka Google Maps > Cari Lokasi > Bagikan > Sematkan Peta (Embed a map) > Salin HTML (Copy HTML)</p>
                                <textarea name="peta_embed" id="peta_embed" rows="3" placeholder='<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('peta_embed', $umkm->peta_embed) }}</textarea>
                                @error('peta_embed') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="jam_operasional" class="block text-sm font-medium text-gray-700">Jam Operasional (Opsional)</label>
                                <input type="text" name="jam_operasional" id="jam_operasional" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('jam_operasional', $umkm->jam_operasional) }}">
                                @error('jam_operasional') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="link_sosmed" class="block text-sm font-medium text-gray-700">Link Sosmed/Website (Opsional)</label>
                                <input type="text" name="link_sosmed" id="link_sosmed" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('link_sosmed', $umkm->link_sosmed) }}">
                                @error('link_sosmed') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    <option value="aktif" {{ old('status', $umkm->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status', $umkm->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                @error('status') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            
                            <div>
                                <label for="foto" class="block text-sm font-medium text-gray-700">Foto UMKM (Opsional)</label>
                                @if($umkm->foto)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto {{ $umkm->nama_usaha }}" class="w-32 h-32 object-cover rounded-md">
                                    </div>
                                @endif
                                <input type="file" name="foto" id="foto" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none" accept="image/*">
                                <p class="mt-1 text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah foto.</p>
                                @error('foto') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.umkms.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-3">Batal</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b">
                    <h3 class="text-xl font-bold mb-4">Kelola Menu / Produk</h3>
                    
                    <!-- Form Tambah Produk -->
                    <div class="bg-gray-50 p-4 rounded-lg mb-8 border border-gray-200">
                        <h4 class="font-semibold mb-3">Tambah Produk Baru</h4>
                        <form action="{{ route('admin.products.store', $umkm->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                    <input type="text" name="nama_produk" id="nama_produk" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp) - Opsional</label>
                                    <input type="number" name="harga" id="harga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                <div class="md:col-span-2">
                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi (Opsional)</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="foto" class="block text-sm font-medium text-gray-700">Foto Produk (Opsional)</label>
                                    <input type="file" name="foto" id="foto" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none" accept="image/*">
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded text-sm">
                                    Simpan Produk
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Daftar Produk -->
                    <h4 class="font-semibold mb-3">Daftar Produk UMKM</h4>
                    @if($umkm->products && $umkm->products->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama & Deskripsi</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($umkm->products as $product)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($product->foto)
                                                    <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="h-12 w-12 object-cover rounded">
                                                @else
                                                    <div class="h-12 w-12 bg-gray-200 flex items-center justify-center rounded">
                                                        <span class="text-gray-400 text-xs">-</span>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $product->nama_produk }}</div>
                                                <div class="text-sm text-gray-500">{{ Str::limit($product->deskripsi, 50) }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $product->harga ? 'Rp ' . number_format($product->harga, 0, ',', '.') : '-' }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm">Belum ada produk/menu yang ditambahkan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
