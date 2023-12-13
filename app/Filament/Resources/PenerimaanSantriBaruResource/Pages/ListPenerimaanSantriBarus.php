<?php

namespace App\Filament\Resources\PenerimaanSantriBaruResource\Pages;

use App\Filament\Resources\PenerimaanSantriBaruResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
// use Filament\Tables\Actions\Position;

class ListPenerimaanSantriBarus extends ListRecords
{
    protected static string $resource = PenerimaanSantriBaruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    public function getTitle(): string {
        return "Penerimaan Santri Baru";
    }
    // protected function getTableActionsPosition(): ?string
    // {
    //     return Position::BeforeCells;
    // }
    
}
