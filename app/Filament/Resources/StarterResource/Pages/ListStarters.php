<?php

namespace App\Filament\Resources\StarterResource\Pages;

use App\Filament\Resources\StarterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStarters extends ListRecords
{
    protected static string $resource = StarterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
