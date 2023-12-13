<?php

namespace App\Filament\Resources\ModulTahfizResource\Pages;

use App\Filament\Resources\ModulTahfizResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModulTahfiz extends EditRecord
{
    protected static string $resource = ModulTahfizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
