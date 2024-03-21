@extends('dashboard/layouts/template')
@section('container')

  <h1 class="mt-5">Halaman edit mata pelajaran</h1>

  <form action="/daftar-mapel/{{ $mapel->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Mapel</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $mapel->nama) }}" placeholder="masukkan nama mapel" autofocus required>
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <a href="/daftar-mapel" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection