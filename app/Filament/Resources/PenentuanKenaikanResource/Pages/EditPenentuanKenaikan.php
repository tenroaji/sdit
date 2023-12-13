<?php

namespace App\Filament\Resources\PenentuanKenaikanResource\Pages;

use App\Filament\Resources\PenentuanKenaikanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenentuanKenaikan extends EditRecord
{
    protected static string $resource = PenentuanKenaikanResource::class;

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
