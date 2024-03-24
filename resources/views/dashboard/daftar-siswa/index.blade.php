@extends('dashboard/layouts/template')
@section('container')

  <h1 class="mt-5">Data-data siswa</h1>


{{-- add --}}
  <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#siswa">
    <i class="fa-solid fa-plus"></i> Tambah Siswa Baru
  </button>
  
  
  {{-- search bar --}}
  <div class="row">
    <div class="col-md-6">
      <form class="input-group mb-3" action="/daftar-siswa">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari siswa" name="search" value="{{ request('search') }}">
          <button class="input-group-text btn btn-primary px-4" type="submit" id="basic-addon2">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </form>
    </div>
    <div class="row">
      <div class="col">
  
        {{-- list murid --}}

        <div class="table-responsive-md mb-3">
          <table class="table table-striped table-hover table-bordered table-bongkar">
            <thead style="--bs-table-bg: #ECB159;">
              <tr class="fs-5">
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col" class="column-hapus">NIS</th>
                <th scope="col" class="column-hapus">Kelas</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($siswa as $s)
              <tr class="fs-5">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $s->nama }}</td>
                <td class="column-hapus">{{ $s->nis }}</td>
                <td class="column-hapus">{{ $s->nama_kelas->nama }}</td>
                <td class="">
                  <a href="/daftar-siswa/{{ $s->id }}" class="text-decoration-none btn btn-primary fs-6">
                    <i class="fa-regular fa-circle-info"></i>
                  </a>
                  <a href="/daftar-siswa/{{ $s->id }}/edit" class="text-decoration-none btn btn-warning fs-6">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </a>
                  <form action="/daftar-siswa/{{ $s->id }}" class="d-inline" method="post">
                    @method('delete')
                    @csrf
                    <button class="border-0 text-decoration-none btn btn-danger fs-6" onclick="return confirm('Are you sure?')">
                      <i class="fa-regular fa-trash"></i>
                    </button>
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
  
  @if($errors->any())
  <script>
    $(document).ready(function(){
        $("#siswa").modal('show');
    });
  </script>
  @endif
<div class="modal fade @if($errors->any()) show @endif" id="siswa" tabindex="-1" aria-labelledby="siswaLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <form class="modal-content" method="post" action="/daftar-siswa">
      @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data siswa</h1>
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

        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="NIS" name="nis" value="{{ old('nis') }}" required>
          <label for="nis">NIS</label>
          @error('nis')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        {{-- berdasarkan database --}}
        <div class="mb-3">
          <select class="form-select @error('kelas') is-invalid @enderror" name="kelas" required>
            <option value="kelas" disabled {{ old('kelas') ? '' : 'selected' }}>Pilih Kelas</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ old('kelas') == $k->nama ? 'selected' : '' }}>{{ $k->nama }}</option>
            @endforeach
          </select>
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
            <option value="agama" disabled {{ old('agama') ? '' : 'selected' }}>Agama</option>
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
          <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat"  value="{{ old('alamat') }}" required>
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
        <button type="submit" class="btn btn-primary">Tambah Siswa</button>
      </div>
    </form>
  </div>
</div>


<div class="d-flex justify-content-center">
  {{ $siswa->links() }}
</div>
@endsection