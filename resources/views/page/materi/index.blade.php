@extends('layouts.app')
@section('title', 'Materi')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Master Data Materi</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Materi
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
                  <a onclick="addForm()" href="{{ route('admin.materi.create')}}" class="btn btn-primary text-white"> Tambah Materi</i> </a>
                  <a onclick="importForm()" class="btn btn-info text-white"><i class="fas fa-file-excel"></i> Import Exel</a>
                  @if (session('status'))
                    <div class="alert alert-success" style="margin-top: 10px; margin-bottom: -5px">
                      {{session('status')}}
                    </div>
                  @endif
                </div>
              </div>
              <div class="card-body">
                <form method="post" action="#" id="form-materi" target="votar">
                  @csrf
                  <table  class="table table-bordered materi-table" id="materi-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Materi</th>
                        <th>Jenis Materi</th>
                        <th>Materi</th>
                        <th>Durasi</th>
                        <th>Nilai Minimum</th>
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

@include('page.materi.form')
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('#materi-table').DataTable({
      "responsive" : true,
      "pageLength" : 25,
      "deferRender": true,
      "lengthChange": false,
      "processing" : true,
      "serverside" : true,
      "ajax":{
        "url" : "{{ route('admin.materi.getdata') }}",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kode_materi', name: 'kode_materi'},
            {data: 'jenis_materi', name: 'jenis_materi'},
            {data: 'materi', name: 'materi'},
            {data: 'durasi', name: 'durasi'},
            {data: 'nilai_minimum', name: 'nilai_minimum'},
      ],
      "columnDefs": [{
        "targets" : 6,
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
      }]
    });

    $('#materi-table tbody').on( 'click', '.btn-show', function () {
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

    $('#modal-import form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        url = "";
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
    $('.modal-title').text('Import Data Materi');
  }
  function editForm(id){
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-materi form')[0].reset();
    $.ajax({
      url: 'materi/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      success : function(data){
        $('#modal-materi').modal('show');
        $('.modal-title').text('Edit materi');

        $('#id_materi').val(data.data.id_materi);
        $('#kode').val(data.data.kode_materi).attr('readonly',true);
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
          url: 'materi/' + id + '/delete',
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

</script>
@endsection


@endsection
