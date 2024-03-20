<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  use HasFactory;
  protected $table = 'siswa';
  protected $guarded = ['id'];

  public function nama_kelas()
  {
    return $this->belongsTo(Kelas::class, 'kelas');
  }

  public function scopeFilter($query, array $filters)
  {
    $query->when($filters['search'] ?? false, function ($query, $search) {
      $searchTerm = $search;
      return $query->where(function ($query) use ($searchTerm) {
        $query->where('siswa.nama', 'like', '%' . $searchTerm . '%')
          ->orWhere('siswa.nis', 'like', '%' . $searchTerm . '%')
          ->orWhere('kelas.nama', 'like', '%' . $searchTerm . '%');
      });
    });
  }
}
