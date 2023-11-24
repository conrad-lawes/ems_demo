<?php

namespace App\Filament\Resources\StaffTypeResource\Pages;

use App\Filament\Resources\StaffTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaffType extends EditRecord
{
    protected static string $resource = StaffTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }   

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->hidden(),
        ];
    }
}
