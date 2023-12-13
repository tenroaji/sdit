<?php

namespace App\Filament\Resources\JadwalPulangResource\Pages;

use App\Filament\Resources\JadwalPulangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalPulangs extends ListRecords
{
    protected static string $resource = JadwalPulangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Jadwal Pulang Santri";
    }
}
