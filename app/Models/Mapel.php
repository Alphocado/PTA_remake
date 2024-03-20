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

  public function scopeFilter($query, array $filters)
  {
    $query->when($filters['search'] ?? false, function ($query, $search) {
      $searchTerm = $search;
      return $query->where(function ($query) use ($searchTerm) {
        $query->where('nama', 'like', '%' . $searchTerm . '%')
          ->orWhereHas('gurus', function ($query) use ($searchTerm) {
            $query->where('nama', 'like', '%' . $searchTerm . '%');
          });
      });
    });
  }
}
