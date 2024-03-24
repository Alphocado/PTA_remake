@extends('dashboard/layouts/template')
@section('container')

<h1>Raport Absen</h1>
<h2>Kelas: {{ $kelas->nama }}</h2>
<a href="/raport-absen" class="btn btn-secondary fs-5 px-4">Kembali</a>

<div class="table-responsive-md mb-3 mt-3">
  <table class="table table-bordered table-hover table-bongkar">

    <thead style="--bs-table-bg: #ECB159;">
      <tr>
        <th scope="col" rowspan="2" class="text-center">#</th>
        <th scope="col" rowspan="2" class="text-center">Nama</th>
        <th colspan="4" scope="col" class="text-center">Absen</th>
      </tr>
      <tr style="font-size: 0.85rem">
        <th scope="col" class="text-center">
          Total Hadir
        </th>
        <th scope="col" class="text-center">
          Total Sakit
        </th>
        <th scope="col" class="text-center">
          Total Izin
        </th>
        <th scope="col" class="text-center">
          Total Alpha
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($absen as $a)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $a->siswa_nama->nama }}</td>
        <td>{{ $a->hadir_count }}</td>
        <td>{{ $a->sakit_count }}</td>
        <td>{{ $a->izin_count }}</td>
        <td>{{ $a->alpha_count }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection