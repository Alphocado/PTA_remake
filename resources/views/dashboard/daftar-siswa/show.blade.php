@extends('dashboard/layouts/template')
@section('container')
<h1 class="my-4">Deskripsi siswa</h1>

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-3 d-flex justify-content-center align-items-center">
      @if($siswa->image)
        <img src="{{ asset('storage/'.$siswa->image) }}" class="img-preview img-fluid" width="200px">
      @else
        <img src="{{ asset('profile/profile.png') }}" class="img-preview img-fluid" width="200px">
      @endif 
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h1 class="card-title mb-3">{{ $siswa->nama }}</h1>
        <ul class="list-group list-group-flush mb-3">
          <li class="list-group-item">
            <strong>NIS:</strong> {{ $siswa->nis }}
          </li>
          <li class="list-group-item">
            <strong>Kelas:</strong> {{ $siswa->nama_kelas->nama }}
          </li>
          <li class="list-group-item">
            <strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}
          </li>
          <li class="list-group-item">
            <strong>Agama:</strong> {{ $siswa->agama }}
          </li>
          <li class="list-group-item">
            <strong>Alamat:</strong> {{ $siswa->alamat }}
          </li>
          <li class="list-group-item">
            <strong>Tanggal Lahir:</strong> {{ $siswa->tgl_lahir }}
          </li>
        </ul>
        <a href="/daftar-siswa" class="btn btn-secondary">Kembali</a>
        <a href="/daftar-siswa/{{ $siswa->nis }}/edit" class="btn btn-primary">Edit Profile</a>
      </div>
    </div>
  </div>
</div>

@endsection