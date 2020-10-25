@extends('layouts.admin.app')
@section('title', 'Pengalaman Instruktur')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman</h4>
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
        <div class="col-md-12 col-lg-6">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label>Cari Instruktur</label>
                <div class="col-md-12" id="selectnip">
                  <select name="pilih" id="pilihnip" onchange="getComboA(this)"  class="form-control select2" style="width:100%"></select>
                  <span class="help-block with-errors"></span>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a type="button" id="btnsearch" class="btn btn-info text-white float-right"><i class="fa fa fa-search"> Search</i> </a>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end row -->
      <div class="row" id="muncul-table" style="display:none">
        <!-- Magang -->
        <div class="col-md-12 col-lg-12">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label>List Pengalaman Magang</label>
                <div class="col-md-12">
                  <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                      <table class="table table-bordered  nowrap table-magang" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
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
                        <tbody>

                        </tbody>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->

        <!-- Mengajar -->
        <div class="col-md-12 col-lg-12">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label>List Pengalaman Mengajar</label>
                <div class="col-md-12">
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
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
        <!-- Pendalaman -->
        <div class="col-md-12 col-lg-12">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label>List Pendalaman Materi </label>
                <div class="col-md-12">
                  <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                      <table class="table table-bordered  nowrap table-pendalaman" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Durasi</th>
                            <th>Unit Penyelenggara</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Durasi</th>
                            <th>Unit Penyelenggara</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
        <!-- Sertifikasi -->
        <div class="col-md-12 col-lg-12">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label>List Sertifikai Kompetensi </label>
                <div class="col-md-12">
                  <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                      <table class="table table-bordered  nowrap table-bidang" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Sertifikasi</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Masa Berlaku</th>
                            <th>File</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Sertifikasi</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Masa Berlaku</th>
                            <th>File</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
        <div class="col-md-12 col-lg-12">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label>List Sertifikasi Bidang </label>
                <div class="col-md-12">
                  <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                      <table class="table table-bordered  nowrap table-sertifikasi_bidang" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Sertifikasi</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Batas Sertifikasi</th>
                            <th>File</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Sertifikasi</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Batas Sertifikasi</th>
                            <th>File</th>
                            <th>Aksi</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end row -->
    </div>
    <!-- end page content-->
  </div> <!-- content -->
</div> <!-- content -->

@include('page.pengalaman.magang.form')
@include('page.pengalaman.mengajar.form')
@include('page.pengalaman.pendalaman_materi.form')
@include('page.sertifikasi.bidang.form')
@include('page.sertifikasi.kompetensi_bidang.form')


