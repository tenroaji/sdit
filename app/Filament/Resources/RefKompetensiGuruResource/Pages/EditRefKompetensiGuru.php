<?php

namespace App\Filament\Resources\RefKompetensiGuruResource\Pages;

use App\Filament\Resources\RefKompetensiGuruResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefKompetensiGuru extends EditRecord
{
    protected static string $resource = RefKompetensiGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
