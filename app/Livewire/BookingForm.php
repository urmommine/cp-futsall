<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingForm extends Component
{
    public $lapanganId;
    public $jadwalId;
    public $totalJam = 1;

    public function mount($lapanganId, $jadwalId)
    {
        $this->lapanganId = $lapanganId;
        $this->jadwalId = $jadwalId;
    }

    public function getTotalHargaProperty()
    {
        return (int)$this->totalJam * 50000;
    }

    public function submit()
    {
        $this->validate([
            'totalJam' => 'required|integer|min:1',
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'lapangan_id' => $this->lapanganId,
            'jadwal_id' => $this->jadwalId,
            'total_jam' => $this->totalJam,
            'total_harga' => $this->totalHarga,
            'status' => 'pending',
        ]);

        Jadwal::find($this->jadwalId)->update(['status' => 'dipesan']);

        session()->flash('message', 'Booking berhasil dibuat!');
        return redirect()->route('booking.history');
    }

    public function render()
    {
        $lapangan = Lapangan::findOrFail($this->lapanganId);
        $jadwal = Jadwal::findOrFail($this->jadwalId);
        return view('livewire.booking-form', compact('lapangan', 'jadwal'))
            ->layout('layouts.app');
    }
}