<?php

namespace App\Filament\Resources\GuessStatusResource\Pages;

use App\Filament\Resources\GuessStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuessStatus extends EditRecord
{
    protected static string $resource = GuessStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
