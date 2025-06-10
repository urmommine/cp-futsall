<div class="relative w-full min-h-screen flex flex-col justify-between">
    <!-- Background image with gradient overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('bg-futsal.jpg') }}" alt="Background" class="w-full h-full object-cover brightness-75">
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-blue-900/60 to-blue-700/40"></div>
    </div>

    <!-- Konten Booking -->
    <div class="relative z-10 flex items-center justify-center px-4 py-10">
        <div class="bg-blue-100 backdrop-blur-sm rounded-2xl shadow-xl p-8 w-full max-w-xl">
            <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center">
                Buat Booking untuk {{ $lapangan->nama }}
            </h2>

            <div class="text-center text-gray-600 mb-6">
                <p><strong>Tanggal:</strong> {{ $jadwal->tanggal }}</p>
                <p><strong>Jam:</strong> {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</p>
                <p><strong>Harga per Jam:</strong> Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}</p>
            </div>

            <form wire:submit.prevent="submit">
                <div class="mb-4">
                    <label for="totalJam" class="block text-sm font-medium text-gray-700 mb-1">Total Jam</label>
                    <input type="number" wire:model.live="totalJam" id="totalJam"
                        class="border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        min="1" required>
                    @error('totalJam')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Total Harga</label>
                    <p class="text-xl font-bold text-gray-800">Rp {{ number_format($this->totalHarga, 0, ',', '.') }}</p>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Buat Booking
                </button>
            </form>
        </div>
    </div>
</div>
