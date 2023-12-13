<?php

namespace App\Filament\Resources\PembagianKelasResource\Pages;

use App\Filament\Resources\PembagianKelasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPembagianKelas extends EditRecord
{
    protected static string $resource = PembagianKelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

}
