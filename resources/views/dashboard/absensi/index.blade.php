@extends('dashboard/layouts/template')
@section('container')
  <h1>ini adalah absensi</h1>


  {{-- list kelas --}}
  <select class="form-select form-select mb-3">
    <option selected>Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  
  {{-- list murid --}}
  <div class="table-responsive">
    <table class="table">
      <thead class="table-white table-striped-columns">
        <tr>
          <th scope="col text-cente">#</th>
          <th scope="col">Nama</th>
          <th colspan="4" scope="col" class="text-center">Absen</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="hadir" id="hadir" value="hadir">  
              <label class="form-check-label" for="hadir">Hadir</label>
            </div>
          </td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sakit" id="sakit" value="sakit">  
              <label class="form-check-label" for="sakit">Sakit</label>
            </div>
          </td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="izin" id="izin" value="izin">  
              <label class="form-check-label" for="izin">Izin</label>
            </div>
          </td>
          <td>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="alpha" id="alpha" value="alpha">  
              <label class="form-check-label" for="alpha">Alpha</label>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection