$(document).ready(function() {

  // AbsenController
  $('#kelas-select').on('change', function(){
    let kode = $(this).val();
    $.ajax({
      url: '/absen-siswa/' + kode,
      type: 'POST',
      data: {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'kode': kode
      },
      dataType: 'html',
      success: function(response){
        $('#absen-table').html(response);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });

  
  // Tanggl buat dari dashboard.absensi.detail
  $('#tanggal-select').on('change', function(){
    let tanggal = $(this).val();
    let kelas = $('[name="id_kelas"]').val();
    $.ajax({
      url: '/tanggal-select',
      type: 'POST',
      data: {
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'kode': tanggal,
        'kelas': kelas,
      },
      dataType: 'html',
      success: function(response){
        $('#place-mapel').html(response);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    })
  })
});