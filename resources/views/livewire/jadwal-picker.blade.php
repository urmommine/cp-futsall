<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-4xl">
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
