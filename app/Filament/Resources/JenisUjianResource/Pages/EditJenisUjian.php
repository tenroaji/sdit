<?php

namespace App\Filament\Resources\JenisUjianResource\Pages;

use App\Filament\Resources\JenisUjianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisUjian extends EditRecord
{
    protected static string $resource = JenisUjianResource::class;

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
