<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('apostes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_usuari')->constrained('users');
        $table->foreignId('id_partit')->constrained('partits');
        $table->string('resultat', 1);
        $table->unique(['id_usuari', 'id_partit']);
        $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('apostes');
  }
};
