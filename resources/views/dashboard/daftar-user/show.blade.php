@extends('dashboard/layouts/template')
@section('container')
  <h1 class="my-4">Akun milik {{ $user->name }}</h1>
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset('img/profile.png') }}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $user->name }}</h5>
          <p class="card-text">{{ $user->nis }}</p>
          <p class="card-text"><small class="text-body-secondary">Hi {{ auth()->user()->name }}</small></p>
          <a href="/daftar-user" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
@endsection