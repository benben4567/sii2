@extends('layouts.app')
@section('title', 'Pengalaman Instruktur')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Data Narasumber</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Data Narasumber
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
                <label>Cari Narasumber</label>
                <div class="col-md-12" id="selectnip">
                  <select name="pilih" id="pilihjudul" onchange="getComboA(this)"  class="form-control select2" style="width:100%"></select>
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


      <div class="card-body">
                <div class="table-rep-plugin">
                  <div class="table-responsive b-0" data-pattern="priority-columns">
                    <table class="table table-bordered  nowrap table-magang" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                      <thead>
                        <tr>
                          <th width="20"><input type="checkbox" id="select-all" value="1" ></th>
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama Instruktur</th>
                          <th>Nomor HP</th>
                          <th>Email</th>
                          <th>Unit Diklat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr></tr>
                      </tbody>

                      <tfoot>
                        <tr>
                          <th width="20"><input type="checkbox" id="select-all" value="1" ></th>
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama Instruktur</th>
                          <th>Nomor HP</th>
                          <th>Email</th>
                          <th>Unit Diklat</th>

                        </tr>
                      </tfoot>
                      <tbody>

                      </tbody>

                    </table>
                  </div>
                </div>
              </div>


      <div class="row" id="muncul-table" style="display:none">
        <!-- Magang -->
        <div class="col-md-12 col-lg-12">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label>List Narasumber</label>
                <div class="col-md-12">
                  <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                      <table class="table table-bordered  nowrap table-narasumber" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Unit</th>
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
@include('page.pengalaman.narasumber.modal-admin')
@section('js')
<script type="text/javascript">
  var table,table1, save_method;
  $(function(){
    table = $('.table-narasumber').DataTable({
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
    table1 = $('.table-detail-narasumber').DataTable({
      "processing" :true,
      "serverside" : true,
      'destroy': true,
      'paging': false,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': false,
      'autoWidth': true,
      "processing" :true,
    });
    $('select#pilihjudul').select2({
      allowClear: true,
      placeholder: 'Search',
      minimumInputLength: 1,
      ajax: {
        url: '{{route('masterNarasumber.select2judul')}}',
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

  function viewForm(id){
    $.ajax({
      url: "masterNarasumber/"+id+'/view',
      type: "GET",
      dataType: "JSON",
      async: false,
      processData: false,
      contentType:false,
      success : function(data){
        $('#modal-detail').modal('show');
        $('.modal-title').text('Detail Peyusun ' + data.data.nama_instruktur);
        table1.ajax.url("masterNarasumber/"+id+"/dataDetail");
        table1.ajax.reload();
      },
      error : function(){
        toastr.warning('Tidak dapat menampilkan data!', 'Error Alert', {timeOut: 3000});
      }
    });
  }
  function cariForm(id){
    $('input[name = _method]').val('PATCH');
    $.ajax({
      url: "masterNarasumber/"+id+"/getDataAdmin",
      type: "GET",
      dataType: "JSON",
      success : function(data){
        $('#muncul-table').show();
        toastr.success('Berhasil menampilkan data!', 'Success Alert', {timeOut: 3000});
        table.ajax.url("masterNarasumber/"+id+"/data");
        table.ajax.reload();
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


</script>
@endsection


@endsection






