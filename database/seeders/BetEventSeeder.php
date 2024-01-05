<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BetEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BetEvent::factory()->create([
            'name' => 'Adivinhe',
        ]);
    }
}
