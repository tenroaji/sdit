<?php

namespace App\Filament\Resources\AsramaResource\Pages;

use App\Filament\Resources\AsramaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAsrama extends CreateRecord
{
    protected static string $resource = AsramaResource::class;
//     protected function getRedirectUrl(): string
// {
//     return $this->previousUrl ?? $this->getResource()::getUrl('index');
// }
}
