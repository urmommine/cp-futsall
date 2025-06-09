<div class="relative w-full min-h-screen flex flex-col justify-between">
    <!-- Background image with gradient overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('bg-futsal.jpg') }}" alt="Background" class="w-full h-full object-cover brightness-75">
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-blue-900/60 to-blue-700/40"></div>
    </div>

    <!-- Konten utama -->
    <div class="relative z-10 flex items-center justify-center px-4 py-10">
        <div class="bg-blue-100 backdrop-blur-sm rounded-2xl shadow-xl p-8 w-full max-w-4xl">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
                Pilih Jadwal untuk {{ $lapangan->nama }}
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($jadwals as $jadwal)
                    <div
                        class="border rounded-xl p-4 shadow-sm hover:shadow-md transition duration-200
                        {{ $jadwal->id == $selectedJadwalId ? 'border-blue-600 ring-2 ring-blue-200' : 'border-gray-200' }}">

                        <p class="text-sm text-gray-600"><strong>Tanggal:</strong> {{ $jadwal->tanggal }}</p>
                        <p class="text-sm text-gray-600"><strong>Jam:</strong> {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</p>

                        <button wire:click="selectJadwal({{ $jadwal->id }})"
                            class="mt-4 w-full bg-blue-600 text-white py-2 rounded-md font-medium hover:bg-blue-700 transition">
                            Pilih
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
