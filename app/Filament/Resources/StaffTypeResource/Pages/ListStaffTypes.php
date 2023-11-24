<?php

namespace App\Filament\Resources\StaffTypeResource\Pages;

use App\Filament\Resources\StaffTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaffTypes extends ListRecords
{
    protected static string $resource = StaffTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
