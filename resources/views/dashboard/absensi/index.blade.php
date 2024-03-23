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

  <form action="/absensi" method="post">
    @csrf
    <div class="mb-3 mt-3 d-flex justify-content-between align-items-center">
      <h1>Halaman Absensi</h1>
    </div>
    <input type="hidden" value="{{ auth()->user()->nis }}" name="guru">

    <div class="row">

      <div class="col-md-6 mb-3">
        <select class="form-select" name="mata_pelajaran" required>
          <option value="mapel" disabled selected>Mata Pelajaran</option>
          @foreach ($mapel as $m)
          <option value="{{ $m->id }}">{{ $m->nama }}</option>
          @endforeach
        </select>
      </div>
      
      <div class="col-md-6 mb-3">
        <select class="form-select" id="kelas-select" name="kelas" required>
          <option value="kelas" disabled selected>Kelas</option>
          @foreach ($kelas as $k)
          <option value="{{ $k->id }}">{{ $k->nama }}</option>
          @endforeach
        </select>
      </div>
      
    </div>

    {{-- list murid --}}
    <div class="table-responsive-md mb-3">
      <table class="table table-bordered table-hover table-bongkar">
        <thead style="--bs-table-bg: #ECB159;">
          <tr>
            <th scope="col" rowspan="2" class="text-center">#</th>
            <th scope="col" rowspan="2" class="text-center">Nama</th>
            <th colspan="4" scope="col" class="text-center">Absen</th>
          </tr>
          <tr style="font-size: 0.85rem">
            <th scope="col" class="text-center">
              <input class="form-check-input check-all" type="checkbox" id="hadir-all">
              <label class="form-check-label" for="hadir-all">
                Hadir semua
              </label>
            </th>
            <th scope="col" class="text-center">
              <input class="form-check-input check-all" type="checkbox" id="sakit-all">
              <label class="form-check-label" for="sakit-all">
                Sakit semua
              </label>
            </th>
            <th scope="col" class="text-center">
              <input class="form-check-input check-all" type="checkbox" id="izin-all">
              <label class="form-check-label" for="izin-all">
                Izin semua
              </label>
            </th>
            <th scope="col" class="text-center">
              <input class="form-check-input check-all" type="checkbox" id="alpha-all">
              <label class="form-check-label" for="alpha-all">
                Alpha semua
              </label>
            </th>
          </tr>
        </thead>
        <tbody id="absen-table">  
        </tbody>
      </table>
    </div>

    <div class="mb-3 d-flex justify-content-end">
      <button class="btn btn-primary px-5 py-2 fs-5">Kirim</button>
    </div>
    
  </form>

  <script>
  $(document).ready(function() {
    $(".check-all").change(function() {
      $(".check-all").prop('checked', false);
      $(this).prop('checked', true);
    });

    $('#kelas-select').change(function() {
      $(".check-all").change(function() {
        let idName = $(this).attr('id').slice(0, -4);
        let radio = $("input[type='radio'][value='" + idName + "']").prop('checked', true);
        $("input[type='radio']").change(function(){
          $(".check-all").prop('checked', false);
        })
      });
    })
  });
  </script>



  @endsection
