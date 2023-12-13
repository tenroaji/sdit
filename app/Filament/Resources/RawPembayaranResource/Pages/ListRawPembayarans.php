<?php

namespace App\Filament\Resources\RawPembayaranResource\Pages;

use App\Filament\Resources\RawPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRawPembayarans extends ListRecords
{
    protected static string $resource = RawPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
          //  Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string {
        return "Daftar Tunggakan Pembayaran";
    }
}
