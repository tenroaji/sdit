<?php

namespace App\Filament\Resources\PenyusunanKegiatanResource\Pages;

use App\Filament\Resources\PenyusunanKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenyusunanKegiatan extends EditRecord
{
    protected static string $resource = PenyusunanKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
