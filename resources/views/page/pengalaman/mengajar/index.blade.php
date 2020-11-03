@extends('layouts.app')
@section('title', 'Pengalaman Mengajar')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman Mengajar</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Pengalaman Mengajar
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
                  <a onclick="addForm()" class="btn btn-primary text-white">Tambah Pengalaman</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-rep-plugin">
                  <div class="table-responsive b-0" data-pattern="priority-columns">
                    <table class="table table-bordered  nowrap table-mengajar" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                      
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Materi Pembelajaran</th>
                          <th>Tempat</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      
                      <tbody>

                      </tbody>

                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Materi Pembelajaran</th>
                          <th>Tempat</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Selesai</th>
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
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->

@include('page.pengalaman.mengajar.form')
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('.table-mengajar').DataTable({
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "pengalaman-mengajar/getdata",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_judul', name: 'nama_judul'},
            {data: 'tempat_mengajar', name: 'tempat_mengajar'},
            {data: 'tgl_mulai', name: 'tgl_mulai'},
            {data: 'tgl_selesai', name: 'tgl_selesai'},
      ],
      "columnDefs": [{
        "targets" : 5,
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
      }]
    });

    $('#modal-mengajar .dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Hapus',
        'error':   'Ooops, something wrong happended.'
      }
    });

    $('#modal-mengajar form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_mengajar').val();
        if (save_method == "add")
        url = "#";
        else url = "mengajar/"+id;
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
              $('#modal-mengajar').modal('hide');
              table.ajax.reload( null, false );
              }
            }else{
              if (data.status=="errorTime") {
                toastr.warning('Tanggal Selesai tidak boleh lebih dulu dari Tanggal Mulai!', 'Warning Alert', {timeOut: 7000});
                $('#tgl_selesai').focus().select();
              }else{
              toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
              $('#modal-mengajar').modal('hide');
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

    
    $("select#materi_pembelajaran").select2({
      allowClear: true,
      width: 'resolve', // need to override the changed default
      dropdownParent: $("#modal-mengajar"),
      placeholder: 'Pilih Judul',
      minimumInputLength: 1,
      ajax: {
        url: 'pengalaman-mengajar/select2',
        dataType: 'json',
        data: function (params) {
          return {
            q: $.trim(params.term),
            id_info:$('#id_aksi').val(),
            page: params.page || 1
          };
        },
        processResults: function (data) {
          data.page = data.page || 1;
          return {
            results: data.items.map(function (item) {
              return {
                id: item.id,
                text:item.nama_judul
              };
            }),
            pagination: {
              more: data.pagination
            }
          }
        },
        cache: true
      }
    });
  });

  function addForm(){
    var drEvent = $('#modal-mengajar .dropify').dropify();
    save_method = "add";
    $('input[name = _method]').val('POST');
    $('#modal-mengajar').modal('show');
    $('#modal-mengajar form')[0].reset();
    $('.modal-title').text('Tambah mengajar');
    $('#modal-mengajar #nama_file').attr('required',true);
    drEvent = drEvent.data('dropify');
    drEvent.resetPreview();
    drEvent.clearElement();
  }

  function editForm(id){
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-mengajar form')[0].reset();
    $('#modal-mengajar #nama_file').attr('required',false);
    $.ajax({
      url: 'mengajar/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      async: false,
      processData: false,
      contentType:false,
      success : function(data){
        $('#modal-mengajar').modal('show');
        $('.modal-title').text('Edit mengajar');
        $('#id_mengajar').val(data.data.id_mengajar);
        $('#modal-mengajar #materi_pembelajaran').val(data.data.materi_pembelajaran);
        $('#modal-mengajar select#materi_pembelajaran').select2('trigger','select',{'data':{'id':data.data.id_judul,'text':data.data.judul.nama_judul}});
        $('#modal-mengajar #tempat_mengajar').val(data.data.tempat_mengajar);
        $('#modal-mengajar #tgl_mulai').val(data.data.tgl_mulai);
        $('#modal-mengajar #tgl_selesai').val(data.data.tgl_selesai);
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
          url: 'mengajar/' + id,
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
            swal("Data gagal dihapus!", "Please try again", "error");
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
