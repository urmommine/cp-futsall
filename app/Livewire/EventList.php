<?php

namespace App\Livewire;

use App\Models\EventLapangan;
use Livewire\Component;
use Livewire\WithPagination;

class EventList extends Component
{
    use WithPagination;

    public function render()
    {
        $get_event = EventLapangan::paginate(10);
        return view('livewire.event-list', compact('get_event'))
        ->layout('layouts.app');

    }
}
