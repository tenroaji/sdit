<?php

namespace App\Filament\Resources\StaticInfoResource\Pages;

use App\Filament\Resources\StaticInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStaticInfo extends EditRecord
{
    protected static string $resource = StaticInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
