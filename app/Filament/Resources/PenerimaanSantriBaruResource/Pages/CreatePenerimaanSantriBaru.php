<?php

namespace App\Filament\Resources\PenerimaanSantriBaruResource\Pages;

use App\Filament\Resources\PenerimaanSantriBaruResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePenerimaanSantriBaru extends CreateRecord
{
    protected static string $resource = PenerimaanSantriBaruResource::class;
    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
