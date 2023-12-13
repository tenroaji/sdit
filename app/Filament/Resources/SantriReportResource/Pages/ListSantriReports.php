<?php

namespace App\Filament\Resources\SantriReportResource\Pages;

use App\Filament\Resources\SantriReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSantriReports extends ListRecords
{
    protected static string $resource = SantriReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
