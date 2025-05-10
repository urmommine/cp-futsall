<?php

namespace App\Livewire;

use App\Models\Jadwal;
use App\Models\Lapangan;
use Livewire\Component;

class JadwalPicker extends Component
{
    public $lapanganId;
    public $selectedJadwalId;

    public function mount($lapanganId)
    {
        $this->lapanganId = $lapanganId;
    }

    public function render()
    {
        $lapangan = Lapangan::findOrFail($this->lapanganId);
        $jadwals = Jadwal::where('lapangan_id', $this->lapanganId)
            ->where('status', 'tersedia')
            ->get();
        return view('livewire.jadwal-picker', compact('lapangan', 'jadwals'))
            ->layout('layouts.app');
    }

    public function selectJadwal($jadwalId)
    {
        $this->selectedJadwalId = $jadwalId;
        $this->redirect(route('booking.create', ['lapanganId' => $this->lapanganId, 'jadwalId' => $jadwalId]));
    }
}