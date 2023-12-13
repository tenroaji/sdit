<?php

namespace App\Filament\Resources\MasterNilaiResource\Pages;

use App\Filament\Resources\MasterNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterNilais extends ListRecords
{
    protected static string $resource = MasterNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
