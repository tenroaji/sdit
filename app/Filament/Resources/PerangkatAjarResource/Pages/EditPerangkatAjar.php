<?php

namespace App\Filament\Resources\PerangkatAjarResource\Pages;

use App\Filament\Resources\PerangkatAjarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerangkatAjar extends EditRecord
{
    protected static string $resource = PerangkatAjarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
