@extends('dashboard/layouts/template')
@section('container')

  <h1 class="mt-5">Halaman guru edit</h1>

  <form action="/daftar-guru/{{ $guru->id }}" method="post">
    @method('put')
    @csrf

    {{-- nama --}}
    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ old('nama', $guru->nama) }}" autofocus required>
      <label for="nama">Nama</label>
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    {{-- mata pelajaran --}}
    <div class="mb-3">
      <select class="form-select @error('mata_pelajaran') is-invalid @enderror" name="mata_pelajaran" required>
        <option value="" disabled {{ old('mata_pelajaran') ? '' : 'selected' }}>Mata Pelajaran</option>
        @foreach ($mapel as $m)
        <option value="{{ $m->id }}" {{ old('mata_pelajaran', $guru->mata_pelajaran) == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
        @endforeach
      </select>
      @error('mata_pelajaran')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    
    {{-- jenis kelamin --}}
    <div class="form-floating mb-3">
      <div class="form-check form-check-inline">
        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="laki" value="laki-laki" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'laki-laki' ? 'checked' : '' }}>
        <label class="form-check-label" for="laki">Laki-laki</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'perempuan' ? 'checked' : '' }}>
        <label class="form-check-label" for="perempuan">Perempuan</label>
      </div>
      @error('jenis_kelamin')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    {{-- agama --}}
    <div class="mb-3">
      <select class="form-select @error('agama') is-invalid @enderror" name="agama" required>
        <option value="" disabled {{ old('agama') ? '' : 'selected' }}>Agama</option>
        <option value="islam" {{ old('agama', $guru->agama) == 'islam' ? 'selected' : '' }}>Islam</option>
        <option value="kristen" {{ old('agama', $guru->agama) == 'kristen' ? 'selected' : '' }}>Kristen</option>
        <option value="katolik" {{ old('agama', $guru->agama) == 'katolik' ? 'selected' : '' }}>Katolik</option>
        <option value="buddha" {{ old('agama', $guru->agama) == 'buddha' ? 'selected' : '' }}>Buddha</option>
        <option value="hindu" {{ old('agama', $guru->agama) == 'hindu' ? 'selected' : '' }}>Hindu</option>
      </select>
      @error('agama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    
    {{-- alamat --}}
    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ old('alamat', $guru->alamat) }}" required>
      <label for="alamat">Alamat</label>
      @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    {{-- tanggal lahir --}}
    <div class="form-floating mb-3">
      <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $guru->tgl_lahir) }}" required>
      <label for="tgl_lahir">Tanggal Lahir</label>
      @error('tgl_lahir')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    
    <a href="/daftar-guru" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection