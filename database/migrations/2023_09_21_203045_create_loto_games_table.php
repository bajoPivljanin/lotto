<?php

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
        Schema::create('lotto_games', function (Blueprint $table) {
            $table->id();
            $table->string('numbers');
            $table->unsignedBigInteger('award_fund')->nullable();
            $table->boolean('jackpot')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loto_games');
    }
};
