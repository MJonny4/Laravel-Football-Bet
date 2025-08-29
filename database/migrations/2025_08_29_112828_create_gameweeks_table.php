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
        Schema::create('gameweeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id')->constrained()->cascadeOnDelete();
            $table->integer('number');
            $table->string('name')->nullable();
            $table->datetime('betting_deadline');
            $table->boolean('active')->default(true);
            $table->boolean('results_finalized')->default(false);
            $table->timestamps();
            
            $table->unique(['season_id', 'number']);
            $table->index(['active', 'betting_deadline']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gameweeks');
    }
};
