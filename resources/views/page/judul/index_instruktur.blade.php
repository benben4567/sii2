@extends('layouts.app')
@section('title', 'Judul Materi')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Master Data Judul</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Judul
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
              <div class="card-body">
                @if(session('status'))
                  <div class="alert alert-success">
                  {{session('status')}}
                </div>

                @elseif (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>

                @endif
                  {{ csrf_field() }}
                  <table  class="table table-bordered table-responsive nowrap table-judul" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th width="20"><input type="checkbox" id="select-all" value="1" ></th>
                        <th>No</th>
                        <th>Kode Judul</th>
                        <th>Kode Judul Lama</th>
                        <th>Nama Judul</th>
                        <th>Jenis Diklat</th>
                        <th>Sifat Diklat</th>
                        <th>Dahan Profesi</th>
                        <th>Level Profisiensi</th>
                        <th>Penyelenggaraan</th>
                        <th>Penanggung Jawab</th>
                        <th>Jenis Sertifikat</th>
                        <th>Tahun Terbit</th>
                        <th>Durasi Hari Efektif</th>
                        <th>Total JP Materi</th>
                        <th>Jml Pagu Anggaran</th>
                        <th>Cabang Profesi</th>
                        <th>Tanggal Input</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>

                  </table>
              </div>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->
{{-- @include('page.judul.add-warning') --}}
@section('js')
<script type="text/javascript">
  var table, save_method;
  $(function(){
    table = $('.table-judul').DataTable({
      "processing" :true,
      "serverside" : true,
      "ajax":{
        "url" : "#",
        "type" : "GET"
      },
    });

    $('.table-judul tbody').on( 'click', '.addwarning', function () {
        let id = $(this).data('id')
        $('.id_judul').val(id)

        let nama = $(this).data('judul')
        $('.modal-title').text(nama)
        $('.add-warning').modal('show')
    });


  })

  // function showKategori(id){
  //     $.ajax({
  //       url : 'kategori/' + id ,
  //       type : "GET",
  //       dataType : "JSON",
  //       success:function(data){
  //       },
  //       error : function(){
  //         alert('Gagal!');
  //       }
  //     });
  //   }


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
          url: 'pembelajaran/' + id,
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
