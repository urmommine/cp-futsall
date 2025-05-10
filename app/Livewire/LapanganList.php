<?php

namespace App\Livewire;

use App\Models\Lapangan;
use Livewire\Component;

class LapanganList extends Component
{
    public function render()
    {
        $lapangans = Lapangan::all();
        return view('livewire.lapangan-list', compact('lapangans'))
            ->layout('layouts.app');
    }
}