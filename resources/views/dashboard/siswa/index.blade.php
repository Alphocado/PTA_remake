@extends('dashboard/layouts/template')
@section('container')
  <h1>ini adalah siswa</h1>


  {{-- list kelas --}}
  <select class="form-select form-select mb-3">
    <option selected>Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  
  {{-- list murid --}}
  <div class="table-responsive-md">
    <table class="table">
      <thead class="table-white table-striped-columns">
        <tr>
          <th scope="col text-cente">#</th>
          <th scope="col">Nama</th>
          <th scope="col">NIS</th>
          <th scope="col">Gender</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>328746283</td>
          <td>Laki-laki</td>
          <td><a href="#" class="text-decoration-none badge text-bg-primary">Detail</a></td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection