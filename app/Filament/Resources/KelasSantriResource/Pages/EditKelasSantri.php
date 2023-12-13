<?php

namespace App\Filament\Resources\KelasSantriResource\Pages;

use App\Filament\Resources\KelasSantriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelasSantri extends EditRecord
{
    protected static string $resource = KelasSantriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
