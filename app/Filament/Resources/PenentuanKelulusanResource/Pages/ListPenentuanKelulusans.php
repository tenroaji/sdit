<?php

namespace App\Filament\Resources\PenentuanKelulusanResource\Pages;

use App\Filament\Resources\PenentuanKelulusanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenentuanKelulusans extends ListRecords
{
    protected static string $resource = PenentuanKelulusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Penentuan Kelulusan";
    }
}
