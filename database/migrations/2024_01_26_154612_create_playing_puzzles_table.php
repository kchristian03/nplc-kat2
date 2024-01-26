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
        Schema::create('playing_puzzles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('puzzle_id');
            $table->string('duration')->nullable();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('puzzle_id')->references('id')->on('puzzles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playing_puzzles');
    }
};
