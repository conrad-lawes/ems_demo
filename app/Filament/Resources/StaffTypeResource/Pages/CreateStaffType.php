<?php

namespace App\Filament\Resources\StaffTypeResource\Pages;

use App\Filament\Resources\StaffTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStaffType extends CreateRecord
{
    protected static string $resource = StaffTypeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }   
}
