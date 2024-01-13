<?php

namespace App\Filament\Resources\MasterAbsensiVerificationResource\Pages;

use App\Filament\Resources\MasterAbsensiVerificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasterAbsensiVerification extends EditRecord
{
    protected static string $resource = MasterAbsensiVerificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
