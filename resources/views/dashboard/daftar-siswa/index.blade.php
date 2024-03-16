@extends('dashboard/layouts/template')
@section('container')
  <h1>ini adalah siswa crud</h1>


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
                <td class="d-flex gap-3">
                  <a href="#" class="text-decoration-none badge text-bg-primary">Detail</a>
                  <a href="#" class="text-decoration-none badge text-bg-warning">Edit</a>
                  <a href="#" class="text-decoration-none badge text-bg-danger">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
  
      </div>
    </div>
  </div>
@endsection