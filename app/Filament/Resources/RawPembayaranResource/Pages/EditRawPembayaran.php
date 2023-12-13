<?php

namespace App\Filament\Resources\RawPembayaranResource\Pages;

use App\Filament\Resources\RawPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRawPembayaran extends EditRecord
{
    protected static string $resource = RawPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
          //  Actions\DeleteAction::make(),
        ];
    }
}
