@extends('layouts.app')
@section('title', 'Judul Materi')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Master Data Judul</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Judul
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
                @if(session('status'))
                  <div class="alert alert-success">
                  {{session('status')}}
                </div>

                @elseif (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                @endif
                  {{ csrf_field() }}
                  <table  class="table table-bordered table-responsive nowrap table-judul" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Warning</th>
                        <th>Add Warning</th>
                        <th>Nama Judul</th>
                        <th>Jenis Diklat</th>
                        <th>Sifat Diklat</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->
@include('page.judul.add-warning')
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    $(this)
    .find('[data-fa-i2svg]')
    .toggleClass('fa-minus-square')
    .toggleClass('fa-plus-square');

    table = $('.table-judul').DataTable({
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "/judul-instruktur/getdata",
        "type" : "GET"
      },
      
      "columns": [
        {
          "className":      'details-control',
          "orderable":      false,
          "data":           null,
          "defaultContent": '<i name="collapse" class="fas fa-plus-circle"></i>'
        }
      ],
      "columnDefs": [
        {
          "targets" : 1,
          "className": "text-center",
          "data" : "warnings",
          "render": function (data, type, row, meta ) {
            if(data.length >= 2) {
              return `<a class="btn btn-sm btn-danger" href="warning/kategori/" target="_blank"><i class="fas fa-exclamation-triangle"></i></a>`
            } else {
              return `<button type="button" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>`
            }
          }
        },
        {
        "targets" : 2,
        "className": "text-center",
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-dark\"><i class=\"far fa-paper-plane\"></i></button>"
        },
        {
          "targets" : 3,
          "data" : "nama_judul",
          "render": function (data, type, row, meta ) {
            return data
          }
        },
        {
          "targets" : 4,
          "data" : "jenisdiklat.jenis_diklat",
          "render": function (data, type, row, meta ) {
            return data;
          }
        },
        {
          "targets" : 5,
          "data" : "sifatdiklat.sifat_diklat",
          "render": function (data, type, row, meta ) {
            return data;
          }
        }
      ]
    });

    function format ( d ) {
      // `d` is the original data object for the row
      return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
              '<td>Kode Judul :</td>'+
              '<td>'+d.kode_judul+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Kode Judul Lama:</td>'+
              '<td>'+d.kode_judul_lama+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Sifat Diklat:</td>'+
              '<td>'+d.sifatdiklat.sifat_diklat+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Jenis Diklat:</td>'+
              '<td>'+d.jenisdiklat.jenis_diklat+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Penyelenggaraan:</td>'+
              '<td>'+d.penyelenggaraan.penyelenggaraan+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Penanggung Jawab:</td>'+
              '<td>'+d.penanggung_jawab.penanggung_jawab+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Jenis Sertifikat:</td>'+
              '<td>'+d.jenis_sertifikat.jenis_sertifikat+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Tahun Terbit:</td>'+
              '<td>'+d.tahun_terbit+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Durasi Hari:</td>'+
              '<td>'+d.durasi_hari+'</td>'+
          '</tr>'+
      '</table>';
    }

    // Add event listener for opening and closing details
    $('.table-judul tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.find('i[name="collapse"]').attr('class', 'fas fa-plus-circle');    // FontAwesome 5
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.find('i[name="collapse"]').attr('class', 'fas fa-minus-circle'); // FontAwesome 5
        }
    } );

    $('.table-judul tbody').on( 'click', '.btn-dark', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $('#judul_id').val(data.id)
        $('.modal-title').html(data.nama_judul)
        $('#add-warning').modal('show')
    });

  });



  // function showKategori(id){
  //     $.ajax({
  //       url : 'kategori/' + id ,
  //       type : "GET",
  //       dataType : "JSON",
  //       success:function(data){
  //       },
  //       error : function(){
  //         alert('Gagal!');
  //       }
  //     });
  //   }


  function deleteData(id){
    swal({
      title: "Apakah anda yakin?",
      text: "data yang terhapus tidak bisa dikembalikan!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: 'pembelajaran/' + id,
          type: 'DELETE',
          data: {
            '_token': $('input[name=_token]').val(),
          },
          success: function(data){
            swal("Done!", "Data Berhasil di hapus!", "success");
            toastr.success('Data Berhasil di hapus!', 'Success Alert', {timeOut: 4000});
            table.ajax.reload();
          },
          error : function(data){
            swal("Error deleting!", "Please try again", "error");
            toastr.warning('Tidak dapat menghapus data!', 'Error Alert', {timeOut: 3000});
          }
        });
      }
    });
  }

  $('#select-all').click(function(){
    $('input[type="checkbox"]').prop('checked', this.checked);
  });




</script>
@endsection


@endsection
