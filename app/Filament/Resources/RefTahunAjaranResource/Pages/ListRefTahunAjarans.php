<?php

namespace App\Filament\Resources\RefTahunAjaranResource\Pages;

use App\Filament\Resources\RefTahunAjaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefTahunAjarans extends ListRecords
{
    protected static string $resource = RefTahunAjaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
