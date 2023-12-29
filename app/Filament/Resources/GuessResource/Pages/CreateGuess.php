<?php

namespace App\Filament\Resources\GuessResource\Pages;

use App\Filament\Resources\GuessResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGuess extends CreateRecord
{
    protected static string $resource = GuessResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
