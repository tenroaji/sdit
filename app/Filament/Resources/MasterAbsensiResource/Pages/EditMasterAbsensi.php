<?php

namespace App\Filament\Resources\MasterAbsensiResource\Pages;

use App\Filament\Resources\MasterAbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterAbsensi extends EditRecord
{
    protected static string $resource = MasterAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
