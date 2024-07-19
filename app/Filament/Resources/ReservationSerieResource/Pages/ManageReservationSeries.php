<?php

namespace App\Filament\Resources\ReservationSerieResource\Pages;

use App\Filament\Resources\ReservationSerieResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageReservationSeries extends ManageRecords
{
    protected static string $resource = ReservationSerieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
