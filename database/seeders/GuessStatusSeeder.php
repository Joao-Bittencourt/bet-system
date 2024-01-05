<?php

namespace Database\Seeders;

use App\Models\GuessStatus;
use Illuminate\Database\Seeder;

class GuessStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuessStatus::insert([
            ['status' => 'created'],
            ['status' => 'in_process'],
            ['status' => 'invalid'],
            ['status' => 'paid'],

        ]);
    }
}
