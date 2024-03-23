@extends('dashboard/layouts/template')
@section('container')

  <h1 class="mt-5">Daftar Mapel</h1>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

{{-- add --}}
  <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#mapel">
    <i class="fa-solid fa-plus"></i> Tambah Mata Pelajaran
  </button>
  
  
  {{-- search bar --}}
  <div class="row">
    <div class="col-md-6">
      <form class="input-group mb-3" action="/daftar-mapel">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari mapel" name="search" value="{{ request('search') }}">
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
                <th scope="col">Mata Pelajaran</th>
                <th scope="col" class="column-hapus">Guru</th>
                <th scope="col">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mapel as $m)
                <tr class="fs-5">
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $m->nama }}</td>
                  <td class="column-hapus">
                    @foreach ($m->gurus as $index => $guru)
                      <a href="/daftar-guru/{{ $guru->id }}">{{ $guru->nama }}</a>
                      @if (!$loop->last && $index !== count($m->gurus) - 1)
                        |
                      @endif
                    @endforeach
                  </td>
                  <td>
                    <a href="/daftar-mapel/{{ $m->id }}/edit" class="text-decoration-none btn btn-warning fs-6">
                      <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <form action="/daftar-mapel/{{ $m->id }}" method="post" class="d-inline">
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
        $("#mapel").modal('show');
    });
  </script>
  @endif
<div class="modal fade @if($errors->any()) show @endif" id="mapel" tabindex="-1" aria-labelledby="mapelLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <form class="modal-content" method="post" action="/daftar-mapel">
      @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mata Pelajaran</h1>
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
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah Mata Pelajaran</button>
      </div>
    </form>
  </div>
</div>

<div class="d-flex justify-content-center">
  {{ $mapel->links() }}
</div>
@endsection