<?php

use App\Filament\Resources\BetEventResource;
use App\Models\BetEvent;
use Illuminate\Support\Facades\Auth;

test('Admin can render guess index page', function () {
    $betEvent = BetEvent::factory(10)->create(['created_by' => Auth::id()]);
    $this->get(BetEventResource::getUrl('index'))->assertSuccessful();
});

test('Admin can render guess create page', function () {
    $this->get(BetEventResource::getUrl('create'))->assertSuccessful();
});

test('Admin can render guess edit page', function () {

    $betEvent = BetEvent::factory()->create(['created_by' => Auth::id()]);

    $this->get(BetEventResource::getUrl('edit', ['record' => $betEvent]))->assertSuccessful();
});

test('User can not render bet event index page', function () {

    $this->actingAs($this->userUser);

    BetEvent::factory()->create();

    $this->get(BetEventResource::getUrl('index'))->assertStatus(403);
});

test('User can not render bet event create page', function () {

    $this->actingAs($this->userUser);

    BetEvent::factory()->create();

    $this->get(BetEventResource::getUrl('index'))->assertStatus(403);
});

test('User can not render bet event edit page', function () {

    $this->actingAs($this->userUser);

    $betEvent = BetEvent::factory()->create();

    $this->get(BetEventResource::getUrl('edit', ['record' => $betEvent]))->assertStatus(403);
});
