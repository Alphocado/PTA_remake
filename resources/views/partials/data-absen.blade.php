@foreach ($absen as $b)

<tr>
  <th scope="row">{{ $loop->iteration }}</th>
  <td>{{ $b->siswa_nama->nama }}</td>
  <td>
    <div class="form-check form-check-inline d-flex justify-content-center align-items-center gap-2">
      <input class="form-check-input hadir" type="radio" name="absen-{{ $b->siswa_nama->id }}" id="hadir-{{ $b->siswa_nama->nis }}" value="hadir" {{ $b->absen == 'hadir' ? 'checked' : '' }} disabled>  
      <label class="form-check-label" for="hadir-{{ $b->siswa_nama->nis }}">Hadir</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline d-flex justify-content-center align-items-center gap-2">
      <input class="form-check-input sakit" type="radio" name="absen-{{ $b->siswa_nama->id }}" id="sakit-{{ $b->siswa_nama->nis }}" value="sakit" {{ $b->absen == 'sakit' ? 'checked' : '' }} disabled>  
      <label class="form-check-label" for="sakit-{{ $b->siswa_nama->nis }}">Sakit</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline d-flex justify-content-center align-items-center gap-2">
      <input class="form-check-input izin" type="radio" name="absen-{{ $b->siswa_nama->id }}" id="izin-{{ $b->siswa_nama->nis }}" value="izin" {{ $b->absen == 'izin' ? 'checked' : '' }} disabled>  
      <label class="form-check-label" for="izin-{{ $b->siswa_nama->nis }}">Izin</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline d-flex justify-content-center align-items-center gap-2">
      <input class="form-check-input alpha" type="radio" name="absen-{{ $b->siswa_nama->id }}" id="alpha-{{ $b->siswa_nama->nis }}" value="alpha" {{ $b->absen == 'alpha' ? 'checked' : '' }} disabled>  
      <label class="form-check-label" for="alpha-{{ $b->siswa_nama->nis }}">Alpha</label>
    </div>
  </td>
</tr>


@endforeach