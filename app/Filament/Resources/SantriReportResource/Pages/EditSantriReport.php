<?php

namespace App\Filament\Resources\SantriReportResource\Pages;

use App\Filament\Resources\SantriReportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSantriReport extends EditRecord
{
    protected static string $resource = SantriReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
