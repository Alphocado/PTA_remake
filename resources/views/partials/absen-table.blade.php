
@foreach ($siswa as $s)
<tr>
  <th scope="row">{{ $loop->iteration }}</th>
  <td>{{ $s->nama }}</td>
  <td>
    <div class="form-check form-check-inline d-flex justify-content-center align-items-center gap-2">
      <input class="form-check-input hadir" type="radio" name="absen-{{ $s->id }}" id="hadir-{{ $s->nis }}" value="hadir" required>  
      <label class="form-check-label" for="hadir-{{ $s->nis }}">Hadir</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline d-flex justify-content-center align-items-center gap-2">
      <input class="form-check-input sakit" type="radio" name="absen-{{ $s->id }}" id="sakit-{{ $s->nis }}" value="sakit" required>  
      <label class="form-check-label" for="sakit-{{ $s->nis }}">Sakit</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline d-flex justify-content-center align-items-center gap-2">
      <input class="form-check-input izin" type="radio" name="absen-{{ $s->id }}" id="izin-{{ $s->nis }}" value="izin" required>  
      <label class="form-check-label" for="izin-{{ $s->nis }}">Izin</label>
    </div>
  </td>
  <td>
    <div class="form-check form-check-inline d-flex justify-content-center align-items-center gap-2">
      <input class="form-check-input alpha" type="radio" name="absen-{{ $s->id }}" id="alpha-{{ $s->nis }}" value="alpha" required>  
      <label class="form-check-label" for="alpha-{{ $s->nis }}">Alpha</label>
    </div>
  </td>
</tr>

@endforeach
