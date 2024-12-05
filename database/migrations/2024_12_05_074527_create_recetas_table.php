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
    Schema::create('recetas', function (Blueprint $table) {
      $table->id();
      $table->string('nombre');
      $table->text('descripcion');
      $table->text('ingredientes');
      $table->text('preparacion');
      $table->string('imagen');
      $table->text('mensaje_final');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('recetas');
  }
};
