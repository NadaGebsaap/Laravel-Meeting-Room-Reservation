<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class TestWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::whereHas('roles', function($query) {
                $query->where('name', 'user');
            })->count())
                ->description('Users that have joined')
                ->descriptionIcon('heroicon-s-user-group', IconPosition::Before) 
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Admins', User::whereHas('roles', function($query) {
                $query->where('name', 'admin');
            })->count())
                ->description('All admins in the system')
                ->descriptionIcon('heroicon-s-user-group', IconPosition::Before) 
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
