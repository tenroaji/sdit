<?php

namespace App\Filament\Resources\AbsensiAsramaResource\Pages;

use App\Filament\Resources\AbsensiAsramaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbsensiAsrama extends EditRecord
{
    protected static string $resource = AbsensiAsramaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
