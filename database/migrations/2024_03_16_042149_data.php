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
    Schema::create('mapel', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->timestamps();
    });

    Schema::create('guru', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->unsignedBigInteger('mata_pelajaran');
      $table->foreign('mata_pelajaran')->references('id')->on('mapel')->onDelete('cascade'); // Change 'mata_pelajaran' to 'mapel'
      $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
      $table->enum('agama', ['islam', 'kristen', 'katolik', 'buddah', 'hindu']);
      $table->string('alamat');
      $table->date('tgl_lahir');
    });

    Schema::create('kelas', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->unsignedBigInteger('id_wali_kelas');
      $table->foreign('id_wali_kelas')->references('id')->on('guru')->onDelete('cascade');
      $table->timestamps();
    });

    Schema::create('siswa', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->unsignedBigInteger('kelas');
      $table->foreign('kelas')->references('id')->on('kelas')->onDelete('cascade');
      $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
      $table->enum('agama', ['islam', 'kristen', 'katolik', 'buddah', 'hindu']);
      $table->string('alamat');
      $table->date('tgl_lahir');
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
