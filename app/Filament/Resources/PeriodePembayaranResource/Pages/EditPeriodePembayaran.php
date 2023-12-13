<?php

namespace App\Filament\Resources\PeriodePembayaranResource\Pages;

use App\Filament\Resources\PeriodePembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriodePembayaran extends EditRecord
{
    protected static string $resource = PeriodePembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
