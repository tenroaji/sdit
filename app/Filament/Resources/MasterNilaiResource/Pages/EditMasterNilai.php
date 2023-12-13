<?php

namespace App\Filament\Resources\MasterNilaiResource\Pages;

use App\Filament\Resources\MasterNilaiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterNilai extends EditRecord
{
    protected static string $resource = MasterNilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
