<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Buku') }}
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
                            Tambah Buku Baru
                        </h3>
                    </div>
                    
                    <form action="{{ route('buku.store') }}" method="POST" class="p-6 space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="md:col-span-2">
                                <x-input-label for="judul" value="Judul Buku" class="font-medium text-gray-700 mb-1" />
                                <x-text-input id="judul" name="judul" type="text" class="w-full focus:ring-2 focus:ring-indigo-500/20" required placeholder="Masukkan judul lengkap buku" />
                            </div>

                            <div>
                                <x-input-label for="kategori_id" value="Kategori" class="font-medium text-gray-700 mb-1" />
                                <select id="kategori_id" name="kategori_id" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 rounded-md shadow-sm transition-all" required>
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach($kategori as $kat)
                                        <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="penulis" value="Penulis" class="font-medium text-gray-700 mb-1" />
                                <x-text-input id="penulis" name="penulis" type="text" class="w-full" placeholder="Nama penulis" />
                            </div>

                            <div>
                                <x-input-label for="penerbit" value="Penerbit" class="font-medium text-gray-700 mb-1" />
                                <x-text-input id="penerbit" name="penerbit" type="text" class="w-full" placeholder="Nama penerbit" />
                            </div>

                            <div>
                                <x-input-label for="tahun_terbit" value="Tahun Terbit" class="font-medium text-gray-700 mb-1" />
                                <x-text-input id="tahun_terbit" name="tahun_terbit" type="number" class="w-full" placeholder="Contoh: 2024" />
                            </div>

                            <div class="md:col-span-2">
                                <x-input-label for="isbn" value="ISBN" class="font-medium text-gray-700 mb-1" />
                                <x-text-input id="isbn" name="isbn" type="text" class="w-full" placeholder="Masukkan nomor ISBN" />
                            </div>

                            <div>
                                <x-input-label for="stok" value="Stok Jumlah" class="font-medium text-gray-700 mb-1" />
                                <x-text-input id="stok" name="stok" type="number" class="w-full" placeholder="0" min="0" />
                            </div>
                        </div>

                        <div class="flex justify-end pt-4 border-t border-gray-100">
                            <x-primary-button class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition-all">
                                {{ __('Simpan Data Buku') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Daftar Koleksi Buku
                    </h3>
                    <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-3 py-1 rounded-full">
                        Total: {{ count($buku) }} Buku
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full table-fixed text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-xs font-bold uppercase tracking-wider text-gray-500">
                                <th class="p-4 pl-6 w-1/4">Judul Buku</th>
                                <th class="p-4 w-1/6">Kategori</th>
                                <th class="p-4 w-1/6">Penulis</th>
                                <th class="p-4 w-1/6">Penerbit</th>
                                <th class="p-4 text-center w-1/12">Tahun</th>
                                <th class="p-4 text-center pr-6 w-1/12">Stok</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                            @forelse($buku as $b)
                                <tr class="hover:bg-indigo-50/40 transition-all duration-150">
                                    <td class="p-4 pl-6 font-semibold text-gray-900 truncate">
                                        {{ $b->judul }}
                                    </td>
                                    <td class="p-4">
                                        <span class="inline-flex items-center bg-blue-50 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-md border border-blue-100">
                                            {{ $b->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                                        </span>
                                    </td>
                                    <td class="p-4 font-medium truncate">{{ $b->penulis ?? '-' }}</td>
                                    <td class="p-4 truncate">{{ $b->penerbit ?? '-' }}</td>
                                    <td class="p-4 text-center">{{ $b->tahun_terbit ?? '-' }}</td>
                                    <td class="p-4 text-center pr-6">
                                        @if($b->stok <= 0)
                                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-md font-bold">Habis</span>
                                        @else
                                            <span class="bg-emerald-50 text-emerald-700 text-xs px-2.5 py-1 rounded-md font-bold border border-emerald-100">
                                                {{ $b->stok }} Pcs
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-8 text-center text-gray-400 italic">
                                        Belum ada data koleksi buku yang tersedia.
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