<?php

namespace App\Filament\Resources\JamSekolahResource\Pages;

use App\Filament\Resources\JamSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJamSekolah extends EditRecord
{
    protected static string $resource = JamSekolahResource::class;

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
