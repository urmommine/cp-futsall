<?php

namespace App\Filament\Resources\EventLapanganResource\Pages;

use App\Filament\Resources\EventLapanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventLapangans extends ListRecords
{
    protected static string $resource = EventLapanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
