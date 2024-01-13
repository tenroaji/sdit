<?php

namespace App\Filament\Resources\AbsensiPegawaiVerificationResource\Pages;

use App\Filament\Resources\AbsensiPegawaiVerificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbsensiPegawaiVerification extends EditRecord
{
    protected static string $resource = AbsensiPegawaiVerificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
