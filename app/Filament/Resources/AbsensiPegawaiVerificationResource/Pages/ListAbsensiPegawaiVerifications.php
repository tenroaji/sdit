<?php

namespace App\Filament\Resources\AbsensiPegawaiVerificationResource\Pages;

use App\Filament\Resources\AbsensiPegawaiVerificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsensiPegawaiVerifications extends ListRecords
{
    protected static string $resource = AbsensiPegawaiVerificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
