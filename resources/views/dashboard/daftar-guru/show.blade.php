@extends('dashboard/layouts/template')
@section('container')
<h1 class="my-4">Deskripsi guru</h1>
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-3 d-flex justify-content-center align-items-center">
      @if($guru->image)
        <img src="{{ asset('storage/'.$guru->image) }}" class="img-preview img-fluid" width="200px">
      @else
        <img src="{{ asset('profile/profile.png') }}" class="img-preview img-fluid" width="200px">
      @endif 
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h1 class="card-title mb-3">{{ $guru->nama }}</h1>
        <ul class="list-group list-group-flush mb-3">
          <li class="list-group-item">
            <strong>NIS:</strong> {{ $guru->nis }}
          </li>
          <li class="list-group-item">
            <strong>Mata Pelajaran:</strong> {{ $guru->mapel->nama }}
          </li>
          <li class="list-group-item">
            <strong>Jenis Kelamin:</strong> {{ $guru->jenis_kelamin }}
          </li>
          <li class="list-group-item">
            <strong>Agama:</strong> {{ $guru->agama }}
          </li>
          <li class="list-group-item">
            <strong>Alamat:</strong> {{ $guru->alamat }}
          </li>
        </ul>
        <a href="/daftar-guru" class="btn btn-secondary">Kembali</a>
        <a href="/daftar-guru/{{ $guru->nis }}/edit" class="btn btn-primary">Edit Profile</a>
      </div>
    </div>
  </div>
</div>
@endsection