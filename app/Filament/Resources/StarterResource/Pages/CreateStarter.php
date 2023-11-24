<?php

namespace App\Filament\Resources\StarterResource\Pages;

use App\Filament\Resources\StarterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStarter extends CreateRecord
{
    protected static string $resource = StarterResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }   

}
