<?php

namespace App\Filament\Resources\JamSekolahResource\Pages;

use App\Filament\Resources\JamSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJamSekolah extends CreateRecord
{
    protected static string $resource = JamSekolahResource::class;
    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
