@extends('dashboard/layouts/template')

@section('container')
@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="/absensi" method="post">
  @csrf

  <div class="mb-3 mt-3 d-flex justify-content-between align-items-center">
    <h1>Halaman Absen yang telah dibuat</h1>
    <a href="/data-absen" class="btn btn-secondary fs-5 px-4 d-flex align-items-center">Kembali</a>
  </div>

  
  <input type="hidden" value="{{ auth()->user()->nis }}" name="guru">
  
  {{-- Kelas --}}
  <div class="mb-3">
    <h4>Kelas : {{ $kelas->nama }}</h4>
  </div>

  {{-- Tanggal buat --}}
  <div class="mb-3">
    <input type="hidden" value="{{ $kelas->id }}" name="id_kelas">
    <select class="form-select" id="tanggal-select" name="tgl_buat" required>
      <option value="tgl_buat" disabled selected>Tanggal Buat</option>
      @foreach ($tgl_buat as $tb)
      <option value="{{ $tb }}">{{ $tb }}</option>
      @endforeach
    </select>
  </div>

  {{-- Mata Pelajaran --}}
  <div class="mb-3" id="place-mapel">

  </div>

  {{-- list murid --}}
  <div class="table-responsive-md mb-3">
    <table class="table">
      <thead class="table-secondary table-striped-columns">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th colspan="4" scope="col" class="text-center">Absen</th>
        </tr>
      </thead>
      <tbody id="data-absen">  
        {{-- here --}}
      </tbody>
    </table>
  </div>x  
</form>
@endsection