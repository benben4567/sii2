@extends('layouts.app')
@section('title', 'Sertifikasi Bidang')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Sertifikasi Bidang</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Sertifikasi Bidang
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
                  <a onclick="addForm()" class="btn btn-primary text-white">Tambah Sertifikasi</a>
                </div>
              </div>
              <div class="card-body">
                <div class="table-rep-plugin">
                  <div class="table-responsive b-0" data-pattern="priority-columns">
                    <table class="table table-bordered  nowrap table-bidang" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                      <thead>
                        <tr>
                          <th>No</th>
                          {{-- @if(Auth::user()->roles->first->getOriginal()->name == "Super Admin")
                          <th>Nama</th>
                          @endif --}}
                          <th>Sertifikasi</th>
                          <th>Tanggal Pelaksanaan</th>
                          <th>Masa Berlaku</th>
                          <th>File</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                      </tbody>


                      <tfoot>
                        <tr>
                          <th>No</th>
                          {{-- @if(Auth::user()->roles->first->getOriginal()->name == "Super Admin")
                          <th>Nama</th>
                          @endif --}}
                          <th>Sertifikasi</th>
                          <th>Tanggal Pelaksanaan</th>
                          <th>Masa Berlaku</th>
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
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->

@include('page.sertifikasi.bidang.form')
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('.table-bidang').DataTable({
      "pageLength" : 10,
      "deferRender": true,
      "lengthChange": false,
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "pengalaman-bidang/getdata",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_sertifikasi', name: 'nama_sertifikasi'},
            {data: 'tgl_pelaksanaan', name: 'tgl_pelaksanaan'},
            {data: 'batas_sertifikasi', name: 'batas_sertifikasi'},
            {data: 'nama_file', name: 'nama_file'}
      ],
      "columnDefs": [
        {
          "targets" : 4,
          "className": 'text-center',
          "data" : 'nama_file',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/narasumber/nama_file/${data}"><i class="fas fa-download"></i></a>` ;
          }
        },
        {
        "targets" : 5,
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
      }
      ]
    });

    $('.table-bidang tbody').on( 'click', '.btn-show', function () {
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

    $('#modal-bidang .dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Hapus',
            'error':   'Ooops, something wrong happended.'
        }
        });

        $('select#sertifikasi').select2({
          dropdownParent: $('#modal-bidang'),
          placeholder: "Select Materi",
          allowClear: true,
          width: 'resolve',
          minimumInputLength: 1,
        });
        $('#modal-bidang form').validator().on('submit', function(e){
          if(!e.isDefaultPrevented()){
            var id = $('#id_bidang').val();
            if (save_method == "add")
            url = "#";
            else url = "bidang/"+id;
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
                  if (data.status=="error") {
                    toastr.warning('Sertifikasi sudah ada, anda tidak bisa menambah sertifikasi yang sama!', 'Warning Alert', {timeOut: 7000});
                    $('#nama_sertifikasi').focus().select();
                  }else{
                      toastr.success('Data Berhasil di Simpan!', 'Success Alert', {timeOut: 4000});
                      $('#modal-bidang').modal('hide');
                      table.ajax.reload( null, false );
                  }
                }else{
                  toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
                  $('#modal-bidang').modal('hide');
                table.ajax.reload( null, false );
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
        var drEvent = $('#modal-bidang .dropify').dropify();
        save_method = "add";
        $('input[name = _method]').val('POST');
        $('#modal-bidang').modal('show');
        $('#modal-bidang form')[0].reset();
        $('.modal-title').text('Tambah Sertifikasi Bidang');
        $('#modal-bidang #sertifikasi').val('').trigger('change');
        $('#modal-bidang #sertifikasi').attr('required',true);
        $('#modal-bidang #nama_file').attr('required',true);
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
      }

      function editForm(id){
        var drEvent = $('#modal-bidang .dropify').dropify();
        save_method = "edit";
        $('input[name = _method]').val('PATCH');
        $('#modal-bidang form')[0].reset();
        $('#modal-bidang #sertifikasi').val('').trigger('change');
        $('#modal-bidang #sertifikasi').attr('required',false);
        $('#modal-bidang #nama_file').attr('required',false);
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        $.ajax({
          url: 'bidang/'+id+'/edit',
          type: "GET",
          dataType: "JSON",
          async: false,
          processData: false,
          contentType:false,
          success : function(data){
            $('#modal-bidang').modal('show');
            $('.modal-title').text('Edit Sertifikasi Bidang');
            $('#id_bidang').val(data.data.id_bidang);
            $('#nama_sertifikasi').val(data.data.nama_sertifikasi);
            $('#tgl_pelaksanaan').val(data.data.tgl_pelaksanaan);
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
              url: 'bidang/' + id,
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
