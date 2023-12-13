<?php

namespace App\Filament\Resources\DaftarSurahResource\Pages;

use App\Filament\Resources\DaftarSurahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarSurahs extends ListRecords
{
    protected static string $resource = DaftarSurahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Daftar Surah";
    }
}
