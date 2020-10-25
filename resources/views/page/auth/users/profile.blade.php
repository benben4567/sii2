@extends('layouts.app')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Edit Profile</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              edit profile
            </li>
          </ol>
          <div class="state-information d-none d-sm-block">
            <div class="state-graph">
              <div id="header-chart-1"></div>
              <div class="info">Balance $ 2,317</div>
            </div>
            <div class="state-graph">
              <div id="header-chart-2"></div>
              <div class="info">Item Sold 1230</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="page-content-wrapper">

      <div class="page-content-wrapper">
        <div class="row clearfix">
                <div class="col-lg-12">
                  <form class="form form-horizontal" data-toggle="validator" method="post" enctype="multipart/form-data">
                                  {{csrf_field()}} {{method_field('PATCH')}}
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Profile">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#billings">Billings</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#preferences">Preferences</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <div class="tab-pane active" id="Profile">
                              <div class="container">

                                <div class="body">
                                    <h6>Profile Photo</h6>
                                    <div class="media">
                                        <div class="media-left m-r-15 tampil-foto">
                                          @if(Auth::user()->foto == '')
                                          <img src="{{asset('assets/images/default.png')}}" class="user-photo media-object" width="200" alt="">
                                          @else
                                          <img src="{{asset('assets/images/user/'. Auth::user()->foto)}}" class="user-photo media-object" width="200" alt="">
                                          @endif
                                        </div>
                                        <div class="media-body">
                                            <p>Upload your photo.
                                                <br> <em>Image should be at least 140px x 140px</em></p>
                                            <!--  <button type="button" class="btn btn-default-dark" id="btn-upload-photo">Upload Photo</button> -->
                                            <input type="file" class="btn btn-default-dark" data-buttonname="btn-secondary" name="foto">
                                        </div>
                                    </div>
                                </div>

                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12">
                                            <h6>Account Data</h6>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="{{Auth::user()->username}}" disabled placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}"  placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <h6>Change Password</h6>
                                            <div class="form-group">
                                                <input type="password" id="passwordlama" class="form-control"  name="passwordlama" placeholder="Current Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" id="password" class="form-control"  name="password" autofocus placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password"  data-match="#password" id="password1" class="form-control"  name="password1" autofocus placeholder="Confirm New Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right"> <i class="fa fa-floppy-o"></i> Simpan Perubahan</button>
                </div>
                    </div>
                    </form>
                </div>
            </div>
        {{-- <div class="row">
          <div class="col-12">
            <form class="form form-horizontal" data-toggle="validator" method="post" enctype="multipart/form-data">
              {{csrf_field()}} {{method_field('PATCH')}}
              <div class="card m-b-20">
                <div class="card-body">
                  <div class="form-group">
                    <label for="foto" class="col-md-5 control-label">Foto</label>
                    <div class="col-md-12">
                      <input type="file" class="filestyle" data-buttonname="btn-secondary" name="foto">
                      <br>
                      <div class="tampil-foto">
                        @if(Auth::user()->foto == '')
                        <img src="{{asset('assets/images/default.png')}}" width="200" alt="">
                        @else
                        <img src="{{asset('assets/images/user/'. Auth::user()->foto)}}" width="200" alt="">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="passwordlama" class="col-md-5 control-label">Password Lama</label>
                    <div class="col-md-12">
                      <input type="password" id="passwordlama" class="form-control"  name="passwordlama" placeholder="Current Password">
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-md-5 control-label">Password Baru</label>
                    <div class="col-md-12">
                      <input type="password" id="password" class="form-control"  name="password" autofocus >
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password1" class="col-md-5 control-label">Ulang Password</label>
                    <div class="col-md-12">
                      <input type="password"  data-match="#password" id="password1" class="form-control" placeholder="Confirm New Password"  name="password1" autofocus>
                      <span class="help-block with-errors"></span>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right"> <i class="fa fa-floppy-o"></i> Simpan Perubahan</button>
                </div>
              </div>
            </form>
          </div> <!-- end col -->
        </div> <!-- end row --> --}}
      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->

@section('js')
<script type="text/javascript">
  $(function(){
    $('#passwordlama').keyup(function(){
      if($(this).val() != "")
      $('#password, #password1').attr('required',true);
      else
      $('#password, #password1').attr('required',false);
    });
    $('.form').validator().on('submit',function(e){
      if(!e.isDefaultPrevented()){
        $.ajax({
          url : "profile/{{Auth::user()->id}}/change",
          type : "POST",
          data : new FormData($(".form")[0]),
          dataType : 'JSON',
          async: false,
          processData: false,
          contentType:false,
          success : function(data){
            if(data.msg == "error"){
              toastr.warning('Password lama salah!', 'Warning Alert', {timeOut: 3000});
              $('#passwordlama').focus().select();
            }else{
              d = new Date();
              toastr.success('Perubahan berhasil disimpan!', 'Success Alert', {timeOut: 7000});
              $('.tampil-foto img, .user-image, .user-header img, .user-details img' ).attr('src',data.url+'?'+d.getTime());
              // console.log(data.url);
            }
          },
          error : function(){
            toastr.warning('Tidak dapat menyimpan data!', 'Error Alert', {timeOut: 3000});
          }
        });
        return false;
      }
    });
  });

</script>
@endsection


@endsection
