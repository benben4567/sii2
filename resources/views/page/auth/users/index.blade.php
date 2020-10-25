@extends('layouts.app')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Authentikasi Users</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              users
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
                  <button onclick="addForm()" type="button" class="btn btn-primary btn-block"><i class="fa fa-plus-square"> Tambah User</i> </button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-rep-plugin">
                  <div class="table-responsive b-0" data-pattern="priority-columns">

                    <table  class="table table-striped dt-responsive nowrap table-users" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Dibuat</th>
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
      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->

@include('page.auth.users.form')
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('.table-users').DataTable({
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "#",
        "type" : "GET"
      }
    });

    $('#modal-users form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
        var id = $('#id_user').val();
        if (save_method == "add")
        url = "#";
        else url = "users/"+id;
        $.ajax({
          url : url,
          type : "POST",
          data : $('#modal-users form').serialize(),
          dataType : 'JSON',
          success : function(data){
            if (save_method == "add"){
              toastr.success('Data Berhasil di Simpan!', 'Success Alert', {timeOut: 4000});
            }else{
              toastr.success('Data Berhasil di update!', 'Success Alert', {timeOut: 4000});
            }
            $('#modal-users').modal('hide');
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
  function addForm(){
    save_method = "add";
    $('input[name = _method]').val('POST');
    $('#modal-users').modal('show');
    $('#modal-users form')[0].reset();
    $('.modal-title').text('Tambah Users');
    $('#password #password1').prop("required",true);

  }
  function editForm(id){
    save_method = "edit";
    $('input[name = _method]').val('PATCH');
    $('#modal-users form')[0].reset();
    $.ajax({
      url: 'users/'+id+'/edit',
      type: "GET",
      dataType: "JSON",
      success : function(data){
        $('#modal-users').modal('show');
        $('.modal-title').text('Edit users');

        $('#id_user').val(data.user.id);
        $('#username').val(data.user.username);
        $('#email').val(data.user.email);
        $('#password #password1').removeAttr("required");
        $('modal#modal-users input[type="checkbox"].role').val(data.role.id_role);

        if(data.user.roles.id_role == data.role.id_role){
          $.each(data.user.roles , function (index, value) {
            $('#select_' + value['id_role']).prop('checked', 'checked');
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
          url: 'users/' + id,
          type: 'DELETE',
          data: {
            '_token': $('input[name=_token]').val(),
          },
          success: function(data){
            if(data.status == "failed"){
              swal("Error deleting!", "Akun anda sendiri tidak bisa dihapus!","warning");
              toastr.warning('Akun anda sendiri tidak bisa dihapus!', 'Warning Alert', {timeOut: 4000});
            }else{
              swal("Done!", "Data Berhasil di hapus!", "success");
              toastr.success('Data Berhasil di hapus!', 'Success Alert', {timeOut: 4000});
              table.ajax.reload();
            }
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
