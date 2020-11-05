@extends('layouts.app')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman Penyusun</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Pengalaman Penyusun
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
                <a href="{{ route('instruktur.penyusun.create') }}" class="btn btn-primary text-white">Tambah Pengalaman</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table class="table table-bordered  nowrap table-penyusun" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                    <thead class='text-center'>
                      <tr>
                        <th>No</th>
                        <th>Sertifikasi Pembelajaran</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Pendidikan Formal</th>
                        <th>File Sertifikasi</th>
                        <th>File Pendidikan</th>
                        <th>File Karya Tulis</th>
                        <th>File pembelajaran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>

                    </tbody>
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
@include('page.pengalaman.penyusun.edit')
  @section('js')
  <script type="text/javascript">
    var table, save_method;
    $(function(){
      table = $('.table-penyusun').DataTable({
          "processing" :true,
          "serverside" : true,
          "ajax":{
            "url" : "pengalaman-penyusun/getdata",
            "type" : "GET"
          },
          "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_judul', name: 'nama_judul'},
            {data: 'tanggal_mulai', name: 'tanggal_mulai'},
            {data: 'tanggal_selesai', name: 'tanggal_selesai'},
            {data: 'pendidikan_formal', name: 'pendidikan_formal'},
          ],
          "columnDefs": [
            {
              "targets" : 5,
              "className": 'text-center',
              "data" : 'file_sertifikat_pembelajaran',
              "render": function ( data, type, row, meta ) {
                return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="storage/file/penyusun/file_sertifikat_pembelajaran/${data}"><i class="fas fa-download"></i></a>` ;
              }
            },
            {
              "targets" : 6,
              "className": 'text-center',
              "data" : 'file_pendidikan_formal',
              "render": function ( data, type, row, meta ) {
                return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="storage/file/penyusun/file_pendidikan_formal/${data}"><i class="fas fa-download"></i></a>` ;
              }
            },
            {
              "targets" : 7,
              "className": 'text-center',
              "data" : 'file_bukti_karyatulis',
              "render": function ( data, type, row, meta ) {
                return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/penyusun/file_bukti_karyatulis/${data}"><i class="fas fa-download"></i></a>` ;
              }
            },
            {
              "targets" : 8,
              "className": 'text-center',
              "data" : 'file_penyusun',
              "render": function ( data, type, row, meta ) {
                return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/penyusun/file_penyusun/${data}"><i class="fas fa-download"></i></a>` ;
              }
            },
            {
              "targets" : 9,
              "data" : null,
              "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
            }
          ]
        });

        $('.table-penyusun tbody').on( 'click', '.btn-show', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        showData(data);
        });

        function showData(data){
          $.each(data, function (index, value) {
            $("#"+index+"_show").val(value);
          });
          $('#show-data').modal('toggle');
        }



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


      $('select#sertifikasi').select2({
        allowClear: true,
        placeholder: 'Search',
        minimumInputLength: 1,
        ajax: {
          url: '#',
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
      var id = $('#idpenyusun').val();
      if(!e.isDefaultPrevented()){
        $.ajax({
          url : "penyusun/"+id+"/change",
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
            $('#filepenyusuninput' ).attr('href',data.urlpenyusun+'?'+d.getTime());
            $('#filebuktikaryatulisinput' ).attr('href',data.urlkaryatulis+'?'+d.getTime());
            $('#filependidikanformalinput').val("");
            $('#filesertifikasiinput').val("");
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
      $('.wizardku2').hide();
      $('.showdataku').show();
      getData();
      return false;
    }
    function getData(){
      $('input[name = _method]').val('PATCH');
      $.ajax({
        url: 'penyusun/getData',
        type: "GET",
        dataType: "JSON",
        success : function(data){
          // console.log(data.data);
          $('#pendidikan_terakhir').val(data.data.pendidikan_formal);
          $('select#sertifikasi').select2('trigger','select',{'data':{'id':data.data.judul_sertifikat_pembelajaran,'text':data.judul.nama_judul}});
          $('#tgl_mulai_input').val(data.data.tanggal_mulai);
          $('#tgl_selesai_input').val(data.data.tanggal_selesai);
          $('#idpenyusun').val(data.data.id);
          $('#filepenyusun').attr('href','{{asset('assets/file/penyusun/file_penyusun')}}/'+data.data.file_penyusun);
          $('#filependidikanformal').attr('href','{{asset('assets/file/penyusun/file_ijazah')}}/'+data.data.file_pendidikan_formal);
          $('#filesertifikasi').attr('href','{{asset('assets/file/penyusun/file_sertifikat_pembelajaran')}}/'+data.data.file_sertifikat_pembelajaran);
          $('#filebuktikaryatulis').attr('href','{{asset('assets/file/penyusun/file_karya_tulis')}}/'+data.data.file_bukti_karyatulis);
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
