@extends('layouts.app')
@section('title', 'Evaluasi Tertutup')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Evaluasi Level Satu</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Evaluasi Tertutup
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
              </div>
              <div class="card-body">
                <form method="post" action="#" id="form-tertutup" target="votar">
                  {{ csrf_field() }}
                  <table  class="table table-bordered table-responsive nowrap table-tertutup" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nilai</th>
                        <th>Judul Diklat</th>
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

@include('page.evaluasi.tertutup.form')
@section('js')
<script type="text/javascript">
  var table, save_method;
    $(function(){
      table = $('.table-tertutup').DataTable({
      "responsive" : true,
      "pageLength" : 10,
      "deferRender": true,
      "lengthChange": false,
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "/evaluasi/getdatatertutup",
        "type" : "GET"
      },
      "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nilai', name: 'nilai'},
            {data: 'detailpenjadwalanpeserta_id', name: 'detailpenjadwalanpeserta_id'}
      ],
      "columnDefs": [{
        "targets" : 3,
        "data" : null,
        "defaultContent": "<button type=\"button\" class=\"btn btn-sm btn-show btn-info\"><i class=\"fas fa-eye\"></i></button>"
      }]
    });

    $('.table-tertutup tbody').on( 'click', '.btn-show', function () {
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
  });
</script>
@endsection


@endsection
