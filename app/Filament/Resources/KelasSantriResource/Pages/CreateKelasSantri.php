<?php

namespace App\Filament\Resources\KelasSantriResource\Pages;

use App\Filament\Resources\KelasSantriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKelasSantri extends CreateRecord
{
    protected static string $resource = KelasSantriResource::class;
    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
