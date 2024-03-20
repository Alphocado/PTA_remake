<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
  use HasFactory;
  protected $table = 'guru';
  protected $guarded = ['id'];


  public function scopeFilter($query, array $filters)
  {
    $query->when($filters['search'] ?? false, function ($query, $search) {
      $searchTerm = $search;
      return $query->where(function ($query) use ($searchTerm) {
        $query->where('guru.nama', 'like', '%' . $searchTerm . '%')
          ->orWhere('guru.nis', 'like', '%' . $searchTerm . '%')
          ->orWhere('mapel.nama', 'like', '%' . $searchTerm . '%');
      });
    });
  }


  public function mapel()
  {
    return $this->belongsTo(Mapel::class, 'mata_pelajaran')->select('nama');
  }
}
