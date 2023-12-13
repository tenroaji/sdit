<?php

namespace App\Filament\Resources\HubungiKamiResource\Pages;

use App\Filament\Resources\HubungiKamiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHubungiKami extends EditRecord
{
    protected static string $resource = HubungiKamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
