<?php

namespace App\Filament\Resources\GuessStatusResource\Pages;

use App\Filament\Resources\GuessStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuessStatuses extends ListRecords
{
    protected static string $resource = GuessStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
