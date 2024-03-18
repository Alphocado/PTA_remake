@extends('dashboard/layouts/template')
@section('container')


  <h1 class="mt-5">Daftar Kelas</h1>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

  {{-- add --}}
  <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#kelas">
    Tambah Kelas
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
                <th scope="col">Kelas</th>
                <th scope="col">Wali Kelas</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($kelas as $k)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->wali_kelas->nama }}</td>
                <td>
                  <a href="/daftar-kelas/{{ $k->id }}/edit" class="text-decoration-none badge text-bg-warning">Edit</a>
                  <form action="/daftar-kelas/{{ $k->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge text-bg-danger border-0" onclick="return confir('Yakin?')">Hapus</button>
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
        $("#kelas").modal('show');
    });
  </script>
  @endif
<div class="modal fade @if($errors->any()) show @endif" id="kelas" tabindex="-1" aria-labelledby="kelasLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <form class="modal-content" method="post" action="/daftar-kelas">
      @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kelas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-floating mb-3">
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ old('nama') }}" required>
          <label for="nama">Nama Kelas</label>
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        
        <div class="mb-3">
          <select class="form-select @error('id_wali_kelas') is-invalid @enderror" id="single-select-clear-field" data-placeholder="Pilih Wali Kelas" name="id_wali_kelas" required>
            <option value="wali" disabled {{ old('id_wali_kelas') ? '' : 'selected' }}>Pilih Wali Kelas</option>
            @foreach ($guru as $g)
                <option value="{{ $g->id }}" {{ old('id_wali_kelas') == $g->nama ? 'selected' : '' }}>{{ $g->nama }}</option>
            @endforeach
          </select>
        
          @error('id_wali_kelas')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah Kelas</button>
      </div>
    </form>
  </div>
</div>

@endsection