<?php

namespace App\Filament\Resources\JenisJabatanResource\Pages;

use App\Filament\Resources\JenisJabatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisJabatan extends EditRecord
{
    protected static string $resource = JenisJabatanResource::class;

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
