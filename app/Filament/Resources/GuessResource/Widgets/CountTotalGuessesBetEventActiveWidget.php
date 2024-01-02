<?php

namespace App\Filament\Resources\GuessResource\Widgets;

use App\Models\Guess;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CountTotalGuessesBetEventActiveWidget extends BaseWidget
{
    protected function getStats(): array
    {

        return [
            StatsOverviewWidget\Stat::make(
                label: 'Quantidade de apostas',
                value: Guess::query()
                    // @ToDo: refatorar para mudar dinamicamente
                    ->where('bet_event_id', 1)
                    ->where('deleted_at', null)
                    ->count(),
            ),
            StatsOverviewWidget\Stat::make(
                label: 'Valor total de apostas',
                value: number_format(Guess::query()
                    // @ToDo: refatorar para mudar dinamicamente
                    ->where('bet_event_id', 1)
                    ->where('deleted_at', null)
                    ->sum('value'), 2, ',', '.'),
            ),
        ];
    }
}
