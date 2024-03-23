@extends('dashboard/layouts/template')
@section('container')
  <h1 class="my-3">Semua Data Siswa</h1>


  <div class="row">
    <div class="col-md-6">
      <form class="input-group mb-3" action="/siswa">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari siswa" name="search" value="{{ request('search') }}">
          <button class="input-group-text bg-primary text-white px-4" type="submit" id="basic-addon2">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
  
  
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
          <td>
            <a href="/siswa/{{ $s->id }}" class="text-decoration-none btn btn-primary btn-sm fs-5">
              <i class="fa-regular fa-circle-info"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


<div class="d-flex justify-content-center">
  {{ $siswa->links() }}
</div>

@endsection