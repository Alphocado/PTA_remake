@extends('dashboard/layouts/template')
@section('container')

  <h1 class="mt-5">ini adalah kelas edit</h1>

  <form action="/daftar-kelas/{{ $kelas->id }}" method="post">
    @method('put')
    @csrf

    <div class="mb-3">
      <label for="nama" class="form-label">Nama Kales</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $kelas->nama) }}" placeholder="masukkan nama kelas" autofocus required>
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    
    <div class="mb-3">
      <select class="form-select @error('id_wali_kelas') is-invalid @enderror" id="single-select-clear-field" data-placeholder="Pilih wali kelas" name="id_wali_kelas" required>
        <option value="wali" disabled {{ old('id_wali_kelas') ? '' : 'selected' }}>Pilih Wali Kelas</option>
        @foreach ($guru as $g)
          <option value="{{ $g->id }}" {{ old('id_wali_kelas', $kelas->id_wali_kelas) == $g->id  ? 'selected' : '' }}>{{ $g->nama }}</option>
        @endforeach
      </select>
    
      @error('id_wali_kelas')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <a href="/daftar-kelas" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection