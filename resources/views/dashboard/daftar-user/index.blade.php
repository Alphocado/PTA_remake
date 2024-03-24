@extends('dashboard/layouts/template')
@section('container')
  <h1 class="my-3">List User</h1>


  {{-- <form class="input-group mb-3">
    @csrf
    <input type="text" class="form-control" placeholder="Cari siswa">
    <button class="input-group-text" id="basic-addon2">Cari</button>
  </form> --}}

  {{-- <div class="mb-3">
    <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#user">
      <i class="fa-solid fa-plus"></i> Tambah Akun Moderator
    </button>
  </div> --}}
  
  
  {{-- list murid --}}
  <div class="table-responsive-md mb-3">
    <table class="table table-striped table-hover table-bordered table-bongkar">
      <thead style="--bs-table-bg: #ECB159;">
        <tr class="fs-5">
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col" class="column-hapus">NIS</th>
          <th scope="col" class="column-hapus">Email</th>
          <th scope="col" class="column-hapus">Role</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $s)
        <tr class="fs-5">
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $s->name }}</td>
          <td class="column-hapus">{{ $s->nis }}</td>
          <td class="column-hapus">{{ $s->email }}</td>
          <td class="column-hapus">{{ $s->role }}</td>
          <td>
            <a href="/daftar-user/{{ $s->id }}" class="text-decoration-none btn btn-primary fs-6">
              <i class="fa-regular fa-circle-info"></i>
            </a>
            <a href="/daftar-user/{{ $s->id }}/edit" class="text-decoration-none btn btn-warning fs-6">
              <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <form action="/daftar-user/{{ $s->id }}" class="d-inline" method="post">
              @method('delete')
              @csrf
              <input type="hidden" value="{{ $s->nis }}" name="nis">
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


  
  <div class="modal fade @if($errors->any()) show @endif" id="user" tabindex="-1" aria-labelledby="userLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
      <form class="modal-content" method="post" action="/daftar-user">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data user</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <input type="hidden" value="2" name="role">
  
          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="name" value="{{ old('nama') }}" required>
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
  
          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" name="email" value="{{ old('email') }}" required>
            <label for="email">Email</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" name="password" value="{{ old('password') }}" required>
            <label for="password">Password</label>
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah user</button>
        </div>
      </form>
    </div>
  </div>
  
  @if($errors->any())
  <script>
    $(document).ready(function(){
        $("#user").modal('show');
    });
  </script>
  @endif
@endsection