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
        Schema::create('puzzles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('pos_code');
            $table->integer('score_won');
            $table->integer('score_lost');
            $table->integer('score_mid');
            $table->string('code_won');
            $table->string('code_lost');
            $table->string('code_mid');
            $table->integer('entry_coin');
            $table->integer('entry_exp');
            $table->boolean('forfitable')->default(false);
            $table->integer('max_team');
            $table->integer('time');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puzzles');
    }
};
