<?php

namespace App\Filament\Resources\ModulTahfizResource\Pages;

use App\Filament\Resources\ModulTahfizResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModulTahfizs extends ListRecords
{
    protected static string $resource = ModulTahfizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Setoran Hafalan";
    }
}
