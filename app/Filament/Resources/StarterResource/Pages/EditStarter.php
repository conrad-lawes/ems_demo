<?php

namespace App\Filament\Resources\StarterResource\Pages;

use App\Filament\Resources\StarterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStarter extends EditRecord
{
    protected static string $resource = StarterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }   


    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
