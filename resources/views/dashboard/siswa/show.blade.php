
@extends('dashboard/layouts/template')
@section('container')
<h1 class="my-4">Deskripsi siswa</h1>
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0 d-flex align-items-center">
    <div class="col-md-4">
      <img src="{{ asset('img/profile.png') }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $siswa->nama }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $siswa->nama_kelas->nama }}</h6>
        <p class="card-text">Jenis Kelamin : {{ $siswa->jenis_kelamin }}</p>
        <p class="card-text">Agama : {{ $siswa->agama }}</p>
        <p class="card-text">Alamat : {{ $siswa->alamat }}</p>
        <p class="card-text">Tanggal Lahir : {{ $siswa->tgl_lahir }}</p>
        <a href="/siswa" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection