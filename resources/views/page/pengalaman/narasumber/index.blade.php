@extends('layouts.app')
@section('title', 'Pengalaman Narasumber')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman Narasumber</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Pengalaman Narasumber
            </li>
          </ol>
        </div>
      </div>
    </div> <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row">
          <div class="col-12">
            <div class="card m-b-20">
              <div class="card-header">
                <div class="float-left">
                  <a href="{{ route('instruktur.narasumber.create') }}" class="btn btn-primary text-white">Tambah Pengalaman</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-rep-plugin">
                  <div class="table-responsive b-0" data-pattern="priority-columns">
                    <table class="table table-bordered  nowrap table-narasumber" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                      <thead class='text-center'>
                        <tr>
                          <th>No</th>
                          <th>Lama Pengalaman</th>
                          <th>Pendidikan Formal</th>
                          <th>Sertifikasi</th>
                          <th>File Pendidikan</th>
                          <th>File Sertifikasi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>

                      </tbody>

                      <tfoot class='text-center'>
                        <tr>
                          <th>No</th>
                          <th>Lama Pengalaman</th>
                          <th>Pendidikan Formal</th>
                          <th>Sertifikasi</th>
                          <th>File Pendidikan</th>
                          <th>File Sertifikasi</th>
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
      </div> <!-- end page content-->
  </div> <!-- container-fluid -->
</div> <!-- content -->

@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('.table-narasumber').DataTable({
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "pengalaman-narasumber/getdata",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'pengalaman_bidang', name: 'pengalaman_bidang'},
            {data: 'pendidikan_formal', name: 'pendidikan_formal'},
            {data: 'nama_judul', name: 'nama_judul'},
            {data: 'file_pendidikan_formal', name: 'file_pendidikan_formal'},
            {data: 'file_sertifikat_pembelajaran', name: 'file_sertifikat_pembelajaran'},
      ],
      "columnDefs": [{
        "targets" : 6,
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
      }]
    });


    $('form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        url = "#";
        $.ajax({
          url : url,
          type : "POST",
          data : new FormData($(".form")[0]),
          dataType : 'JSON',
          async: false,
          processData: false,
          contentType:false,
          success:function(data){
            if(data.status=="error") {
              toastr.warning('Ups, terjadi kesalahan!', 'Warning Alert', {timeOut: 7000});
              // $('#tgl_selesai').focus().select();
            }else{
              toastr.success('Data Berhasil di Simpan!', 'Success Alert', {timeOut: 4000});
            }
          }
        });
        return false;
      };
    });

    $('select#judul_id').select2({
      allowClear: true,
      placeholder: 'Search',
      minimumInputLength: 1,
      ajax: {
        url: 'pengalaman-narasumber/select2',
        dataType: 'json',
        data: function (params) {
          return {
            q: $.trim(params.term),
            page: params.page || 1
          };
        },
        processResults: function (data) {
          data.page = data.page || 1;
          return {
            results: data.items.map(function (item) {
              return {
                id: item.id,
                text: item.nama_judul
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

  $('.form-edit').validator().on('submit',function(e){
    var id = $('#idnarasumber').val();
    if(!e.isDefaultPrevented()){
      $.ajax({
        url : "narasumber/"+id+"/change",
        type : "POST",
        data : new FormData($(".form-edit")[0]),
        dataType : 'JSON',
        async: false,
        processData: false,
        contentType:false,
        success : function(data){
            d = new Date();
            toastr.success('Perubahan berhasil disimpan!', 'Success Alert', {timeOut: 7000});
            $('#filesertifikasi' ).attr('href',data.urlsertifikasi+'?'+d.getTime());
            $('#filependidikanformal' ).attr('href',data.urlpedidikanformal+'?'+d.getTime());
            $('#filependidikanformalinput').val("");
            $('#filesertifikasiinput').val("");
            $('#filependidikanformalinput').text(""+'?'+d.getTime());
            $('#filesertifikasiinput').text(""+'?'+d.getTime());
            // console.log(data.url);
        },
        error : function(){
          toastr.warning('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 3000});
        }
      });
      return false;
    }
  });

  function kembali(){
    $('.wizardku').hide();
    $('.showdataku').show();
    getData();
     return false;
  }
  function getData(){
    $('input[name = _method]').val('PATCH');
    $.ajax({
      url: 'narasumber/getData',
      type: "GET",
      dataType: "JSON",
      success : function(data){
        // console.log(data.data);
        $('#lama_pengalaman').val(data.data.pengalaman_bidang);
        $('#pendidikan_terakhir').val(data.data.pendidikan_formal);
          $('select#sertifikasi').select2('trigger','select',{'data':{'id':data.data.judul_sertifikat_pembelajaran,'text':data.judul.nama_judul}});
        $('#idnarasumber').val(data.data.id);
        $('#filependidikanformal').attr('href','{{asset('assets/file/narasumber/file_ijazah')}}/'+data.data.file_pendidikan_formal);
        $('#filesertifikasi').attr('href','{{asset('assets/file/narasumber/file_sertifikat_pembelajaran')}}/'+data.data.file_sertifikat_pembelajaran);
        toastr.success('Berhasil menampilkan data!', 'Success Alert', {timeOut: 3000});
      },
      error : function(){
        toastr.warning('Tidak dapat menampilkan data!', 'Error Alert', {timeOut: 3000});
      }
    });
  }

</script>
@endsection


@endsection
