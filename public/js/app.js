// $(document).ready(function() {
//   // $.ajaxSetup({
//   //   headers: {
//   //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   //   }
//   // });
//   $('#mapel-select, #kelas-select').on('change', function() {
//     const mapelId = $('#mapel-select').val();
//     const kelasId = $('#kelas-select').val();
//     console.log(mapelId);
//     console.log(kelasId);

//     $.ajax({
//       url: '/fetch-absen-data',
//       type: 'POST',
//       data: {
//         mapel_id: mapelId,
//         kelas_id: kelasId,
//         _token: '{!! csrf_token() !!}'
//       },
//       success: function(response) {
//         $('#absen-table').html(response);
//       }
//     });
//   });
// });


$(document).ready(function() {
  $('#kelas-select').on('change', function(){
    let kode = $(this).val();
    if(kode){
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
    } else {

    }
  });
  $('#mapel-select').on('change', function(){
    let kode = $(this).val();
    console.log(kode); 
    if(kode){
      $.ajax({
        url: '/data-absen/' + kode,
        type: 'POST',
        data: {
          '_token': $('meta[name="csrf-token"]').attr('content'),
          'kode': kode
        },
        dataType: 'html',
        success: function(response){
          $('#data-absen').html(response);
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    } else {

    }
  });
});