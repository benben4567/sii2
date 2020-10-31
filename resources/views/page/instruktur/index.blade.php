@extends('layouts.app')
@section('title', 'Instruktur')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Master Data Instruktur</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Instruktur
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
                <a onclick="addForm()" href="{{ route('admin.instruktur.create')}}" class="btn btn-primary text-white">Tambah Instruktur</a>
                <a onclick="importForm()" class="btn btn-info text-white"><i class="fas fa-file-excel"></i> Import Exel</a>
                <a class="btn btn-info text-white" data-toggle="modal" data-target="#modalJudul"><i class="fas fa-search"></i> Berdasarkan Judul</a>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="#" id="form-instruktur" target="votar">
                {{ csrf_field() }}
                <table  class="table table-bordered" id="table-instruktur" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama instruktur</th>
                      <th>Tipe instruktur</th>
                      <th>Jabatan</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>

                </table>
              </form>
            </div>
          </div>
        </div> <!-- end col -->
      </div> <!-- end row -->
    </div><!-- end page content-->
  </div> <!-- container-fluid -->
</div> <!-- content -->

@include('page.instruktur.form')
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('#table-instruktur').DataTable({
      "responsive" : true,
      "pageLength" : 10,
      "deferRender": true,
      "lengthChange": false,
      "processing" : true,
      "serverside" : true,
      "ajax":{
        "url" : "/instruktur/getdata",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nip', name: 'nip'},
            {data: 'nama_instruktur', name: 'nama_instruktur'},
            {data: 'tipe_instruktur', name: 'tipe_instruktur'},
            {data: 'jabatan_peserta', name: 'jabatan_peserta'},
            {data: 'email', name: 'email'},
      ],
      "columnDefs": [{
        "targets" : 6,
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
      }]
    });

    $('#table-instruktur tbody').on( 'click', '.btn-show', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        showData(data);
    } );

    $('#modal-import .dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Hapus',
        'error':   'Ooops, something wrong happended.'
      }
    });

    $('#modal-instruktur form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_instruktur').val();
        if (save_method == "add")
        url = "#";
        else url = "instruktur/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : $('#modal-instruktur form').serialize(),
          dataType : 'JSON',
          success : function(data){
            if (save_method == "add"){
              toastr.success('Data Berhasil di Simpan!', 'Success Alert', {timeOut: 4000});
            }else{
              toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
            }
            $('#modal-instruktur').modal('hide');
            table.ajax.reload( null, false );
          },
          error : function(){
            toastr.error('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 4000});
          }
        });
        return false;
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
  function addForm(){
    save_method = "add";
    $('input[name = _method]').val('POST');
    $('#modal-instruktur').modal('show');
    $('#modal-instruktur form')[0].reset();
    $('.modal-title').text('Tambah instruktur');
  }

  function importForm(){
    $('input[name = _method]').val('POST');
    $('#modal-import').modal('show');
    $('.modal-title').text('Import Data Instruktur');
  }

  function editForm(id){
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-instruktur form')[0].reset();
    $.ajax({
      url: 'instruktur/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      success : function(data){
        $('#modal-instruktur').modal('show');
        $('.modal-title').text('Edit instruktur');

        $('#id_instruktur').val(data.data.id_instruktur);
        $('#kode').val(data.data.kode_instruktur).attr('readonly',true);
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
          url: 'instruktur/' + id,
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

  function showData(data){
    $.each(data, function (index, value) {
      $("#"+index+"_show").val(value);
    });
    $('#show-data').modal('toggle');
  }

  $('#select-all').click(function(){
    $('input[type="checkbox"]').prop('checked', this.checked);
  });

</script>
@endsection


@endsection
