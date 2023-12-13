<?php

namespace App\Filament\Resources\JenisJabatanResource\Pages;

use App\Filament\Resources\JenisJabatanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJenisJabatan extends CreateRecord
{
    protected static string $resource = JenisJabatanResource::class;
    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
