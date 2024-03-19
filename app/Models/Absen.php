<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
  use HasFactory;
  protected $table = 'absen';
  protected $guarded = ['id'];

  public function siswa_nama()
  {
    return $this->belongsTo(Siswa::class, 'siswa');
  }
}
