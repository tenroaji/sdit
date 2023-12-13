<?php

namespace App\Filament\Resources\JamSekolahResource\Pages;

use App\Filament\Resources\JamSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJamSekolahs extends ListRecords
{
    protected static string $resource = JamSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
