 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Tambah Buku') }}
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
            </div>
        </div> 
</x-app-layout>