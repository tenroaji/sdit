<?php

namespace App\Filament\Resources\PenentuanKenaikanResource\Pages;

use App\Filament\Resources\PenentuanKenaikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenentuanKenaikans extends ListRecords
{
    protected static string $resource = PenentuanKenaikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Penentuan Kenaikan Kelas'),
        ];
    }
}
