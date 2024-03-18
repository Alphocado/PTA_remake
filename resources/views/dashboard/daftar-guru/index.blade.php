@extends('dashboard/layouts/template')
@section('container')

  <h1 class="mt-5">ini adalah guru crud</h1>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

{{-- add --}}
  <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#guru">
    Tambah Guru
  </button>
  
  
  {{-- search bar --}}
  <div class="row">
    <div class="col-6">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari data" >
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">Cari</span>
        </div>
      </div>
    </div>
    <div class="row">
      
      <div class="col">
  
        {{-- list murid --}}
        <div class="table-responsive-md">
          <table class="table">
            <thead class="table-white table-striped-columns">
              <tr>
                <th scope="col text-cente">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Jenis kelamin</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($guru as $g)
              <?php 
              $mapelItem = $mapel->firstWhere('id', $g->mata_pelajaran)
              ?>
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $g->nama }}</td>
                  <td>{{ $g->mapel->nama }}</td>
                  <td>{{ $g->jenis_kelamin }}</td>
                  <td>
                    <a href="/daftar-guru/{{ $g->id }}" class="text-decoration-none badge text-bg-primary">Detail</a>
                    <a href="/daftar-guru/{{ $g->id }}/edit" class="text-decoration-none badge text-bg-warning">Edit</a>
                    <form action="/daftar-guru/{{ $g->id }}" class="d-inline" method="post">
                      @method('delete')
                      @csrf
                      <button class="border-0 text-decoration-none badge text-bg-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  
      </div>
    </div>
  </div>



  <!-- Modal -->
  
<div class="modal fade @if($errors->any()) show @endif" id="guru" tabindex="-1" aria-labelledby="guruLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <form class="modal-content" method="post" action="/daftar-guru">
      @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data guru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}" required>
          <label for="nama">Nama</label>
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <select class="form-select @error('mata_pelajaran') is-invalid @enderror" name="mata_pelajaran" required>
            <option value="mapel" disabled {{ old('mapel') ? '' : 'selected' }}>Mata Pelajaran</option>
            @foreach ($mapel as $m)
            <option value="{{ $m->id }}" {{ old('mapel') == $m->nama ? 'selected' : '' }}>{{ $m->nama }}</option>
            @endforeach
          </select>
          @error('mapel')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="form-floating mb-3">
          <div class="form-check form-check-inline">
            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="laki" value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' }}>
            <label class="form-check-label" for="laki">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }}>
            <label class="form-check-label" for="perempuan">Perempuan </label>
          </div>
          @error('jenis_kelamin')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <select class="form-select @error('agama') is-invalid @enderror" name="agama" required>
            <option value="" disabled {{ old('agama') ? '' : 'selected' }}>Agama</option>
            <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam</option>
            <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : '' }}>Kristen</option>
            <option value="katolik" {{ old('agama') == 'katolik' ? 'selected' : '' }}>Katolik</option>
            <option value="buddha" {{ old('agama') == 'buddha' ? 'selected' : '' }}>Buddha</option>
            <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu</option>
          </select>
          @error('agama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}" required>
          <label for="alamat">Alamat</label>
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-floating mb-3">
          <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
          <label for="tgl_lahir">Tanggal Lahir</label>
          @error('tgl_lahir')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah guru</button>
      </div>
    </form>
  </div>
</div>

@if($errors->any())
<script>
  $(document).ready(function(){
      $("#guru").modal('show');
  });
</script>
@endif
@endsection