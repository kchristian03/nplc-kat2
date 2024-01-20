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
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('coin_won');
            $table->integer('exp_won');
            $table->integer('coin_lost');
            $table->integer('exp_lost');
            $table->integer('score_won');
            $table->integer('score_lost');
            $table->string('item_won');
            $table->integer('item_rate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos');
    }
};
