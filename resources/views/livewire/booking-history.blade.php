<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4">Riwayat Booking</h2>
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Lapangan</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Jam</th>
                <th class="border p-2">Total Harga</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td class="border p-2">{{ $booking->lapangan->nama }}</td>
                <td class="border p-2">{{ $booking->jadwal->tanggal }}</td>
                <td class="border p-2">{{ $booking->jadwal->jam_mulai }} - {{ $booking->jadwal->jam_selesai }}</td>
                <td class="border p-2">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                <td class="border p-2">{{ $booking->status }}</td>
                <td class="border p-2">
                    @if ($booking->payment)
                    <span>{{ $booking->payment->status }}</span>
                    @else
                    <a href="{{ route('payment.upload', $booking->id) }}" class="text-blue-600 hover:underline">Unggah
                        Bukti</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>