@extends('dashboard/layouts/template')
@section('container')
  <h1 class="my-3">Semua Data Siswa</h1>


  <div class="row">
    <div class="col-md-6">
      <form class="input-group mb-3" action="/siswa">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari siswa" name="search" value="{{ request('search') }}">
          <button class="input-group-text" type="submit" id="basic-addon2">Cari</button>
        </div>
      </form>
    </div>
  </div>
  
  
  {{-- list murid --}}
  <div class="table-responsive-md">
    <table class="table">
      <thead class="table-secondary table-striped-columns">
        <tr>
          <th scope="col text-cente">#</th>
          <th scope="col">Nama</th>
          <th scope="col">NIS</th>
          <th scope="col">Kelas</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($siswa as $s)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $s->nama }}</td>
          <td>{{ $s->nis }}</td>
          <td>{{ $s->nama_kelas->nama }}</td>
          <td><a href="/siswa/{{ $s->id }}" class="text-decoration-none badge text-bg-primary">Detail</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


<div class="d-flex justify-content-center">
  {{ $siswa->links() }}
</div>

@endsection