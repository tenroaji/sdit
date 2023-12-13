<?php

namespace App\Filament\Resources\JenisUjianResource\Pages;

use App\Filament\Resources\JenisUjianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisUjians extends ListRecords
{
    protected static string $resource = JenisUjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Daftar Ujian";
    }
}
