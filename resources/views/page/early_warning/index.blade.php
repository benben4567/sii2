@extends('layouts.app')
@section('title', 'Early Warning')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Early Warning</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Early Warning
            </li>
          </ol>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="page-content-wrapper">

      <div class="page-content-wrapper">
        <div class="row">
          <div class="col-12">
            <div class="card m-b-20">
              <div class="card-body">
                <form method="post" action="#" id="form-warning" target="votar">
                  @csrf
                  <table  class="table table-bordered table-materi" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Nama Instruktur</th>
                        <th>Aspek</th>
                        <th>Informasi Pendukung</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- <?php $i=0; ?>
                      @foreach($warnings as $warning)
                      @php
                        $detailReviewKurikulum = DB::select("SELECT COUNT(id) as jumlah_kurikulum FROM kurikulums WHERE id = :id GROUP BY id HAVING jumlah_kurikulum >= 1", ['id' => $warning->kurikulum['id']]);
                      //   dd($detailReviewKurikulum);
              
                        $detailReviewSilabus = DB::select("SELECT COUNT(id) as jumlah_silabus FROM silabus WHERE id = :id GROUP BY id HAVING jumlah_silabus >= 1", ['id' => $warning->silabus['id']]);
              
                        $detailReviewHandout = DB::select("SELECT COUNT(id) as jumlah_handout FROM handouts WHERE id = :id GROUP BY id HAVING jumlah_handout >= 1", ['id' => $warning->handout['id']]);
              
                        $detailReviewMateriTayang = DB::select("SELECT COUNT(id) as jumlah_materitayang FROM materitayangs WHERE id = :id GROUP BY id HAVING jumlah_materitayang >= 1", ['id' => $warning->materitayang['id']]);
                        
                        $detailReviewPetunjukInstruktur = DB::select("SELECT COUNT(id) as jumlah_petunjukinstruktur FROM petunjukinstrukturs WHERE id = :id GROUP BY id HAVING jumlah_petunjukinstruktur >= 1", ['id' => $warning->petunjukinstruktur['id']]);
              
                        $detailReviewPetunjukPen = DB::select("SELECT COUNT(id) as jumlah_petunjukpenyelenggara FROM petunjukpenyelenggara WHERE id = :id GROUP BY id HAVING jumlah_petunjukpenyelenggara >= 1", ['id' => $warning->petunjukpenyelenggara['id']]);
              
                        $detailReviewToolseval = DB::select("SELECT COUNT(id) as jumlah_toolsevaluasi FROM toolsevaluasi WHERE id = :id GROUP BY id HAVING jumlah_toolsevaluasi >= 1", ['id' => $warning->toolsevaluasi['id']]);
              
                        $detailReviewPetunjukPrak = DB::select("SELECT COUNT(id) as jumlah_petunjuk_praktik FROM petunjukpraktik WHERE id = :id GROUP BY id HAVING jumlah_petunjuk_praktik >= 1", ['id' => $warning->petunjuk_praktik['id']]);
                      @endphp
                      @endforeach --}}
                    </tbody>

                  </table>
                </form>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->

{{-- @include('page.early_warning.modal-show-review') --}}
@section('js')
<script type="text/javascript">
var table;
$(function(){
  table = $('.table-materi').DataTable({
      "responsive" : true,
      "pageLength" : 10,
      "deferRender": true,
      "lengthChange": false,
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "warning/getdata",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_judul', name: 'nama_judul'},
            {data: 'nama', name: 'nama'},
            {data: 'aspek', name: 'aspek'},
            {data: 'informasi_pendukung', name: 'tipe_instruktur'}
      ],
      "columnDefs": [
        {
        "targets" : 5,
        "data" : '',
        "defaultContent": `<button type="button" class="btn btn-sm btn-show btn-info"><i class="fas fa-eye"></i></button>`
        }
      ]
    });
})

$('#table-materi tbody').on( 'click', '.btn-show', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        showData(data);
    } );

    function showData(data){
      $.each(data, function (index, value) {
        $("#"+index+"_show").val(value);
      });
      $('#show-data').modal('toggle');
    }

$(".swal-confirm").click(function(e) {
  id = e.target.dataset.id;
  swal({
      title: "Apakah anda yakin?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
  })
  .then((willDelete) => {
    if (willDelete){
      swal('Warning sudah di hapus!');
      $(`#delete${id}`).submit();
    } else{
      swal("Warning gagal dihapus!");
    }
  });

});

$('#table-warning tbody td').on( 'click', '#kurikulumShow', function () {
        $('#review-kurikulum').modal('show')
});

$('#table-warning tbody td').on( 'click', '#silabusShow', function () {
        $('#review-silabus').modal('show')
    });

$('#table-warning tbody td').on( 'click', '#handoutShow', function () {
	$('#review-handout').modal('show')
});

$('#table-warning tbody td').on( 'click', '#materiTayangShow', function () {
	$('#review-materitayang').modal('show')
});

$('#table-warning tbody td').on( 'click', '#jukInsShow', function () {
	$('#review-materitayang').modal('show')
});

$('#table-warning tbody td').on( 'click', '#jukPenShow', function () {
	$('#review-jukpen').modal('show')
});

$('#table-warning tbody td').on( 'click', '#toolsEvalShow', function () {
	$('#review-toolseval').modal('show')
});

$('#table-warning tbody td').on( 'click', '#jukPrakShow', function () {
	$('#review-jukprak').modal('show')
});


// function deleteData(id){
//     swal({
//       title: "Apakah anda yakin?",
//       text: "data yang terhapus tidak bisa dikembalikan!",
//       type: "warning",
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: "Yes, delete it!",
//       closeOnConfirm: false
//     })

//     .then((willDelete) => {
//       if (willDelete) {
//         $.ajax({
//           url: 'warning/' + id,
//           type: 'DELETE',
//           data: {
//             '_token': $('input[name=_token]').val(),
//           },
//           success: function(data){
//             swal("Done!", "Data Berhasil di hapus!", "success");
//             toastr.success('Data Berhasil di hapus!', 'Success Alert', {timeOut: 4000});
//             table.ajax.reload();
//           },
//           error : function(data){
//             swal("Data gagal di hapus!", "Please try again", "error");
//             toastr.warning('Tidak dapat menghapus data!', 'Error Alert', {timeOut: 3000});
//             dd($id);
//           }
//         });
//       }
//     });
// }

</script>
@endsection
@endsection
