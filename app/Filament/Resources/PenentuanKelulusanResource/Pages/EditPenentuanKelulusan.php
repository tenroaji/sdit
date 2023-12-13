<?php

namespace App\Filament\Resources\PenentuanKelulusanResource\Pages;

use App\Filament\Resources\PenentuanKelulusanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenentuanKelulusan extends EditRecord
{
    protected static string $resource = PenentuanKelulusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
