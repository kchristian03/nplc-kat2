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
        Schema::create('bonus_scores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('1');
            $table->integer('2');
            $table->integer('3');
            $table->integer('4');
            $table->integer('5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonus_scores');
    }
};
