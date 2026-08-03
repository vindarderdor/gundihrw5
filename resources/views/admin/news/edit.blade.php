<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Berita') }}
            </h2>
            <a href="{{ route('admin.news.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Berita</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror" value="{{ old('title', $news->title) }}" required>
                            @error('title')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Gambar Utama Baru (Opsional)</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" accept="image/*">
                            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar utama.</p>
                            @if($news->image)
                                <div class="mt-2">
                                    <p class="text-sm font-medium text-gray-700 mb-1">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="h-32 object-cover rounded">
                                </div>
                            @endif
                            @error('image')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="images" class="block text-gray-700 text-sm font-bold mb-2">Tambah Gambar Galeri (Multi-gambar Opsional)</label>
                            <input type="file" name="images[]" id="images" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('images.*') border-red-500 @enderror" accept="image/*" multiple>
                            <p class="text-xs text-gray-500 mt-1">Gambar yang diunggah akan ditambahkan ke galeri saat ini.</p>
                            
                            @if($news->images && count($news->images) > 0)
                                <div class="mt-4 p-4 bg-gray-50 border rounded">
                                    <p class="text-sm font-medium text-gray-700 mb-2">Galeri saat ini:</p>
                                    <div class="flex flex-wrap gap-2 mb-2">
                                        @foreach($news->images as $img)
                                            <img src="{{ asset('storage/' . $img) }}" alt="Galeri" class="h-20 w-20 object-cover rounded border">
                                        @endforeach
                                    </div>
                                    <label class="inline-flex items-center mt-2">
                                        <input type="checkbox" name="delete_gallery" value="1" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500">
                                        <span class="ml-2 text-sm text-red-600">Hapus semua gambar galeri lama</span>
                                    </label>
                                </div>
                            @endif

                            @error('images.*')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Konten Berita</label>
                            <textarea name="content" id="content" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror" required>{{ old('content', $news->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_published" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('is_published', $news->is_published) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">Publikasikan Sekarang</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
