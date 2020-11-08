@extends('layouts.app')
@section('title', 'Pengalaman Jurnal Ilmiah')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman Jurnal Ilmiah</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Pengalaman Jurnal Ilmiah
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
                  <a onclick="addForm()" class="btn btn-primary text-white">Tambah Jurnal Ilmiah</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-rep-plugin">
                  <div class="table-responsive b-0" data-pattern="priority-columns">
                    <table class="table table-bordered  nowrap table-jurnal-ilmiah" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Instruktur</th>
                          <th>Judul Jurnal</th>
                          <th>Tingkatan</th>
                          <th>Lembaga Penyelenggara</th>
                          <th>Tanggal Submit</th>
                          <th>Tanggal Presentasi</th>
                          <th>File Jurnal Ilmiah</th>
                          <th>File Abstrak</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>

                      </tbody>
                      
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Nama Instruktur</th>
                          <th>Judul Jurnal</th>
                          <th>Tingkatan</th>
                          <th>Lembaga Penyelenggara</th>
                          <th>Tanggal Submit</th>
                          <th>Tanggal Presentasi</th>
                          <th>File Jurnal Ilmiah</th>
                          <th>File Abstrak</th>
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

@include('page.pengalaman.jurnalilmiah.form')

@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('.table-jurnal-ilmiah').DataTable({
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "/pengalaman-jurnalilmiah/getdata",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
            {data: 'nama_judul', name: 'nama_judul'},
            {data: 'tingkatan', name: 'tingkatan'},
            {data: 'lembaga_penyelenggara', name: 'lembaga_penyelenggara'},
            {data: 'tanggal_submit', name: 'tanggal_submit'},
            {data: 'tanggal_presentasi', name: 'tanggal_presentasi'}
      ],
      "columnDefs": [
        {
          "targets" : 7,
          "className": 'text-center',
          "data" : 'file_sertifikat',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/jurnalilmiah/${data}"><i class="fas fa-download"></i></a>` ;
          }
        },
        {
          "targets" : 8,
          "className": 'text-center',
          "data" : 'file_sertifikat',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/jurnalilmiah/abstrak/${data}"><i class="fas fa-download"></i></a>` ;
          }
        },
        {
        "targets" : 9,
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
        }
      ]

    });

    $('.table-jurnal-ilmiah tbody').on( 'click', '.btn-show', function () {
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

    $('#modal-jurnal-ilmiah .dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Hapus',
        'error':   'Ooops, something wrong happended.'
      }
    });


      $('#modal-jurnal-ilmiah form').validator().on('submit', function(e){
        if(!e.isDefaultPrevented()){
          var id = $('#id').val();
          if (save_method == "add")
          url = "#";
          else url = "jurnal-ilmiah/"+id;
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
            $('#modal-jurnal-ilmiah').modal('hide');
            table.ajax.reload( null, false );
            }
          }else{
            if (data.status=="errorTime") {
              toastr.warning('Tanggal Selesai tidak boleh lebih dulu dari Tanggal Mulai!', 'Warning Alert', {timeOut: 7000});
              $('#tgl_selesai').focus().select();
            }else{
            toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
            $('#modal-jurnal-ilmiah').modal('hide');
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


    $("select#judul").select2({
      allowClear: true,
      width: 'resolve', // need to override the changed default
      dropdownParent: $("#modal-jurnal-ilmiah"),
      placeholder: 'Pilih Judul',
      minimumInputLength: 1,
      ajax: {
        url: '/pengalaman-jurnalilmiah/select2',
        dataType: 'json',
        data: function (params) {
          return {
            q: $.trim(params.term),
            id:$('#id').val(),
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

    
    function addForm(){
      // var drEvent = $('#modal-jurnal-ilmiah .dropify').dropify();
      save_method = "add";
      $('input[name = _method]').val('POST');
      $('#modal-jurnal-ilmiah').modal('show');
      $('#modal-jurnal-ilmiah form')[0].reset();
      $('.modal-title').text('Tambah Jurnal Ilmiah');
      $('#modal-jurnal-ilmiah #id').val('').trigger('change');
      $('#modal-jurnal-ilmiah #id').attr('required',true);
      // $('#modal-jurnal-ilmiah #nama_file').attr('required',true);
      // drEvent = drEvent.data('dropify');
      // drEvent.resetPreview();
      // drEvent.clearElement();
    }

      function editForm(id){
        // var drEvent = $('#modal-jurnal-ilmiah .dropify').dropify();
        save_method = "edit";
        $('input[name = _method]').val('PATCH');
        $('#modal-jurnal-ilmiah form')[0].reset();
        $('#modal-jurnal-ilmiah #judul').val('').trigger('change');
        $('#modal-jurnal-ilmiah #judul').attr('required',false);
        // $('#modal-jurnal-ilmiah #nama_file').attr('required',false);
        // drEvent = drEvent.data('dropify');
        // drEvent.resetPreview();
        // drEvent.clearElement();
        $.ajax({
          url: 'jurnal-ilmiah/'+id+'/edit',
          type: "GET",
          dataType: "JSON",
          async: false,
          processData: false,
          contentType:false,
          success : function(data){
            $('#modal-jurnal-ilmiah').modal('show');
            $('.modal-title').text('Edit Pendalaman Materi');
            $('#id_jurnal-ilmiah').val(data.data.id_jurnal-ilmiah);
            $('select#judul').select2('trigger','select',{'data':{'id':data.data.judul,'text':data.data.materi.materi}});

            // $('#judul').val(data.data.materi.materi);
            $('#unit_penyelenggara').val(data.data.penyelenggara);
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
              url: 'jurnal-ilmiah/' + id,
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
