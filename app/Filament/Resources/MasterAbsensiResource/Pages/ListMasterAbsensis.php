<?php

namespace App\Filament\Resources\MasterAbsensiResource\Pages;

use App\Filament\Resources\MasterAbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterAbsensis extends ListRecords
{
    protected static string $resource = MasterAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Absensi Baru'),
        ];
    }
    public function getTitle(): string {
        return "Pembuatan Absensi";
    }
}
