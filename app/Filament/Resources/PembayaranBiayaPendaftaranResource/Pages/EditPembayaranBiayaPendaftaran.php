<?php

namespace App\Filament\Resources\PembayaranBiayaPendaftaranResource\Pages;

use App\Filament\Resources\PembayaranBiayaPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPembayaranBiayaPendaftaran extends EditRecord
{
    protected static string $resource = PembayaranBiayaPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
