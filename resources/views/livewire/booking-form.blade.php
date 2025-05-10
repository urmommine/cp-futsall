<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4">Buat Booking untuk {{ $lapangan->nama }}</h2>
    <p>Tanggal: {{ $jadwal->tanggal }}</p>
    <p>Jam: {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</p>

    <form wire:submit.prevent="submit" class="mt-4">
        <div class="mb-4">
            <label for="totalJam" class="block text-gray-700">Total Jam</label>
            <input type="number" wire:model.live="totalJam" id="totalJam" class="border rounded w-full p-2" min="1"
                required>
            @error('totalJam') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Total Harga</label>
            <p class="text-lg font-bold">Rp {{ number_format($this->totalHarga, 0, ',', '.') }}</p>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Buat Booking</button>
    </form>
</div>