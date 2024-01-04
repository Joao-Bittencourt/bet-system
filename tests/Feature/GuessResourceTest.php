<?php

use App\Filament\Resources\GuessResource;
use App\Models\BetEvent;
use App\Models\Guess;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

test('Admin can render guess index page', function () {
    $this->get(GuessResource::getUrl('index'))->assertSuccessful();
});

test('Admin can render guess create page', function () {
    $this->get(GuessResource::getUrl('create'))->assertSuccessful();
});

test('Admin can render guess edit page', function () {

    BetEvent::factory(1)->create(['created_by' => Auth::id()]);

    $guess = Guess::create([
        'bet_event_id' => 1,
        'created_by' => Auth::id(),
        'guess' => 'test',
    ]);

    $this->get(GuessResource::getUrl('edit', ['record' => $guess]))->assertSuccessful();
});

test('User can render guess index page', function () {

    $this->actingAs($this->userUser);

    $this->get(GuessResource::getUrl('index'))->assertSuccessful();
});

test('User can render guess create page', function () {
    $this->actingAs($this->userUser);
    $this->get(GuessResource::getUrl('create'))->assertSuccessful();
});

test('User can create guess', function () {

    $this->actingAs($this->userUser);

    BetEvent::factory(1)->create(['created_by' => Auth::id()]);

    Livewire::test(GuessResource\Pages\CreateGuess::class)
        ->fillForm([
            'guess' => 'test',
            'bet_event_id' => 1,
            'created_by' => Auth::id(),
            'value' => '2,00',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Guess::class, [
        'guess' => 'test',
        'bet_event_id' => 1,
        'created_by' => Auth::id(),
        'value' => '2,00',
    ]);
});

test('User can render guess edit page', function () {

    $this->actingAs($this->userUser);
    BetEvent::factory(1)->create(['created_by' => Auth::id()]);

    $guess = Guess::create([
        'bet_event_id' => 1,
        'created_by' => Auth::id(),
        'guess' => 'test',
    ]);

    $this->get(GuessResource::getUrl('edit', ['record' => $guess]))->assertSuccessful();
});

test('User can edit guess', function () {

    $this->actingAs($this->userUser);

    BetEvent::factory(1)->create(['created_by' => Auth::id()]);

    $guess = Guess::create([
        'bet_event_id' => 1,
        'created_by' => Auth::id(),
        'guess' => 'test',
    ]);

    Livewire::test(GuessResource\Pages\EditGuess::class, [
        'record' => $guess->getRouteKey(),
    ])
        ->assertFormSet([
            'guess' => $guess->guess,
            'created_by' => $guess->created_by,
            'bet_event_id' => $guess->bet_event_id,
        ]);
});

test('User can not guess edit', function () {

    $this->actingAs($this->userUser);
    BetEvent::factory(1)->create(['created_by' => Auth::id()]);

    $guess = Guess::create([
        'bet_event_id' => 1,
        'created_by' => 1,
        'guess' => 'test',
    ]);

    $this->get(GuessResource::getUrl('edit', ['record' => $guess]))->assertStatus(403);
});
