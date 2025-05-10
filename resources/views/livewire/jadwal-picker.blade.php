<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4">Pilih Jadwal untuk {{ $lapangan->nama }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($jadwals as $jadwal)
        <div class="border p-4 rounded-md {{ $jadwal->id == $selectedJadwalId ? 'border-blue-600' : '' }}">
            <p>Tanggal: {{ $jadwal->tanggal }}</p>
            <p>Jam: {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</p>
            <button wire:click="selectJadwal({{ $jadwal->id }})"
                class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Pilih</button>
        </div>
        @endforeach
    </div>
</div>