<?php

namespace App\Filament\Resources\PeriodePembayaranResource\Pages;

use App\Filament\Resources\PeriodePembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriodePembayarans extends ListRecords
{
    protected static string $resource = PeriodePembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Periode Pembayaran Baru'),
        ];
    }
    public function getTitle(): string {
        return "Daftar Periode Pembayaran";
    }
}
