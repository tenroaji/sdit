<?php

namespace App\Filament\Resources\GuruReportResource\Pages;

use App\Filament\Resources\GuruReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuruReports extends ListRecords
{
    protected static string $resource = GuruReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
