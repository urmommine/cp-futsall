<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4">Unggah Bukti Pembayaran</h2>
    <p>Booking ID: {{ $booking->id }}</p>
    <p>Total Harga: Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</p>

    <form wire:submit.prevent="submit" class="mt-4">
        <div class="mb-4">
            <label for="buktiPembayaran" class="block text-gray-700">Bukti Pembayaran</label>
            <input type="file" wire:model="buktiPembayaran" id="buktiPembayaran" class="border rounded w-full p-2">
            @error('buktiPembayaran') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="jumlah" class="block text-gray-700">Jumlah</label>
            <input type="number" wire:model="jumlah" id="jumlah" class="border rounded w-full p-2" readonly>
            @error('jumlah') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Unggah</button>
    </form>
</div>