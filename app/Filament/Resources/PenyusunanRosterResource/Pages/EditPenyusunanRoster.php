<?php

namespace App\Filament\Resources\PenyusunanRosterResource\Pages;

use App\Filament\Resources\PenyusunanRosterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenyusunanRoster extends EditRecord
{
    protected static string $resource = PenyusunanRosterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
