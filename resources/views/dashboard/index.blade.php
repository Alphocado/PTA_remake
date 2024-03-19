@extends('dashboard/layouts/template')
@section('container')
  <h1>Halo {{ auth()->user()->name }}</h1>
  <div class="row">
    <div class="col-2">
      <img src="{{ asset('img/profile.png') }}" class="img-thumbnail">
    </div>
    <div class="col-4">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ auth()->user()->name }}</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary">{{ auth()->user()->nis }}</h6>
          <p class="card-text">Deskripsi</p>
        </div>
      </div>

    </div>
  </div>
@endsection