<?php

namespace App\Filament\Resources\PenerimaanPembayaranResource\Pages;

use Actions\Action;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\PenerimaanPembayaranResource;

class ListPenerimaanPembayarans extends ListRecords
{
    protected static string $resource = PenerimaanPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
    public function getTitle(): string {
        return "Daftar Penerimaan Pembayaran";
    }
}
