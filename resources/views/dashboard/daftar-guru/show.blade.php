@extends('dashboard/layouts/template')
@section('container')
<h1 class="my-4">Deskripsi guru</h1>
<div class="row">
  <div class="col-2">
    <img src="{{ asset('img/profile.png') }}" class="img-thumbnail">
  </div>
  <div class="col-4">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $guru->nama }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $mapel->nama }}</h6>
        <p class="card-text">Jenis Kelamin : {{ $guru->jenis_kelamin }}</p>
        <p class="card-text">Agama : {{ $guru->agama }}</p>
        <p class="card-text">Alamat : {{ $guru->alamat }}</p>
        <p class="card-text">Tanggal Lahir : {{ $guru->tgl_lahir }}</p>
        <a href="/daftar-guru" class="btn btn-secondary">Kembali</a>
      </div>
    </div>

  </div>
</div>
@endsection