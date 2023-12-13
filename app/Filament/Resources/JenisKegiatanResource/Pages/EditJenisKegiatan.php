<?php

namespace App\Filament\Resources\JenisKegiatanResource\Pages;

use App\Filament\Resources\JenisKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisKegiatan extends EditRecord
{
    protected static string $resource = JenisKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
