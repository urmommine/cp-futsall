<?php

namespace App\Filament\Resources\EventLapanganResource\Pages;

use App\Filament\Resources\EventLapanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventLapangan extends EditRecord
{
    protected static string $resource = EventLapanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
