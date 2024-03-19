<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
  use HasFactory;
  protected $table = 'mapel';
  protected $guarded = ['id'];

  public function gurus()
  {
    return $this->hasMany(Guru::class, 'mata_pelajaran', 'id');
  }
}
