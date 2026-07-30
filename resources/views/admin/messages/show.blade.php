<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Pesan') }}
            </h2>
            <a href="{{ route('admin.messages.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <div class="mb-4 pb-4 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Pesan dari {{ $message->nama_pengirim }}</h3>
                            <div class="flex items-center text-sm text-gray-500">
                                <span class="font-medium text-gray-900 mr-2">{{ $message->nama_pengirim }}</span>
                                <span>&lt;{{ $message->email }}&gt;</span>
                                <span class="mx-2">&bull;</span>
                                <span>{{ $message->created_at->format('d M Y, H:i') }}</span>
                            </div>
                        </div>
                        
                        <div class="prose max-w-none text-gray-700 whitespace-pre-wrap">
                            {{ $message->isi_pesan }}
                        </div>
                    </div>

                    <div class="mt-6">
                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Yakin ingin menghapus pesan ini?')">Hapus Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
