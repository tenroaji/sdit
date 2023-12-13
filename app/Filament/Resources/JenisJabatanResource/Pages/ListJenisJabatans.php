<?php

namespace App\Filament\Resources\JenisJabatanResource\Pages;

use App\Filament\Resources\JenisJabatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisJabatans extends ListRecords
{
    protected static string $resource = JenisJabatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Daftar Jabatan";
    }
}
