<?php

namespace App\Filament\Resources\StaticInfoResource\Pages;

use App\Filament\Resources\StaticInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStaticInfos extends ListRecords
{
    protected static string $resource = StaticInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
