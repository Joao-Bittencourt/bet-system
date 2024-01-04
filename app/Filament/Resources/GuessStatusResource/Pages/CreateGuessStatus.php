<?php

namespace App\Filament\Resources\GuessStatusResource\Pages;

use App\Filament\Resources\GuessStatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGuessStatus extends CreateRecord
{
    protected static string $resource = GuessStatusResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
