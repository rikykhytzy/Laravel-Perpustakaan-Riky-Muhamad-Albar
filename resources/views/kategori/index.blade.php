<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if(auth()->user()->role === 'admin')
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="border-b border-gray-200 bg-gray-50/50 px-6 py-4">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Kategori Baru
                        </h3>
                    </div>
                    
                    <form action="{{ route('kategori.store') }}" method="POST" class="p-6 space-y-4">
                        @csrf
                        <div class="max-w-md">
                            <x-input-label for="nama_kategori" value="Nama Kategori" class="font-medium text-gray-700 mb-1" />
                            <x-text-input id="nama_kategori" name="nama_kategori" type="text" class="w-full focus:ring-2 focus:ring-indigo-500/20" required placeholder="Contoh: Novel, Sains, Biografi" />
                        </div>
                        
                        <div class="pt-2 flex justify-start">
                            <x-primary-button class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition-all">
                                {{ __('Simpan Kategori') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        Daftar Kategori Tersedia
                    </h3>
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-3 py-1 rounded-full">
                        Total: {{ count($kategori) }} Kategori
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse table-auto">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold uppercase tracking-wider text-gray-500">
                                <th class="p-4 pl-6 w-20 text-center">ID</th>
                                <th class="p-4">Nama Kategori</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                            @forelse($kategori as $k)
                                <tr class="hover:bg-indigo-50/40 transition-all duration-150">
                                    <td class="p-4 pl-6 text-center font-mono font-semibold text-gray-400">
                                        {{ $k->id }}
                                    </td>
                                    <td class="p-4 font-medium text-gray-900">
                                        <span class="inline-flex items-center bg-blue-50 text-blue-700 text-sm font-semibold px-3 py-1 rounded-md border border-blue-100">
                                            {{ $k->nama_kategori }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="p-8 text-center text-gray-400 italic">
                                        Belum ada data kategori yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>