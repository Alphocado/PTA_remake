@extends('dashboard/layouts/template')
@section('container')
  <h1>Halo {{ $user->name }}</h1>
  <div class="row">
    <div class="col-2">
      <img src="{{ asset('img/profile.png') }}" class="img-thumbnail">
    </div>
    <div class="col-4">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $user->name }}</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary">{{ $user->nis }}</h6>
          <p class="card-text">Deskripsi</p>
          <a href="/daftar-user" class="btn btn-secondary">Kembali</a>
        </div>
      </div>

    </div>
  </div>
@endsection