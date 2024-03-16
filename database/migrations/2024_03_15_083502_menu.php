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
    Schema::create('menu', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('logo');
      $table->integer('role');
      $table->timestamps();
    });

    Schema::create('sub_menu', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->integer('role');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    //
  }
};
