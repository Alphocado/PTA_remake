@extends('dashboard/layouts/template')
@section('container')



<h1 class="my-4">Halaman Edit</h1>
<div class="card mb-3">
  <form class="row g-0" action="/daftar-guru/{{ $guru->nis }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    
    <div class="col-md-3 d-flex justify-content-center align-items-center">
      {{-- image --}}
      <div class="d-flex justify-content-center flex-column">
        <div class="d-flex justify-content-center">
          @if($guru->image)
          <img src="{{ asset('storage/'.$guru->image) }}" class="img-preview img-fluid" width="250px">
          @else
          <img src="{{ asset('profile/profile.png') }}" class="img-preview img-fluid" width="250px">
          @endif 
        </div>
        <input type="hidden" name="oldImage" value="{{ $guru->image }}">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" width="250px">

      </div>
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <ul class="list-group list-group-flush mb-3">

          {{-- nama --}}
          <li class="list-group-item">
            <div class="row">
              <div class="col-2">
                <label for="nama" class="col-form-label fw-bold">Nama: </label>
              </div>
              <div class="col-10">
                <input type="text" value="{{ old('nama', $guru->nama) }}" placeholder="Nama Baru" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                @error('mata_pelajaran')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>

          {{-- nis --}}
          <li class="list-group-item">
            <div class="row">
              <div class="col-2">
                <label for="mapel" class="col-form-label fw-bold">Mata Pelajaran: </label>
              </div>
              <div class="col-10">
                <select class="form-select @error('mata_pelajaran') is-invalid @enderror" name="mata_pelajaran" required>
                  <option value="" disabled {{ old('mata_pelajaran') ? '' : 'selected' }}>Mata Pelajaran</option>
                  @foreach ($mapel as $m)
                  <option value="{{ $m->id }}" {{ old('mata_pelajaran', $guru->mata_pelajaran) == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
                  @endforeach
                </select>
                @error('mata_pelajaran')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>

          {{-- jenis kelamin --}}
          <li class="list-group-item">
            <div class="row">
              <div class="col-2">
                <label class="col-form-label fw-bold">Jenis Kelamin: </label>
              </div>
              <div class="col-10">
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="laki" value="laki-laki" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'laki-laki' ? 'checked' : '' }}>
                  <label class="form-check-label" for="laki">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'perempuan' ? 'checked' : '' }}>
                  <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
                @error('jenis_kelamin')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>
          
          {{-- agama --}}
          <li class="list-group-item">
            <div class="row">
              <div class="col-2">
                <label for="agama" class="col-form-label fw-bold">Agama: </label>
              </div>
              <div class="col-10">
                <select class="form-select @error('agama') is-invalid @enderror" name="agama" id="agama" required>
                  <option value="" disabled {{ old('agama') ? '' : 'selected' }}>Agama</option>
                  <option value="islam" {{ old('agama', $guru->agama) == 'islam' ? 'selected' : '' }}>Islam</option>
                  <option value="kristen" {{ old('agama', $guru->agama) == 'kristen' ? 'selected' : '' }}>Kristen</option>
                  <option value="katolik" {{ old('agama', $guru->agama) == 'katolik' ? 'selected' : '' }}>Katolik</option>
                  <option value="buddha" {{ old('agama', $guru->agama) == 'buddha' ? 'selected' : '' }}>Buddha</option>
                  <option value="hindu" {{ old('agama', $guru->agama) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                </select>
                @error('agama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>

          {{-- alamat --}}
          <li class="list-group-item">
            <div class="row">
              <div class="col-2">
                <label for="alamat" class="col-form-label fw-bold">Alamat: </label>
              </div>
              <div class="col-10">
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ old('alamat', $guru->alamat) }}" required>
                @error('alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>

          {{-- tanggal lahir --}}
          <li class="list-group-item">
            <div class="row">
              <div class="col-2">
                <label for="tgl_lahir" class="col-form-label fw-bold">Tanggal Lahir: </label>
              </div>
              <div class="col-10">
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $guru->tgl_lahir) }}" required>
                @error('tgl_lahir')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>

          <li class="list-group-item">
            <div class="row">
              <div class="col-2">
                <label for="oldpw" class="col-form-label fw-bold">Ubah Password</label>
              </div>
              <div class="col-4">
                <input type="password" id="pw" name="pw" class="form-control @error('pw') is-invalid @enderror">
                @error('oldpw')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>
        </ul>
        <a href="/daftar-guru" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Edit Profile</button>
      </div>
    </div>
  </form>
</div>

<script>
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection