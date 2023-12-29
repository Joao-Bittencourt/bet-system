<?php

namespace App\Filament\Resources\BetEventResource\Pages;

use App\Filament\Resources\BetEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBetEvent extends EditRecord
{
    protected static string $resource = BetEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
