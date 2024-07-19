<?php

namespace App\Filament\Resources\BlackoutSerieResource\Pages;

use App\Filament\Resources\BlackoutSerieResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBlackoutSeries extends ManageRecords
{
    protected static string $resource = BlackoutSerieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
