<?php

namespace App\Filament\Resources\HariSekolahResource\Pages;

use App\Filament\Resources\HariSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHariSekolahs extends ListRecords
{
    protected static string $resource = HariSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
