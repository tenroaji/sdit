<?php

namespace App\Filament\Resources\AbsensiAsramaResource\Pages;

use App\Filament\Resources\AbsensiAsramaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsensiAsramas extends ListRecords
{
    protected static string $resource = AbsensiAsramaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
