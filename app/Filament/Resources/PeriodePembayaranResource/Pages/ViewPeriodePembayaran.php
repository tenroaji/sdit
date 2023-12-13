<?php

namespace App\Filament\Resources\PeriodePembayaranResource\Pages;

use App\Filament\Resources\PeriodePembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPeriodePembayaran extends ViewRecord
{
    protected static string $resource = PeriodePembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
