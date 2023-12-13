<?php

namespace App\Filament\Resources\HariSekolahResource\Pages;

use App\Filament\Resources\HariSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHariSekolah extends EditRecord
{
    protected static string $resource = HariSekolahResource::class;

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
