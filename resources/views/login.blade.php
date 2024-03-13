@extends('layouts/template')
@section('container')
<div class="login-body">
  <div class="container d-flex justify-content-center align-items-center">
    <form class="p-4 rounded-3" method="post" action="">
      @csrf
      <h1 class="text-center">Selamat Datang</h1>
      <hr>
      <div class="form-floating mb-4">
        <input type="text" class="form-control" id="nis" placeholder="NIS" name="nis">
        <label for="nis">NIS</label>
      </div>
      <div class="form-floating mb-4">
        <input type="password" class="form-control" id="password" placeholder="Password" name="nis">
        <label for="password">Kata Sandi</label>
      </div>
      <div class="mb-3 col-12 d-flex">
        <button type="submit" class="btn btn-lg btn-primary w-100 btn-login-custome">Masuk</button>
      </div>
    </form>
  </div>
</div>
@endsection