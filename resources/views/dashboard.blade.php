<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen bg-gray-100 bg-cover bg-center bg-no-repeat" 
         style="background-image: linear-gradient(rgba(243, 244, 246, 0), rgba(243, 244, 246, 0)), url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=2070');">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="bg-white rounded-2xl border border-white p-6 sm:p-8" 
                 style="box-shadow: 6px 6px 12px #bebebe00, -6px -6px 12prgba(255, 255, 255, 0)ff;">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                    
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                            Selamat Datang Kembali, <span class="text-indigo-600 drop-shadow-sm">{{ Auth::user()->name }}</span>!
                        </h1>
                        <p class="mt-2 text-base text-gray-700 leading-relaxed max-w-3xl">
                            Anda telah berhasil masuk ke halaman panel utama sistem informasi Perpustakaan Digital. Gunakan menu navigasi di atas untuk mengelola data secara terintegrasi.
                        </p>
                        
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white p-6 rounded-2xl border border-white flex items-center gap-5 transition-all hover:scale-[1.02]"
                     style="box-shadow: 5px 5px 10px #bebebe00, -5px -5px 10px #ffffff00;">
                    <div class="w-14 h-14 flex items-center justify-center bg-emerald-50 text-emerald-600 rounded-xl shrink-0 border border-emerald-100"
                         style="box-shadow: inset 2px 2px 5px #dcdcdc00, inset -2px -2px 5prgba(255, 255, 255, 0)ff;">
                        <svg class="w-7 h-7 drop-shadow-[1px_2px_1px_rgba(16,185,129,0.4)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Koleksi Buku</p>
                        <p class="text-3xl font-extrabold text-gray-950 mt-0.5">
                            {{ \App\Models\Buku::count() }} <span class="text-sm font-semibold text-gray-500">Judul</span>
                        </p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-white flex items-center gap-5 transition-all hover:scale-[1.02]"
                     style="box-shadow: 5px 5px 10px #bebebe00, -5px -5px 10px #ffffff00;">
                    <div class="w-14 h-14 flex items-center justify-center bg-blue-50 text-blue-600 rounded-xl shrink-0 border border-blue-100"
                         style="box-shadow: inset 2px 2px 5px #dcdcdc00, inset -2px -2px 5px #ffffff00;">
                        <svg class="w-7 h-7 drop-shadow-[1px_2px_1px_rgba(59,130,246,0.4)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori Tersedia</p>
                        <p class="text-3xl font-extrabold text-gray-950 mt-0.5">
                            {{ \App\Models\Kategori::count() }} <span class="text-sm font-semibold text-gray-500">Jenis</span>
                        </p>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</x-app-layout>