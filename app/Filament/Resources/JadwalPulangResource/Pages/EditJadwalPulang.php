<?php

namespace App\Filament\Resources\JadwalPulangResource\Pages;

use App\Filament\Resources\JadwalPulangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalPulang extends EditRecord
{
    protected static string $resource = JadwalPulangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
