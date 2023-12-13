<?php

namespace App\Filament\Resources\PengaturanAsramaResource\Pages;

use App\Filament\Resources\PengaturanAsramaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengaturanAsramas extends ListRecords
{
    protected static string $resource = PengaturanAsramaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Pengaturan Kamar Asrama Santri";
    }
}
