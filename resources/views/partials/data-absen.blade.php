@foreach ($absen as $b)

<tr>
  <th scope="row">{{ $loop->iteration }}</th>
  <td>{{ $b->siswa_nama->nama }}</td>
  <td>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="absen-{{ $b->siswa_nama->nis }}" id="hadir" value="hadir" {{ $b->absen == 'hadir' ? 'checked' : '' }} disabled>  
      <label class="form-check-label" for="hadir">Hadir</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="absen-{{ $b->siswa_nama->nis }}" id="sakit" value="sakit" {{ $b->absen == 'sakit' ? 'checked' : '' }} disabled>  
      <label class="form-check-label" for="sakit">Sakit</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="absen-{{ $b->siswa_nama->nis }}" id="izin" value="izin" {{ $b->absen == 'izin' ? 'checked' : '' }} disabled>  
      <label class="form-check-label" for="izin">Izin</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="absen-{{ $b->siswa_nama->nis }}" id="alpha" value="alpha" {{ $b->absen == 'alpha' ? 'checked' : '' }} disabled>  
      <label class="form-check-label" for="alpha">Alpha</label>
    </div>
  </td>
</tr>
@endforeach