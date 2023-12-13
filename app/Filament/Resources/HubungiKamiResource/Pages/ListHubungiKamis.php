<?php

namespace App\Filament\Resources\HubungiKamiResource\Pages;

use App\Filament\Resources\HubungiKamiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHubungiKamis extends ListRecords
{
    protected static string $resource = HubungiKamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Daftar Pesan Publik";
    }
}
