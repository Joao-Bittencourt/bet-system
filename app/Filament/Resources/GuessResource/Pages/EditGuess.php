<?php

namespace App\Filament\Resources\GuessResource\Pages;

use App\Filament\Resources\GuessResource;
use Filament\Resources\Pages\EditRecord;

class EditGuess extends EditRecord
{
    protected static string $resource = GuessResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
