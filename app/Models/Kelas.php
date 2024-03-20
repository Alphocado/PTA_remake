<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
  use HasFactory;
  protected $table = 'kelas';
  protected $guarded = ['id'];

  public function scopeFilter($query, array $filters)
  {
    $query->when($filters['search'] ?? false, function ($query, $search) {
      $searchTerm = $search;
      return $query->where(function ($query) use ($searchTerm) {
        $query->where('nama', 'like', '%' . $searchTerm . '%')
          ->orWhereHas('wali_kelas', function ($query) use ($searchTerm) {
            $query->where('nama', 'like', '%' . $searchTerm . '%');
          });
      });
    });
  }

  public function wali_kelas()
  {
    return $this->belongsTo(Guru::class, 'id_wali_kelas');
  }
}
