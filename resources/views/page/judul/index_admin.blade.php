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
              <div class="card-header">
                <div class="float-left">
                  <a onclick="addForm()" href="{{ route('admin.judul.create')}}" class="btn btn-primary text-white"> Tambah Judul</a>
                  <a onclick="importForm()" class="btn btn-info text-white"><i class="fas fa-file-excel"></i> Import Exel</a>
                </div>
              </div>

              <div class="card-body">
                  {{ csrf_field() }}
                  <table  class="table table-bordered table-responsive nowrap" id="table-judul" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                      <tr>
                        {{-- <th width="20"><input type="checkbox" id="select-all" value="1" ></th> --}}
                        <th>No</th>
                        <th>Warning</th>
                        <th>Nama Judul</th>
                        <th>Jenis Diklat</th>
                        <th>Sifat Diklat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Modal -->
                      @if(session('status'))
                        <div class="alert alert-success">
                        {{session('status')}}
                      </div>
                      @endif


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

@include('page.judul.show-warning')
@include('page.judul.form')

@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('#table-judul').DataTable({
      "pageLength" : 25,
      "deferRender": true,
      "lengthChange": false,
      "processing" : true,
      "serverside" : true,
      "ajax":{
        "url" : "judul/getdata",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
      ],
      "columnDefs": [
        {
          "targets" : 1,
          "className": "text-center",
          "data" : "warnings",
          "render": function (data, type, row, meta ) {
            if(data.length >= 2) {
              return `<button type="button" class="btn btn-sm btn-danger"><i class="fas fa-exclamation-triangle"></i></button>`
            } else {
              return `<button type="button" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>`
            }
          }
        },
        {
          "targets" : 2,
          "data" : "nama_judul",
          "render": function (data, type, row, meta ) {
            return data
          }
        },
        {
          "targets" : 3,
          "data" : "jenisdiklat.jenis_diklat",
          "render": function (data, type, row, meta ) {
            return data;
          }
        },
        {
          "targets" : 4,
          "data" : "sifatdiklat.sifat_diklat",
          "render": function (data, type, row, meta ) {
            return data;
          }
        },
        {
          "targets" : 5,
          "data" : null,
          "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
        },

      ]
    });

    $('#table-judul tbody').on( 'click', '.btn-show', function () {
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


  // $('.table-judul tbody').on( 'click', '.detailWarning', function () {
  //   let id = $(this).data('id')
  //       $('.warningShow').val(id)
  //   $.ajax({
  //     url: 'warning/'+id+'/detail',
  //     type: "GET",
  //     dataType: "JSON",
  //     success: function(data){
  //         $('#show-warning').modal("show");
  //         $('.show-title').text('Detail Warning');
  //       },

  //       error: function(){
  //         alert("not working properly");
  //       }
  //     });

  //   });

  // $('.table-judul tbody').on( 'click', '.detailWarning', function () {
  //       let id = $(this).data('id')
  //       let warning = $(this).data('warning')
  //       let user = $(this).data('user')
  //       let aspek = $(this).data('aspek')
  //       let info = $(this).data('info')
  //       $('.warningShow').text(id)
  //       $('.judulShow').text(warning)
  //       $('.userShow').text(user)
  //       $('.aspekShow').text(aspek)
  //       $('.infoShow').text(info)
  //       $('#show-warning').modal('show')
  //   });

    function showWarning(id){
      $.ajax({
        url : '/warning/' + id + '/detail',
        type : "GET",
        dataType : "JSON",
        success:function(data){
          for(var i = 0; i<data.length; ++i){
            row = data[i];
            //masukin seluruh isi tabel
            $('#my-table').append(
              $('<tr class="empty"></tr>').append(
                $('<td class="empty"></td>').html(i+1),
                $('<td class="empty"></td>').html(row.judul.nama_judul),
                $('<td class="empty"></td>').html(row.user.username),
                $('<td class="empty"></td>').html(row.aspek),
                $('<td class="empty"></td>').html(row.informasi_pendukung),
                )
                );
              }
              $('.show-title').text('Detail Warning');
              $('#show-warning').modal('show');
        },
        error : function(){
          alert('Not working properly!');
        }
      });
    }

    $(".close").click(function(){
      $(".empty").empty();
    });
    // function showWarning(id){
    //   $.ajax({
    //     url : '/warning/' + id + '/detail',
    //     type : "GET",
    //     dataType : "JSON",
    //     success:function(data){
    //       $('.warningShow').text(data.id_warning);
    //       $('.judulShow').text(data.id_judul);
    //       $('.userShow').text(data.user_id);
    //       $('.aspekShow').text(data.aspek);
    //       $('.infoShow').text(data.informasi_pendukung);
    //       $('.show-title').text('Detail Warning');
    //       $('#show-warning').modal('show');
    //     }
    //     },
    //     error : function(){
    //       alert('Not working properly!');
    //     }
    //   });
    // }


    $('#modal-import .dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Hapus',
        'error':   'Ooops, something wrong happended.'
      }
    });

    $('#modal-import form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        url = "#";
        swal({
          title: "Import Data",
          text: "Silakan Tunggu...",
          imageUrl: "{{asset('assets/images/200.gif')}}",
          showConfirmButton: false,
          allowOutsideClick: false,
        });
        $.ajax({
          url : url,
          type : "POST",
          data : new FormData(this),
          dataType : 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          async: true,
          success : function(data){
            if(data.status == "failed"){
              swal("Gagal!", "Opss, terjadi kesalahan!", "error");
              $('#modal-import').modal('hide');
              console.log(data.data);
              toastr.error('Tidak dapat mengimport data!', 'Error Alert', {timeOut: 4000});
            }else{
              swal("Done!", "Data Berhasil di Import!", "success");
              $('#modal-import').modal('hide');
              table.ajax.reload( null, false );
            }
          },
          error : function(){
            swal("Gagal!", "Opss, terjadi kesalahan!", "error");
            // console.log(data.data);
            $('#modal-import').modal('hide');
            toastr.error('Tidak dapat mengimport data!', 'Error Alert', {timeOut: 4000});
          }
        });
        return false;
      }
    });
  });

  function importForm(){
    $('input[name = _method]').val('POST');
    $('#modal-import').modal('show');
    $('.modal-title').text('Import Data Judul');
  }

  function editForm(id){
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-judul form')[0].reset();
    $.ajax({
      url: 'judul/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      success : function(data){
        $('#modal-judul').modal('show');
        $('.modal-title').text('Edit judul');

        $('#id_judul').val(data.data.id_judul);
        $('#kode').val(data.data.kode_judul).attr('readonly',true);
        $('#nama').val(data.data.nama);
        $('#alamat').val(data.data.alamat);
        $('#telpon').val(data.data.telpon);
      },
      error : function(){
        toastr.warning('Tidak dapat menampilkan data!', 'Error Alert', {timeOut: 3000});
      }
    });
  }
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
          url: 'judul/' + id,
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
