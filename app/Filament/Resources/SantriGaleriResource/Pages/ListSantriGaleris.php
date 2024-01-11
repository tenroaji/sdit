<?php

namespace App\Filament\Resources\SantriGaleriResource\Pages;

use App\Filament\Resources\SantriGaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSantriGaleris extends ListRecords
{
    protected static string $resource = SantriGaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
