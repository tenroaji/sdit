<?php

namespace App\Filament\Resources\JenisUjianResource\Pages;

use App\Filament\Resources\JenisUjianResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJenisUjian extends CreateRecord
{
    protected static string $resource = JenisUjianResource::class;
    protected function getRedirectUrl(): string
{
    return $this->previousUrl ?? $this->getResource()::getUrl('index');
}
}
