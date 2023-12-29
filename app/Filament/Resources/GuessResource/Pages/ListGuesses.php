<?php

namespace App\Filament\Resources\GuessResource\Pages;

use App\Filament\Resources\GuessResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuesses extends ListRecords
{
    protected static string $resource = GuessResource::class;

    protected static ?string $title = 'Palpites';

    protected static ?string $navigationLabel = 'Palpites';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