@section('js')
<script type="text/javascript">
  var table,table1,table2,table3,table4, save_method;
  $(function(){

    table = $('.table-magang').DataTable({
      "processing" :true,
      "serverside" : true,
      'destroy': true,
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
      "processing" :true,
    });
    table1 = $('.table-mengajar').DataTable({
      "processing" :true,
      "serverside" : true,
      'destroy': true,
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
      "processing" :true,
    });
    table2 = $('.table-pendalaman').DataTable({
      "processing" :true,
      "serverside" : true,
      'destroy': true,
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
      "processing" :true,
    });
    table3 = $('.table-bidang').DataTable({
      "processing" :true,
      "serverside" : true,
      'destroy': true,
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
      "processing" :true,
    });
    table4 = $('.table-sertifikasi_bidang').DataTable({
      "processing" :true,
      "serverside" : true,
      'destroy': true,
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': true,
      'info': true,
      'autoWidth': true,
      "processing" :true,
    });

    $('#modal-magang form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_magang').val();
        url = "magang/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : new FormData($("#form-magang")[0]),
          dataType : 'JSON',
          async: false,
          processData: false,
          contentType:false,
          success : function(data){
            if (data.status=="errorTime") {
              toastr.warning('Tanggal Selesai tidak boleh lebih dulu dari Tanggal Mulai!', 'Warning Alert', {timeOut: 7000});
              $('#tgl_selesai').focus().select();
            }else{
              toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
              $('#modal-magang').modal('hide');
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

    $('#modal-mengajar form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_mengajar').val();
        url = "mengajar/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : new FormData($("#form-mengajar")[0]),
          dataType : 'JSON',
          async: false,
          processData: false,
          contentType:false,
          success : function(data){

            if (data.status=="errorTime") {
              toastr.warning('Tanggal Selesai tidak boleh lebih dulu dari Tanggal Mulai!', 'Warning Alert', {timeOut: 7000});
              $('#tgl_selesai').focus().select();
            }else{
              toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
              $('#modal-mengajar').modal('hide');
              table1.ajax.reload( null, false );
            }

          },
          error : function(){
            toastr.error('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 4000});
          }
        });
        return false;
      }
    });

    $('#modal-pendalaman_materi form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_pendalaman_materi').val();
        url = "pendalaman_materi/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : new FormData($("#form-materi")[0]),
          dataType : 'JSON',
          async: false,
          processData: false,
          contentType:false,
          success : function(data){

            if (data.status=="errorTime") {
              toastr.warning('Tanggal Selesai tidak boleh lebih dulu dari Tanggal Mulai!', 'Warning Alert', {timeOut: 7000});
              $('#tgl_selesai').focus().select();
            }else{
              toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
              $('#modal-pendalaman_materi').modal('hide');
              table2.ajax.reload( null, false );
            }

          },
          error : function(){
            toastr.error('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 4000});
          }
        });
        return false;
      }
    });

    $('#modal-bidang form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_bidang').val();
        url = "bidang/"+id;;
        $.ajax({
          url : url,
          type : "POST",
          data : new FormData($("#form-bidang")[0]),
          dataType : 'JSON',
          async: false,
          processData: false,
          contentType:false,
          success : function(data){

            toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
            $('#modal-bidang').modal('hide');
            table4.ajax.reload( null, false );

          },
          error : function(){
            toastr.error('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 4000});
          }
        });
        return false;
      }
    });

    $('#modal-sertifikasi_bidang form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_sertifikasi_bidang').val();
        url =  "sertifikasi_bidang/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : new FormData($("#form-kompetensi")[0]),
          dataType : 'JSON',
          async: false,
          processData: false,
          contentType:false,
          success : function(data){

            toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
            $('#modal-sertifikasi_bidang').modal('hide');
            table3.ajax.reload( null, false );
          },
          error : function(){
            toastr.error('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 4000});
          }
        });
        return false;
      }
    });

    $('select#pilihnip').select2({
      allowClear: true,
      placeholder: 'Search',
      minimumInputLength: 1,
      ajax: {
        url: '{{route('instruktur.select2nip')}}',
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
                id: item.id_instruktur,
                text: item.nip+' - '+item.nama_instruktur
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

    $("select#judul").select2({
      allowClear: true,
      width: 'resolve', // need to override the changed default
      dropdownParent: $("#modal-pendalaman_materi"),
      placeholder: 'Pilih Judul',
      minimumInputLength: 1,
      ajax: {
        url: '{{route('pendalaman_materi.select2')}}',
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
                text:item.jenis_materi +' - '+ item.materi
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

    $("select#materi_pembelajaran").select2({
      allowClear: true,
      width: 'resolve', // need to override the changed default
      dropdownParent: $("#modal-mengajar"),
      placeholder: 'Pilih Judul',
      minimumInputLength: 1,
      ajax: {
        url: '{{route('mengajar.select2')}}',
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



    $('table.table-magang td#btnEdit').on('submit',function(){
      return false;
    });
  });
  function cariForm(id){
    $('input[name = _method]').val('PATCH');
    $.ajax({
      url: 'pengalaman/'+id+'/getData',
      type: "GET",
      dataType: "JSON",
      success : function(data){
        // $('#hilang').hide();
        $('#muncul-table').show();
        toastr.success('Berhasil menampilkan data!', 'Success Alert', {timeOut: 3000});
        table.ajax.url("pengalaman/"+id+"/magang");
        table.ajax.reload();
        table1.ajax.url("pengalaman/"+id+"/mengajar");
        table1.ajax.reload();
        table2.ajax.url("pengalaman/"+id+"/pendalaman");
        table2.ajax.reload();
        table3.ajax.url("pengalaman/"+id+"/sertifkasi1");
        table3.ajax.reload();
        table4.ajax.url("pengalaman/"+id+"/sertifikasi2");
        table4.ajax.reload();
      },
      error : function(){
        toastr.warning('Tidak dapat menampilkan data!', 'Error Alert', {timeOut: 3000});
      }
    });
  }
  function getComboA(selectObject) {
    var value = selectObject.value;
    $('#btnsearch').attr('onclick', 'cariForm('+selectObject.value+')');
  }
  //EDIT
  function editFormMagang(id){
    var drEventMagang = $('#modal-magang .dropify').dropify();
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-magang form')[0].reset();
    $('#modal-magang #nama_file').attr('required',false);
    drEventMagang = drEventMagang.data('dropify');
    drEventMagang.resetPreview();
    drEventMagang.clearElement();
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
  function editFormMengajar(id){
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
  function editFormMateri(id){
    // var drEvent = $('#modal-pendalaman_materi .dropify').dropify();
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-pendalaman_materi form')[0].reset();
    $('#modal-pendalaman_materi #judul').val('').trigger('change');
    $('#modal-pendalaman_materi #judul').attr('required',false);
    // $('#modal-pendalaman_materi #nama_file').attr('required',false);
    // drEvent = drEvent.data('dropify');
    // drEvent.resetPreview();
    // drEvent.clearElement();
    $.ajax({
      url: 'pendalaman_materi/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      async: false,
      processData: false,
      contentType:false,
      success : function(data){
        $('#modal-pendalaman_materi').modal('show');
        $('.modal-title').text('Edit Pendalaman Materi');
        $('#modal-pendalaman_materi #id_pendalaman_materi').val(data.data.id_pendalaman_materi);
        $('#modal-pendalaman_materi select#judul').select2('trigger','select',{'data':{'id':data.data.judul,'text':data.data.materi.materi}});

        // $('#judul').val(data.data.materi.materi);
        $('#modal-pendalaman_materi #unit_penyelenggara').val(data.data.penyelenggara);
        $('#modal-pendalaman_materi #tgl_mulai').val(data.data.tgl_mulai);
        $('#modal-pendalaman_materi #tgl_selesai').val(data.data.tgl_selesai);
      },
      error : function(){
        toastr.warning('Tidak dapat menampilkan data!', 'Error Alert', {timeOut: 3000});
      }
    });
  }

  function editFormKompetensi(id){
    var drEventBidang = $('#modal-bidang .dropify').dropify();
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-bidang form')[0].reset();
    $('#modal-bidang #sertifikasi').val('').trigger('change');
    $('#modal-bidang #sertifikasi').attr('required',false);
    $('#modal-bidang #nama_file').attr('required',false);
    drEventBidang = drEventBidang.data('dropify');
    drEventBidang.resetPreview();
    drEventBidang.clearElement();
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
        $('#modal-bidang #nama_sertifikasi').val(data.data.nama_sertifikasi);
        $('#modal-bidang #tgl_pelaksanaan').val(data.data.tgl_pelaksanaan);
        $('#modal-bidang #batas_sertifikasi').val(data.data.batas_sertifikasi);

      },
      error : function(){
        toastr.warning('Tidak dapat menampilkan data!', 'Error Alert', {timeOut: 3000});
      }
    });
  }

  function editFormBidang(id){
    var drEventKompetensi = $('#modal-sertifikasi_bidang .dropify').dropify();
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-sertifikasi_bidang form')[0].reset();
    $('#modal-sertifikasi_bidang #sertifikasi').val('').trigger('change');
    $('#modal-sertifikasi_bidang #sertifikasi').attr('required',false);
    $('#modal-sertifikasi_bidang #nama_file').attr('required',false);
    drEventKompetensi = drEventKompetensi.data('dropify');
    drEventKompetensi.resetPreview();
    drEventKompetensi.clearElement();
    $.ajax({
      url: 'sertifikasi_bidang/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      async: false,
      processData: false,
      contentType:false,
      success : function(data){
        $('#modal-sertifikasi_bidang').modal('show');
        $('.modal-title').text('Edit Sertifikasi Kompetensi');
        $('#id_sertifikasi_bidang').val(data.data.id_sertifikasi_bidang);
        $('#modal-sertifikasi_bidang #nama_sertifikasi').val(data.data.nama_sertifikasi);
        $('#modal-sertifikasi_bidang #tgl_pelaksanaan').val(data.data.tgl_pelaksanaan);
        $('#modal-sertifikasi_bidang #batas_sertifikasi').val(data.data.batas_sertifikasi);

      },
      error : function(){
        toastr.warning('Tidak dapat menampilkan data!', 'Error Alert', {timeOut: 3000});
      }
    });
  }



  //DELETE
  function deleteDataMagang(id){
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
          url: 'pengalaman/'+id+'/destroyMagang',
          type: 'POST',
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
  function deleteDataMengajar(id){
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
          url: 'pengalaman/' + id + '/destroyMengajar',
          type: 'POST',
          data: {
            '_token': $('input[name=_token]').val(),
          },
          success: function(data){
            swal("Done!", "Data Berhasil di hapus!", "success");
            toastr.success('Data Berhasil di hapus!', 'Success Alert', {timeOut: 4000});
            table1.ajax.reload();
          },
          error : function(data){
            swal("Error deleting!", "Please try again", "error");
            toastr.warning('Tidak dapat menghapus data!', 'Error Alert', {timeOut: 3000});
          }
        });
      }
    });
  }
  function deleteDataMateri(id){
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
          url: 'pengalaman/' + id + '/destroyMateri',
          type: 'POST',
          data: {
            '_token': $('input[name=_token]').val(),
          },
          success: function(data){
            swal("Done!", "Data Berhasil di hapus!", "success");
            toastr.success('Data Berhasil di hapus!', 'Success Alert', {timeOut: 4000});
            table2.ajax.reload();
          },
          error : function(data){
            swal("Error deleting!", "Please try again", "error");
            toastr.warning('Tidak dapat menghapus data!', 'Error Alert', {timeOut: 3000});
          }
        });
      }
    });
  }
  function deleteDataKompetensi(id){
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
          url: 'pengalaman/' + id + '/destroyKompetensi',
          type: 'POST',
          data: {
            '_token': $('input[name=_token]').val(),
          },
          success: function(data){
            swal("Done!", "Data Berhasil di hapus!", "success");
            toastr.success('Data Berhasil di hapus!', 'Success Alert', {timeOut: 4000});
            table4.ajax.reload();
          },
          error : function(data){
            swal("Error deleting!", "Please try again", "error");
            toastr.warning('Tidak dapat menghapus data!', 'Error Alert', {timeOut: 3000});
          }
        });
      }
    });
  }
  function deleteDataBidang(id){
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
          url: 'pengalaman/' + id + '/destroyBidang',
          type: 'POST',
          data: {
            '_token': $('input[name=_token]').val(),
          },
          success: function(data){
            swal("Done!", "Data Berhasil di hapus!", "success");
            toastr.success('Data Berhasil di hapus!', 'Success Alert', {timeOut: 4000});
            table3.ajax.reload();
          },
          error : function(data){
            swal("Error deleting!", "Please try again", "error");
            toastr.warning('Tidak dapat menghapus data!', 'Error Alert', {timeOut: 3000});
          }
        });
      }
    });
  }


</script>
@endsection


@endsection
