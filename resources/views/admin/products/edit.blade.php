<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Produk: ') }} {{ $product->nama_produk }}
            </h2>
            <a href="{{ route('admin.umkms.edit', $product->umkm_id) }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded text-sm">
                Kembali ke UMKM
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                            <div>
                                <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp) - Opsional</label>
                                <input type="number" name="harga" id="harga" value="{{ old('harga', $product->harga) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi (Opsional)</label>
                                <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label for="foto" class="block text-sm font-medium text-gray-700">Foto Produk Baru (Biarkan kosong jika tidak ingin mengubah)</label>
                                @if($product->foto)
                                    <div class="mt-2 mb-3">
                                        <p class="text-sm text-gray-500 mb-1">Foto saat ini:</p>
                                        <img src="{{ asset('storage/' . $product->foto) }}" alt="{{ $product->nama_produk }}" class="h-32 object-cover rounded shadow">
                                    </div>
                                @endif
                                <input type="file" name="foto" id="foto" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer focus:outline-none" accept="image/*">
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded text-sm">
                                Perbarui Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
