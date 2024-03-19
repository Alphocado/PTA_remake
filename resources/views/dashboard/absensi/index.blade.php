@extends('dashboard/layouts/template')

@section('container')
  <h1>ini adalah absensi</h1>

  {{-- list kelas --}}
  <div class="mb-3">
    <select class="form-select" id="mapel-select" name="mapel" required>
      <option value="mapel" disabled selected>Mata Pelajaran</option>
      @foreach ($mapel as $m)
      <option value="{{ $m->id }}">{{ $m->nama }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <select class="form-select" id="kelas-select" name="kelas" required>
      <option value="kelas" disabled selected>Kelas</option>
      @foreach ($kelas as $k)
      <option value="{{ $k->id }}">{{ $k->nama }}</option>
      @endforeach
    </select>
  </div>

  {{-- list murid --}}
  <div id="absen-table" class="table-responsive">
    <!-- Absen table will be loaded dynamically here -->
  </div>

@endsection