@extends('dashboard/layouts/template')
@section('container')

  <h1 class="mt-5">Edit Profil Siswa</h1>
  
<div class="card mb-3">
  <form class="row g-0" action="/daftar-siswa/{{ $siswa->nis }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    
    <div class="col-md-3 d-flex justify-content-center align-items-center">
      {{-- image --}}
      <div class="d-flex justify-content-center flex-column">
        <div class="d-flex justify-content-center">
          <input type="hidden" name="oldImage" value="{{ $siswa->image }}">
          @if($siswa->image)
            <img src="{{ asset('storage/'.$siswa->image) }}" class="img-preview img-fluid" width="250px">
          @else
            <img src="{{ asset('profile/profile.png') }}" class="img-preview img-fluid" width="250px">
          @endif 
        </div>
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
                <input type="text" value="{{ old('nama', $siswa->nama) }}" placeholder="Nama Baru" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                @error('mata_pelajaran')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>

          {{-- kelas --}}
          <li class="list-group-item">
            <div class="row">
              <div class="col-2">
                <label for="mapel" class="col-form-label fw-bold">Kelas: </label>
              </div>
              <div class="col-10">
                <select class="form-select @error('kelas') is-invalid @enderror" name="kelas" required>
                  <option value="kelas" disabled {{ old('kelas') ? '' : 'selected' }}>Kelas</option>
                  @foreach ($kelas as $k)
                  <option value="{{ $k->id }}" {{ old('kelas', $siswa->kelas) == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                  @endforeach
                </select>
                @error('kelas')
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
                  <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="laki" value="laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki-laki' ? 'checked' : '' }}>
                  <label class="form-check-label" for="laki">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan' ? 'checked' : '' }}>
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
                  <option value="islam" {{ old('agama', $siswa->agama) == 'islam' ? 'selected' : '' }}>Islam</option>
                  <option value="kristen" {{ old('agama', $siswa->agama) == 'kristen' ? 'selected' : '' }}>Kristen</option>
                  <option value="katolik" {{ old('agama', $siswa->agama) == 'katolik' ? 'selected' : '' }}>Katolik</option>
                  <option value="buddha" {{ old('agama', $siswa->agama) == 'buddha' ? 'selected' : '' }}>Buddha</option>
                  <option value="hindu" {{ old('agama', $siswa->agama) == 'hindu' ? 'selected' : '' }}>Hindu</option>
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
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ old('alamat', $siswa->alamat) }}" required>
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
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $siswa->tgl_lahir) }}" required>
                @error('tgl_lahir')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </li>
        </ul>
        <a href="/daftar-siswa" class="btn btn-secondary">Kembali</a>
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