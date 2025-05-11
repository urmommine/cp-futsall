<?php

namespace App\Livewire;

use App\Models\Lapangan;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title("Lapangan List")]
class LapanganList extends Component
{
    use WithPagination;

    public function render()
    {
        $lapangans = Lapangan::paginate(10);
        return view('livewire.lapangan-list', compact('lapangans'))
            ->layout('layouts.app');
    }
}