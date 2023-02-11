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
    Schema::create('partits', function (Blueprint $table) {
      $table->id();
      $table->foreignId('id_jornada')->constrained('jornades');
      $table->foreignId('equip_local')->constrained('equips');
      $table->foreignId('equip_visitant')->constrained('equips');
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
    Schema::dropIfExists('partits');
  }
};
