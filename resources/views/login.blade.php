@extends('layouts/template')
@section('container')
<div class="login-body">
  <div class="container d-flex justify-content-center align-items-center">

    
    <form class="p-4 rounded-3" method="post" action="/login">
      @csrf
      <h1 class="text-center">Selamat Datang</h1>
      <hr>
      <div class="form-floating mb-4">
        <input  type="text" 
                class="form-control @error('nis') is-invalid @enderror" 
                id="nis" 
                placeholder="NIS" 
                name="nis" 
                value="{{ old('nis') }}">
        <label for="nis">NIS</label>
        @error('nis')
          <div class="invalid-feedback bg-danger text-white fw-bolder py-1 px-2 rounded-1">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-floating mb-4">
        <input  type="password" 
                class="form-control @error('password') is-invalid @enderror"
                id="password" 
                placeholder="Password" 
                name="password">
        <label for="password">Password</label>
        @error('password')
          <div class="invalid-feedback bg-danger text-white fw-bolder py-1 px-2 rounded-1">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3 col-12 d-flex">
        <button type="submit" class="btn btn-lg btn-primary w-100 btn-login-custome">Masuk</button>
      </div>
    </form>
  </div>
</div>
@endsection