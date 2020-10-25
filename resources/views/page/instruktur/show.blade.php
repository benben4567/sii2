@extends('layouts.app')
@section('title', 'Instruktur')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Master Data Instruktur</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Instruktur
            </li>
          </ol>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="page-content-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="card m-b-20">
            <div class="card-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail Instruktur</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="magang-tab" data-toggle="tab" href="#magang" role="tab" aria-controls="magang" aria-selected="false">Magang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="mengajar-tab" data-toggle="tab" href="#mengajar" role="tab" aria-controls="mengajar" aria-selected="false">Mengajar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="materi-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="materi" aria-selected="false">Pendalaman Materi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="narasumber-tab" data-toggle="tab" href="#narasumber" role="tab" aria-controls="narasumber" aria-selected="false">Narasumber</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="penyusun-tab" data-toggle="tab" href="#penyusun" role="tab" aria-controls="penyusun" aria-selected="false">Penyusun</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h5>Detail Instruktur</h5>
                    </div>
                    <div class="card-body">
                      { data will show here }
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="magang" role="tabpanel" aria-labelledby="magang-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Pengalaman Magang</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>One</th>
                            <th>Two</th>
                            <th>Three</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="mengajar" role="tabpanel" aria-labelledby="mengajar-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Pengalaman Mengajar</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>One</th>
                            <th>Two</th>
                            <th>Three</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="materi" role="tabpanel" aria-labelledby="materi-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Pengalaman Pendalaman Materi</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>One</th>
                            <th>Two</th>
                            <th>Three</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="narasumber" role="tabpanel" aria-labelledby="narasumber-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Pengalaman Narasumber</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>One</th>
                            <th>Two</th>
                            <th>Three</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="penyusun" role="tabpanel" aria-labelledby="penyusun-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Pengalaman Penyusun</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>One</th>
                            <th>Two</th>
                            <th>Three</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- end col -->
      </div> <!-- end row -->
    </div><!-- end page content-->
  </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection
@push('js')

@endpush
