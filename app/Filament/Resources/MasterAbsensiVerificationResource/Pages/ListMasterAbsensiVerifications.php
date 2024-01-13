<?php

namespace App\Filament\Resources\MasterAbsensiVerificationResource\Pages;

use App\Filament\Resources\MasterAbsensiVerificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterAbsensiVerifications extends ListRecords
{
    protected static string $resource = MasterAbsensiVerificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
