<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Models\Jadwal;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    protected function afterCreate(): void
    {
        $booking = $this->record;
        $jadwal = Jadwal::find($booking->jadwal_id);
        $jadwal->update(['status' => 'dipesan']);
    }
}