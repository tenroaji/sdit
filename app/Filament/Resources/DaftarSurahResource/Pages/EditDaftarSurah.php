<?php

namespace App\Filament\Resources\DaftarSurahResource\Pages;

use App\Filament\Resources\DaftarSurahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarSurah extends EditRecord
{
    protected static string $resource = DaftarSurahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
