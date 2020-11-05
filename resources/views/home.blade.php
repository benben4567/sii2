@extends('layouts.app')
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Dashboard</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a></li>
          </ol>

        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="page-content-wrapper">

      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
              <div class="mini-stat-desc">
                <h6 class="text-uppercase verti-label text-white-50">Magang</h6>
                <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white-50">Magang</h6>
                <h3 class="mb-3 mt-0">{{$magang}}</h3>
                  <div class="">
                    <span class="ml-2">Pengalaman Magang</span>
                  </div>
                </div>
                <div class="mini-stat-icon">
                  <i class="mdi mdi-cube-outline display-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-danger mini-stat position-relative">
            <div class="card-body">
              <div class="mini-stat-desc">
                <h6 class="text-uppercase verti-label text-white-50">Mengajar</h6>
                <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white-50">Mengajar</h6>
                  <h3 class="mb-3 mt-0">{{$mengajar}}</h3>
                  <div class="">
                    <span class="ml-2">Pengalaman Mengajar</span>
                  </div>
                </div>
                <div class="mini-stat-icon">
                  <i class="mdi mdi-buffer display-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning mini-stat position-relative">
            <div class="card-body">
              <div class="mini-stat-desc">
                <h6 class="text-uppercase verti-label text-white-50">Materi</h6>
                <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white-50">Materi</h6>
                <h3 class="mb-3 mt-0">{{$materi}}</h3>
                  <div class="">
                    <span class="ml-2">Pendalaman Materi</span>
                  </div>
                </div>
                <div class="mini-stat-icon">
                  <i class="mdi mdi-tag-text-outline display-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success mini-stat position-relative">
            <div class="card-body">
              <div class="mini-stat-desc">
                <h6 class="text-uppercase verti-label text-white-50">Bidang</h6>
                <div class="text-white">
                  <h6 class="text-uppercase mt-0 text-white-50">Kompentensi</h6>
                <h3 class="mb-3 mt-0">{{$sertifikasi_bidang}}</h3>
                  <div class="">
                    <span class="ml-2">Kompentensi Bidang</span>
                  </div>
                </div>
                <div class="mini-stat-icon">
                  <i class="mdi mdi-briefcase-check display-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              Dashboard
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-xl-8 border-right">
                  <h4 class="mt-0 header-title mb-0">Selamat Datang {{ Auth::user()->username }}</h4>
                </div>

              </div>
              <!-- end row -->
            </div>
          </div>
        </div>
        <!-- end col -->


      </div>
      <!-- end row -->

    </div>
    <!-- end page content-->

  </div> <!-- container-fluid -->

</div> <!-- content -->

@section('js')
<script type="text/javascript">
  var nama = "{{{ Auth::user()->username }}}";
  $(function() {
    toastr.options.timeOut = "10000";
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-bottom-right';
    toastr['info']('Selamat datang '+nama);
    $('.btn-toastr').on('click', function() {
      $context = $(this).data('context');
      $message = $(this).data('message');
      $position = $(this).data('position');
      if ($context === '') {
        $context = 'info';
      }
      if ($position === '') {
        $positionClass = 'toast-bottom-right';
      } else {
        $positionClass = 'toast-' + $position;
      }
      toastr.remove();
      toastr[$context]($message, '', {
        positionClass: $positionClass
      });
    });
  });
</script>
@endsection
@endsection
