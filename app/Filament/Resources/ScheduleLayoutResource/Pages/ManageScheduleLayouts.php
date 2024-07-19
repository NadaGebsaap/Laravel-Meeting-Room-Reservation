<?php

namespace App\Filament\Resources\ScheduleLayoutResource\Pages;

use App\Filament\Resources\ScheduleLayoutResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageScheduleLayouts extends ManageRecords
{
    protected static string $resource = ScheduleLayoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
