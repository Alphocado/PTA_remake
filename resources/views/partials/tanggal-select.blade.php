
<input type="hidden" value="{{ $tgl_buat }}" name="tgl_buat">
<select class="form-select" id="mapel-select" name="mata_pelajaran" required>
  <option value="mapel" disabled selected>Mata Pelajaran</option>
  @foreach ($mapel as $m)
  <option value="{{ $m->id }}">{{ $m->nama }}</option>
  @endforeach
</select>

<script>
  $('#mapel-select').on('change', function(){
    let kode = $(this).val();
    let tgl_buat = $('[name="tgl_buat"]').val();
    $.ajax({
      url: '/data-absen/' + kode,
      type: 'POST',
      data: {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'kode': kode,
        'tgl_buat': tgl_buat
      },
      dataType: 'html',
      success: function(response){
        $('#data-absen').html(response);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });
</script>