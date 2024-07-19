<?php

namespace App\Filament\Resources\ReservationInstanceResource\Pages;

use App\Filament\Resources\ReservationInstanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageReservationInstances extends ManageRecords
{
    protected static string $resource = ReservationInstanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
