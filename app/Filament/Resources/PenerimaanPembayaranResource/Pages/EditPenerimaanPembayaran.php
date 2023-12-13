<?php

namespace App\Filament\Resources\PenerimaanPembayaranResource\Pages;

use App\Filament\Resources\PenerimaanPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenerimaanPembayaran extends EditRecord
{
    protected static string $resource = PenerimaanPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
          //  Actions\DeleteAction::make(),
        ];
    }
}
