<?php

namespace App\Filament\Resources\PengaturanAsramaResource\Pages;

use App\Filament\Resources\PengaturanAsramaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengaturanAsrama extends EditRecord
{
    protected static string $resource = PengaturanAsramaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
