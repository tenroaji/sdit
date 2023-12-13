<?php

namespace App\Filament\Resources\PenyusunanJadwalUjianResource\Pages;

use App\Filament\Resources\PenyusunanJadwalUjianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenyusunanJadwalUjian extends EditRecord
{
    protected static string $resource = PenyusunanJadwalUjianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
