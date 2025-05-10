<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingHistory extends Component
{
    public function render()
    {
        $bookings = Booking::where('user_id', Auth::id())->with(['lapangan', 'jadwal', 'payment'])->get();
        return view('livewire.booking-history', compact('bookings'))
            ->layout('layouts.app');
    }
}