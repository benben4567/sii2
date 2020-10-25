@extends('layouts.admin.app')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Authentikasi Rule</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Authentikasi Rule
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
                  <button onclick="addForm()" type="button" class="btn btn-primary btn-block"><i class="fa fa-plus-square"> Tambah Rule</i> </button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-rep-plugin">
                  <div class="table-responsive b-0" data-pattern="priority-columns">

                    <table  class="table table-striped dt-responsive nowrap table-rule" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Rule</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Nama Rule</th>
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

          </div> <!-- end col -->
        </div> <!-- end row -->
      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->
@include('page.auth.rule.form')
@section('js')
<script type="text/javascript">
  var table, table1;
  $(function(){
    table = $('.table-rule').DataTable({
      "processing" : true,
      "serverside" : true,
      "ajax":{
        "url" : "{{route('rule.data')}}",
        "type" : "GET"
      }
    });
    table1 = $('.table-detail').DataTable({
        "processing" :true,
        "lengthMenu": [[15, 25, 50, -1], [15, 25, 50, "All"]],
        "serverside" : true,
        "ajax":{
          "url" : "{{route('rule.permission')}}",
          "type" : "GET"
        }
      });
    $('#modal-rule form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_role').val();
        if (save_method == "add")
        url = "{!! route('rule.store') !!}";
        else url = "rule/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : $('#modal-rule form').serialize(),
          dataType : 'JSON',
          success : function(data){
            if (save_method == "add"){
              toastr.success('Data Berhasil di Simpan!', 'Success Alert', {timeOut: 4000});
            }else{
              toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
            }
            $('#modal-rule').modal('hide');
            table.ajax.reload( null, false );
          },
          error : function(){
            toastr.error('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 4000});
          }
        });
        return false;
      }
    });

  });
  $('#select_Kategori').click(function(){
    $('input[type="checkbox"].create').prop('checked', this.checked);
  });
  $('#create_func').click(function(){
    $('input[type="checkbox"].create').prop('checked', this.checked);
  });
  $('#read_func').click(function(){
    $('input[type="checkbox"].read').prop('checked', this.checked);
  });
  $('#update_func').click(function(){
    $('input[type="checkbox"].update').prop('checked', this.checked);
  });
  $('#delete_func').click(function(){
    $('input[type="checkbox"].delete').prop('checked', this.checked);
  });
  $('#crud_func').click(function(){
    $('input[type="checkbox"].crud').prop('checked', this.checked);
  });


  function addForm(){
    save_method = "add";
    $('input[name = _method]').val('POST');
    $('#modal-rule').modal('show');
    $('#modal-rule form')[0].reset();
    $('.modal-title').text('Tambah Rule');
    table1.ajax.reload();
  }
  function editForm(id){
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-rule form')[0].reset();
    $.ajax({
      url: 'rule/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      success : function(data){
        $('#modal-rule').modal('show');
        $('.modal-title').text('Edit Rule');
        $('#id_role').val(data.rule.id_role);
        $('#name').val(data.rule.name);
        $('modal#modal-rule input[type="checkbox"].create').val(data.permission.id_permission);
          if(data.rule.permissions.id_permission == data.permission.id_permission){
             $.each(data.rule.permissions , function (index, value) {
              $('.select_' + value['id_permission']).prop('checked', 'checked');
            });
          }
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
          url: 'rule/' + id,
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
</script>
@endsection


@endsection
