<?php

namespace App\Filament\Resources\PembagianKelasResource\Pages;

use App\Filament\Resources\PembagianKelasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembagianKelas extends ListRecords
{
    protected static string $resource = PembagianKelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Pembagian Kelas Baru'),
        ];
    }
    public function getTitle(): string {
        return "Pembagian Ruangan Kelas";
    }
}
