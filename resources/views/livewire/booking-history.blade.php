<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Riwayat Booking</h2>
    <table class="w-full border-collapse text-sm">
        <thead>
            <tr class="bg-green-200 text-left">
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
            <tr class="hover:bg-gray-50">
                <td class="border p-2">{{ $booking->lapangan->nama }}</td>
                <td class="border p-2">{{ $booking->jadwal->tanggal }}</td>
                <td class="border p-2">{{ $booking->jadwal->jam_mulai }} - {{ $booking->jadwal->jam_selesai }}</td>
                <td class="border p-2">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                <td class="border p-2">
                    @php
                        $statusClass = match($booking->status) {
                            'confirmed' => 'text-green-700 bg-green-100',
                            'pending' => 'text-orange-700 bg-orange-100',
                            'canceled' => 'text-red-700 bg-red-100',
                            default => 'text-gray-700 bg-gray-100',
                        };
                    @endphp
                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $statusClass }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
                <td class="border p-2">
                    @if ($booking->payment)
                        @php
                             $paymentStatus = strtolower($booking->payment->status);
                             $paymentClass = match($paymentStatus) {
                                 'verified' => 'text-green-700 bg-green-100',
                                 'pending' => 'text-red-700 bg-red-100',
                                 default => 'text-gray-700 bg-gray-100',
                             };
                         @endphp
                         <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $paymentClass }}">
                             {{ ucfirst($paymentStatus) }}
                         </span>
                    @else
                        <a href="{{ route('payment.upload', $booking->id) }}"
                           class="text-blue-600 hover:underline">Unggah Bukti</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
