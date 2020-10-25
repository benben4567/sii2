@extends('layouts.app')
@section('title', 'Penyusun')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Master Data Penyusun</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Penyusun
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
                  <a onclick="addForm()" href="{{ route('admin.penyusun.create')}}" class="btn btn-primary text-white">Tambah Penyusun</a>
                  <a onclick="importForm()" class="btn btn-info text-white"><i class="fas fa-file-excel"></i> Import Exel</a>
                  <a class="btn btn-info text-white" data-toggle="modal" data-target="#modalJudul"><i class="fas fa-search"></i> Cari Berdasarkan Judul</a>
                </div>
              </div>
              <div class="card-body">
                <form method="post" action="#" id="form-penyusun" target="votar">
                  {{ csrf_field() }}
                  <table  class="table table-bordered table-responsive nowrap table-penyusun" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th width="20"><input type="checkbox" id="select-all" value="1" ></th>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Penyusun</th>
                        <th>Tipe Penyusun</th>
                        <th>Udiklat</th>
                        <th>Jabatan</th>
                        <th>Grade</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Cabang Profesi</th>
                        <th>No Handphone</th>
                        <th>Email</th>
                        <th>Unit Induk</th>
                        <th>Pendidikan</th>
                        <th>No KTP</th>
                        <th>No NPWP</th>
                        <th>Level Penyusun</th>
                        <th>Bank</th>
                        <th>No Rekening</th>
                        <th>Nama Rekening</th>
                        <th>Status</th>
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
      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->

@include('page.penyusun.form')
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('.table-penyusun').DataTable({
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "#",
        "type" : "GET"
      },
    });

    $('#modal-import .dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Hapus',
        'error':   'Ooops, something wrong happended.'
      }
    });

    $('#modal-penyusun form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_penyusun').val();
        if (save_method == "add")
        url = "#";
        else url = "penyusun/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : $('#modal-penyusun form').serialize(),
          dataType : 'JSON',
          success : function(data){
            if (save_method == "add"){
              toastr.success('Data Berhasil di Simpan!', 'Success Alert', {timeOut: 4000});
            }else{
              toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
            }
            $('#modal-penyusun').modal('hide');
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
    $('#modal-penyusun').modal('show');
    $('#modal-penyusun form')[0].reset();
    $('.modal-title').text('Tambah Penyusun');
  }

  function importForm(){
    $('input[name = _method]').val('POST');
    $('#modal-import').modal('show');
    $('.modal-title').text('Import Data Penyusun');
  }

  function editForm(id){
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-penyusun form')[0].reset();
    $.ajax({
      url: 'penyusun/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      success : function(data){
        $('#modal-penyusun').modal('show');
        $('.modal-title').text('Edit Penyusun');

        $('#id_penyusun').val(data.data.id_penyusun);
        $('#kode').val(data.data.kode_penyusun).attr('readonly',true);
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
          url: 'penyusun/' + id,
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
