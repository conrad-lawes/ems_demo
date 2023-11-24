<?php

namespace App\Filament\Widgets\Dashboard;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Employee;
use App\Models\Starter;

class EmployeeStats extends BaseWidget
{
    protected static ?int $sort = 2;
    protected function getStats(): array
    {
        return [
            Stat::make('Employee Count', Employee::count())
            ->icon('heroicon-o-users')
            ->description('Total number of active employees'),
            Stat::make('Pending Starters', Starter::query()->where('status','Pending')->count())
            ->icon('heroicon-o-users')
            ->description('New hires waiting to be processed'),
            // Stat::make('Average time on page', '3:12'),
        ];
    }
}
