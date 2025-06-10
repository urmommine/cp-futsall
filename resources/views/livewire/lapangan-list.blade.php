<div class="relative w-full min-h-screen flex flex-col justify-between">
    <!-- Background image with gradient overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('bg-futsal.jpg') }}" alt="Background" class="w-full h-full object-cover brightness-75">
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-blue-900/60 to-blue-700/40"></div>
    </div>

    <!-- Konten utama -->
    <div class="relative z-10 px-2 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
            @foreach ($lapangans as $lapangan)
            <div class="bg-blue-100 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 p-0 flex flex-col overflow-hidden group border border-gray-200 max-w-md mx-auto">
                <div class="relative">
                    <img src="{{ Storage::url($lapangan->gambar) }}" alt="{{ $lapangan->nama }}"
                        class="w-full h-56 object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute top-3 right-3 bg-white/90 rounded-full px-3 py-1 text-sm font-semibold text-blue-700 shadow">
                        #{{ $lapangan->id }}
                    </div>
                </div>
                <div class="p-5 flex-1 flex flex-col">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors duration-200">
                        {{ $lapangan->nama }}
                    </h2>
                    <p class="text-gray-600 text-base mb-3 flex-1">
                        {{ \Illuminate\Support\Str::limit($lapangan->deskripsi, 120) }}
                    </p>
                    <div class="mb-3">
                        <p class="text-lg font-semibold text-green-600">
                            Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }} / jam
                        </p>
                    </div>
                    <a href="{{ route('jadwal.select', $lapangan->id) }}"
                        class="mt-auto inline-block bg-gradient-to-r from-blue-600 to-blue-400 text-white font-semibold px-6 py-2 rounded-lg shadow hover:from-blue-700 hover:to-blue-500 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-300 text-base">
                        <svg class="inline-block w-5 h-5 mr-2 -mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 17l4 4 4-4m0-5V3m-8 4v10a4 4 0 004 4h4"></path>
                        </svg>
                        Pilih Jadwal
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            {{ $lapangans->links() }}
        </div>
    </div>
</div>
