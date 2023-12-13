<?php

namespace App\Filament\Resources\HariSekolahResource\Pages;

use App\Filament\Resources\HariSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHariSekolah extends CreateRecord
{
    protected static string $resource = HariSekolahResource::class;
    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
