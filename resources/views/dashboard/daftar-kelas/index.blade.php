@extends('dashboard/layouts/template')
@section('container')


  <h1 class="mt-5">Daftar Kelas</h1>


  {{-- add --}}
  <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#kelas">
    <i class="fa-solid fa-plus"></i> Tambah Kelas
  </button>
  
  
  {{-- search bar --}}
  <div class="row">
    <div class="col-md-6">
      <form class="input-group mb-3" action="/daftar-kelas">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari kelas" name="search" value="{{ request('search') }}">
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
                <th scope="col">Kelas</th>
                <th scope="col" class="column-hapus">Wali Kelas</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kelas as $k)
              <tr class="fs-5">
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $k->nama }}</td>
                <td class="column-hapus">{{ $k->wali_kelas->nama }}</td>
                <td>
                  <a href="/daftar-kelas/{{ $k->id }}/edit" class="text-decoration-none btn btn-warning fs-6">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </a>
                  
                  <form action="/daftar-kelas/{{ $k->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="border-0 text-decoration-none btn btn-danger fs-6" onclick="return confir('Yakin?')">
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

<div class="d-flex justify-content-center">
  {{ $kelas->links() }}
</div>

@endsection