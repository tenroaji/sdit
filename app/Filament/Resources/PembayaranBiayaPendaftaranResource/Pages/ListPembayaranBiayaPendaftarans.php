<?php

namespace App\Filament\Resources\PembayaranBiayaPendaftaranResource\Pages;

use App\Filament\Resources\PembayaranBiayaPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembayaranBiayaPendaftarans extends ListRecords
{
    protected static string $resource = PembayaranBiayaPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Administrasi Pendaftaran Santri Baru";
    }
}
