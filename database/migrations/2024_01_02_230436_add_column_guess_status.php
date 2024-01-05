<?php

use App\Models\GuessStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('guesses', function (Blueprint $table) {
            $table->foreignIdFor(GuessStatus::class)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guesses', function (Blueprint $table) {
            $table->dropForeignIdFor(GuessStatus::class);
        });
    }
};
