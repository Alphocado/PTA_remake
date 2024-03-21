@extends('dashboard/layouts/template')
@section('container')
  <h1 class="my-4">Halaman Dashboard</h1>
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset('img/profile.png') }}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ auth()->user()->name }}</h5>
          <p class="card-text">{{ auth()->user()->nis }}</p>
          <p class="card-text"><small class="text-body-secondary">Hi {{ auth()->user()->name }}</small></p>
        </div>
      </div>
    </div>
  </div>
@endsection