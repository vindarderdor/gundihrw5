<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail UMKM: ') }} {{ $umkm->nama_usaha }}
            </h2>
            <a href="{{ route('admin.umkms.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            @if($umkm->foto)
                                <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto {{ $umkm->nama_usaha }}" class="w-full h-auto rounded-lg shadow-md">
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg shadow-md">
                                    <span class="text-gray-500">Tidak ada foto</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="md:col-span-2">
                            <h3 class="text-2xl font-bold mb-2">{{ $umkm->nama_usaha }}</h3>
                            
                            <div class="mb-4">
                                @if($umkm->status == 'aktif')
                                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">Status: Aktif</span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">Status: Nonaktif</span>
                                @endif
                            </div>
                            
                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Pemilik</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $umkm->pemilik }}</dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                                    <dd class="mt-1 text-sm text-gray-900">
                                        @forelse($umkm->categories as $category)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mr-1 mb-1">
                                                {{ $category->nama_kategori }}
                                            </span>
                                        @empty
                                            -
                                        @endforelse
                                    </dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">No. Telepon</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $umkm->no_telepon ?? '-' }}</dd>
                                </div>
                                <div class="sm:col-span-1">
                                    <dt class="text-sm font-medium text-gray-500">Jam Operasional</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $umkm->jam_operasional ?? '-' }}</dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $umkm->alamat }}</dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $umkm->deskripsi ?? 'Tidak ada deskripsi' }}</dd>
                                </div>
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">Link Sosial Media / Website</dt>
                                    <dd class="mt-1 text-sm text-blue-600 hover:underline">
                                        @if($umkm->link_sosmed)
                                            <a href="{{ $umkm->link_sosmed }}" target="_blank">{{ $umkm->link_sosmed }}</a>
                                        @else
                                            <span class="text-gray-900">-</span>
                                        @endif
                                    </dd>
                                </div>
                            </dl>

                            <div class="mt-6 flex space-x-3">
                                <a href="{{ route('admin.umkms.edit', $umkm->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                    Edit UMKM
                                </a>
                            </div>
                        </div>
                    </div>
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
