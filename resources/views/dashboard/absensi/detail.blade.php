@extends('dashboard/layouts/template')

@section('container')
@if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="/data-absen" method="post">
  @csrf

  <div class="mb-3 mt-3">
    <h1>Halaman Absen yang telah dibuat</h1>
    <a href="/data-absen" class="btn btn-secondary fs-5 px-4">Kembali</a>
  </div>

  
  <input type="hidden" value="{{ auth()->user()->nis }}" name="guru">
  
  {{-- Kelas --}}
  <div class="mb-3">
    <h4>Kelas : {{ $kelas->nama }}</h4>
  </div>

  {{-- Tanggal buat --}}
  <div class="mb-3">
    <input type="hidden" value="{{ $kelas->id }}" name="kelas">
    <select class="form-select" id="tanggal-select" name="tgl_buat" required>
      <option value="tgl_buat" disabled selected>Tanggal Buat</option>
      @foreach ($tgl_buat as $tb)
      <option value="{{ $tb }}">{{ $tb }}</option>
      @endforeach
    </select>
  </div>



  {{-- Mata Pelajaran --}}
  <div class="mb-3" id="place-mapel">

  </div>

  {{-- list murid --}}
  <div class="table-responsive-md mb-3">
    <table class="table table-hover table-bongkar">
      <thead style="--bs-table-bg: #ECB159;">
        <tr>
          <th scope="col" rowspan="2" class="text-center">#</th>
          <th scope="col" rowspan="2" class="text-center">Nama</th>
          <th colspan="4" scope="col" class="text-center">Absen</th>
        </tr>
        <tr style="font-size: 0.85rem">
          <th scope="col" class="text-center">
            <input class="form-check-input check-all" type="checkbox" id="hadir-all" disabled>
            <label class="form-check-label" for="hadir-all">
              Hadir semua
            </label>
          </th>
          <th scope="col" class="text-center">
            <input class="form-check-input check-all" type="checkbox" id="sakit-all" disabled>
            <label class="form-check-label" for="sakit-all">
              Sakit semua
            </label>
          </th>
          <th scope="col" class="text-center">
            <input class="form-check-input check-all" type="checkbox" id="izin-all" disabled>
            <label class="form-check-label" for="izin-all">
              Izin semua
            </label>
          </th>
          <th scope="col" class="text-center">
            <input class="form-check-input check-all" type="checkbox" id="alpha-all" disabled>
            <label class="form-check-label" for="alpha-all">
              Alpha semua
            </label>
          </th>
        </tr>
      </thead>
      <tbody id="data-absen">  
        {{-- here --}}
      </tbody>
    </table>
    <div class="d-none" id="submit-ganti">
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Ganti</button>
      </div>
    </div>
  </div>

</form>

<script>
$(document).ready(function() {
  $('table .check-all').prop('checked', false);
  $(".check-all").change(function() {
    $(".check-all").prop('checked', false);
    $(this).prop('checked', true);
  });
  
  $('#data-absen').on('DOMSubtreeModified', function() {
    if ($(this).children().length > 0) {
      $(".check-all").change(function() {
        let idName = $(this).attr('id').slice(0, -4);
        let radio = $("input[type='radio'][value='" + idName + "']").prop('checked', true);
        $("input[type='radio']").change(function(){
          $(".check-all").prop('checked', false);
        }); 
      });
    }
  });

  $('#place-mapel').change(function() {
    $('table .check-all').prop('checked', false);
    $('#submit-ganti').addClass('d-none')
    $('table input').prop('disabled', true);
    $('#edit').click(function() {
      $('#submit-ganti').toggleClass('d-none');
      $('table input').prop('disabled', (i, v) => !v);
    })
  })

});
</script>
@endsection