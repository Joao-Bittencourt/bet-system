@php
use App\Models\BetEvent;

$betEvent = BetEvent::query()->where('id', 1)->first();
$betEventName = $betEvent->name;
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        
        <!-- <img src="{{ asset('img/eventImage.png') }}" alt="Event image" style="height: 12rem;" class="mx-auto"> -->
        
        <div class="flex items-center gap-x-3">
            <div class="flex-1">
                <h2 class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white">
                    {{ $betEventName }}
                </h2>
                {{ 'descrição do evento'}}
            </div>

        </div>
    </x-filament::section>
</x-filament-widgets::widget>