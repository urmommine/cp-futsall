<div class="bg-white rounded-xl shadow-lg p-6 max-w-4xl mx-auto mt-8">
    <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">Unggah Bukti Pembayaran</h2>

    <div class="grid md:grid-cols-2 gap-2 items-center px-6">
        <!-- Info Rekening -->
        <div class="">
            <p class="text-gray-700 mb-2">Booking ID: <span class="font-semibold">{{ $booking->id }}</span></p>
            <p class="text-gray-700 mb-2 font-semibold">Total Bayar: <span class="font-semibold text-green-600">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</span></p>

            <div class="mt-4 space-y-2 font-semibold">
                <p class="text-sm"><span class="font-medium">BRI</span> : 00000000</p>
                <p class="text-sm"><span class="font-medium">Dana</span> : 00000000</p>
                <p class="text-sm"><span class="font-medium">BCA</span> : 00000000</p>
            </div>
        </div>

        <!-- QRIS -->
        <div class="text-center">
            <p class="font-bold mb-2">QRIS</p>
            <img src="{{ asset('Qris.png') }}" alt="Kode QRIS" class="w-15 h-22 mx-auto rounded-md border shadow-sm">
        </div>
    </div>

    <!-- Upload Form -->
    <form wire:submit.prevent="submit" class="mt-8 max-w-xl mx-auto">
        <div class="mb-4">
            <label for="buktiPembayaran" class="block text-gray-700 font-medium mb-1">Bukti Pembayaran</label>
            <input type="file" wire:model="buktiPembayaran" id="buktiPembayaran"
                   class="border border-gray-300 rounded w-full p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('buktiPembayaran') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-6">
            <label for="jumlah" class="block text-gray-700 font-medium mb-1">Jumlah</label>
            <input type="number" wire:model="jumlah" id="jumlah" readonly
                   class="border border-gray-300 rounded w-full p-2 bg-gray-100 text-gray-700">
            @error('jumlah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="text-center">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md shadow-md transition duration-200">
                Unggah
            </button>
        </div>
    </form>
</div>
