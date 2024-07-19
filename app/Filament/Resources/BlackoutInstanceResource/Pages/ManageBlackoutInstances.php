<?php

namespace App\Filament\Resources\BlackoutInstanceResource\Pages;

use App\Filament\Resources\BlackoutInstanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBlackoutInstances extends ManageRecords
{
    protected static string $resource = BlackoutInstanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
