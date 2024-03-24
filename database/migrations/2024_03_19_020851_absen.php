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
    Schema::create('absen', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('siswa');
      $table->foreign('siswa')->references('id')->on('siswa')->onDelete('cascade');
      $table->string('guru');
      $table->foreign('guru')->references('nis')->on('guru')->onDelete('cascade');
      $table->unsignedBigInteger('kelas');
      $table->foreign('kelas')->references('id')->on('kelas')->onDelete('cascade');
      $table->unsignedBigInteger('mata_pelajaran');
      $table->foreign('mata_pelajaran')->references('id')->on('mapel')->onDelete('cascade');
      $table->enum('absen', ['hadir', 'sakit', 'izin', 'alpha']);
      $table->date('tgl_buat');
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
