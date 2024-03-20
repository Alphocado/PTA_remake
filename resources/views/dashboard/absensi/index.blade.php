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
    <h1>Absensi</h1>
    <a href="/data-absen" class="btn btn-secondary fs-5 px-4 d-flex align-items-center">List Absen</a>
  </div>
  <input type="hidden" value="{{ auth()->user()->nis }}" name="guru">

  <div class="row">

    <div class="col-md-6 mb-3">
      <select class="form-select" name="mata_pelajaran" required>
        <option value="mapel" disabled selected>Mata Pelajaran</option>
        @foreach ($mapel as $m)
        <option value="{{ $m->id }}">{{ $m->nama }}</option>
        @endforeach
      </select>
    </div>
    
    <div class="col-md-6 mb-3">
      <select class="form-select" id="kelas-select" name="kelas" required>
        <option value="kelas" disabled selected>Kelas</option>
        @foreach ($kelas as $k)
        <option value="{{ $k->id }}">{{ $k->nama }}</option>
        @endforeach
      </select>
    </div>
    
  </div>

  {{-- list murid --}}
  <div class="table-responsive mb-3 tabel">
    <table class="table">
      <thead class="table-white table-striped-columns">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th colspan="4" scope="col" class="text-center">Absen</th>
        </tr>
      </thead>
      <tbody class="table-group-divider" id="absen-table">  
        <tr>
          <th scope="row">0</th>
          <td></td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="absen" id="hadir" value="hadir">  
              <label class="form-check-label" for="hadir">Hadir</label>
            </div>
          </td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="absen" id="sakit" value="sakit">  
              <label class="form-check-label" for="sakit">Sakit</label>
            </div>
          </td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="absen" id="izin" value="izin">  
              <label class="form-check-label" for="izin">Izin</label>
            </div>
          </td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="absen" id="alpha" value="alpha">  
              <label class="form-check-label" for="alpha">Alpha</label>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="mb-3 d-flex justify-content-end">
    <button class="btn btn-primary px-5 py-2 fs-5">Kirim</button>
  </div>
  
</form>
@endsection