<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PaymentUpload extends Component
{
    use WithFileUploads;

    public $bookingId;
    public $buktiPembayaran;
    public $jumlah;

    public function mount($bookingId)
    {
        $this->bookingId = $bookingId;
        $booking = Booking::findOrFail($bookingId);
        $this->jumlah = $booking->total_harga;
    }

    public function submit()
    {
        $this->validate([
            'buktiPembayaran' => 'required|image|max:2048',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $path = $this->buktiPembayaran->store('payments', 'public');

        Payment::create([
            'booking_id' => $this->bookingId,
            'bukti_pembayaran' => $path,
            'jumlah' => $this->jumlah,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Bukti pembayaran berhasil diunggah!');
        return redirect()->route('booking.history');
    }

    public function render()
    {
        $booking = Booking::findOrFail($this->bookingId);
        return view('livewire.payment-upload', compact('booking'))
            ->layout('layouts.app');
    }
}