@extends('layouts.app')
@section('title', 'Pengalaman Magang')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman Magang</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Pengalaman Magang
            </li>
          </ol>

        </div>
      </div>
    </div>
    <!-- end row -->

      <div class="page-content-wrapper">
        <div class="row">
          <div class="col-12">
            <div class="card m-b-20">
              <div class="card-header">
                <div class="float-left">
                  <a onclick="addForm()" class="btn btn-primary text-white">Tambah Magang</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-rep-plugin">
                  <div class="table-responsive b-0" data-pattern="priority-columns">
                    <table class="table table-bordered nowrap table-magang" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tempat Magang</th>
                          <th>Tema Magang</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
                          <th>File</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Tempat Magang</th>
                          <th>Tema Magang</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
                          <th>File</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div>
      <!-- end page content-->
  </div> <!-- content -->
</div> <!-- content -->

@include('page.pengalaman.magang.form')
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('.table-magang').DataTable({
      "pageLength" : 10,
      "deferRender": true,
      "lengthChange": false,
      "processing" : true,
      "serverside" : true,
      "ajax":{
        "url" : "pengalaman-magang/getdata",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tempat_magang', name: 'tempat_magang'},
            {data: 'tema_magang', name: 'tema_magang'},
            {data: 'tgl_mulai', name: 'tgl_mulai'},
            {data: 'tgl_selesai', name: 'tgl_selesai'},
            {data: 'nama_file', name: 'nama_file'}
      ],
      "columnDefs": [
        {
          "targets" : 5,
          "className": 'text-center',
          "data" : 'nama_file',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/file_magang/${data}"><i class="fas fa-download"></i></a>` ;
          }
        },
        {
        "targets" : 6,
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
      }
      ]
    });

    $('#modal-magang .dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Hapus',
        'error':   'Ooops, something wrong happended.'
      }
    });

    $('.table-magang tbody').on( 'click', '.btn-show', function () {
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

    $('table.table-magang td#btnEdit').on('submit',function(){
      return false;
    });

    $('#modal-magang form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_magang').val();
        if (save_method == "add")
        url = "#";
        else url = "magang/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : new FormData($(".form")[0]),
          dataType : 'JSON',
          async: false,
          processData: false,
          contentType:false,
          success : function(data){
            if (save_method == "add"){
              if (data.status=="errorTime") {
                toastr.warning('Tanggal Selesai tidak boleh lebih dulu dari Tanggal Mulai!', 'Warning Alert', {timeOut: 7000});
                $('#tgl_selesai').focus().select();
              }else{
                toastr.success('Data Berhasil di Simpan!', 'Success Alert', {timeOut: 4000});
                $('#modal-magang').modal('hide');
                table.ajax.reload( null, false );
              }
            }else{
              if (data.status=="errorTime") {
                toastr.warning('Tanggal Selesai tidak boleh lebih dulu dari Tanggal Mulai!', 'Warning Alert', {timeOut: 7000});
                $('#tgl_selesai').focus().select();
              }else{
                toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
                $('#modal-magang').modal('hide');
                table.ajax.reload( null, false );
              }
            }

          },
          error : function(){
            toastr.error('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 4000});
          }
        });
        return false;
      }
    });
  });


  function addForm(){
    var drEvent = $('#modal-magang .dropify').dropify();
    save_method = "add";
    $('input[name = _method]').val('POST');
    $('#modal-magang').modal('show');
    $('#modal-magang form')[0].reset();
    $('.modal-title').text('Tambah magang');
    $('#modal-magang #nama_file').attr('required',true);
    drEvent = drEvent.data('dropify');
    drEvent.resetPreview();
    drEvent.clearElement();
  }


  function editForm(id){
    var drEvent = $('#modal-magang .dropify').dropify();
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-magang form')[0].reset();
    $('#modal-magang #nama_file').attr('required',false);
    drEvent = drEvent.data('dropify');
    drEvent.resetPreview();
    drEvent.clearElement();
    $.ajax({
      url: 'magang/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      async: false,
      processData: false,
      contentType:false,
      success : function(data){
        $('#modal-magang').modal('show');
        $('.modal-title').text('Edit magang');
        $('#id_magang').val(data.data.id_magang);
        $('#tempat_magang').val(data.data.tempat_magang);
        $('#tema_magang').val(data.data.tema_magang);
        $('#tgl_mulai').val(data.data.tgl_mulai);
        $('#tgl_selesai').val(data.data.tgl_selesai);



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
          url: 'magang/' + id,
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
