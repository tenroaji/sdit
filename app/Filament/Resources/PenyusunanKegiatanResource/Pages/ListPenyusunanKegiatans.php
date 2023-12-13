<?php

namespace App\Filament\Resources\PenyusunanKegiatanResource\Pages;

use App\Filament\Resources\PenyusunanKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenyusunanKegiatans extends ListRecords
{
    protected static string $resource = PenyusunanKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Penyusunan Kegiatan Kokurikuler";
    }
}
