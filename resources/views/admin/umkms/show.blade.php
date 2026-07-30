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
        </div>
    </div>
</x-app-layout>
