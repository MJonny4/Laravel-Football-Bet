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
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('code', 8)->unique();
            $table->foreignId('owner_id')->constrained('users');
            $table->foreignId('season_id')->constrained()->cascadeOnDelete();
            $table->integer('max_members')->default(50);
            $table->boolean('private')->default(false);
            $table->string('password')->nullable();
            $table->timestamps();
            
            $table->index(['season_id', 'private']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leagues');
    }
};
