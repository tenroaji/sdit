<?php

namespace App\Filament\Resources\PenyusunanRosterResource\Pages;

use App\Filament\Resources\PenyusunanRosterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenyusunanRosters extends ListRecords
{
    protected static string $resource = PenyusunanRosterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Jadwal/Roster'),
        ];
    }

    public function getTitle(): string {
        return "Jadwal Belajar Mengajar";
    }
}
