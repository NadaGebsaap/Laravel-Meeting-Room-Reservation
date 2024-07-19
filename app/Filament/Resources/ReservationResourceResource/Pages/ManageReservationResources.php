<?php

namespace App\Filament\Resources\ReservationResourceResource\Pages;

use App\Filament\Resources\ReservationResourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageReservationResources extends ManageRecords
{
    protected static string $resource = ReservationResourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
