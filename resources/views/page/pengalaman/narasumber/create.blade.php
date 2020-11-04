@extends('layouts.app')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman Narasumber</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Pengalaman Narasumber
            </li>
          </ol>
        </div>
      </div>
    </div> <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card m-b-20">
              <div class="card-header">
                <h5>Tambah Pengalaman Narasumber</h5>
              </div>
              <form class="form" method="post" enctype="multipart/form-data" action="pengalaman-narasumber/store">
                {{csrf_field()}} {{method_field('POST')}}
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" id="id" name="id" >
                    <label for="pengalaman_bidang">Lama Pengalaman Bidang</label>
                    <select class="form-control" name="pengalaman_bidang" id="pengalaman_bidang">
                      <option value="1 Tahun">< 1 Tahun</option>
                      <option value="1 - 3 Tahun">1 - 3 Tahun</option>
                      <option value="3 - 5 Tahun">3 - 5 Tahun</option>
                      <option value="5 Tahun">5 Tahun</option>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="pendidikan_formal">Pendidikan Formal</label>
                        <select class="form-control" name="pendidikan_formal" id="pendidikan_formal">
                          <option value="" selected disabled>- pilih -</option>
                          <option value="SMA">SMA</option>
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="file_pendidikan_formal">Bukti Dukung Pendidikan Formal</label>
                        <input type="file" data-allowed-file-extensions="pdf" name="file_pendidikan_formal" id="file_pendidikan_formal"  data-buttonname="btn-secondary"  class="form-control filestyle">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="judul">Sertifikasi</label>
                        <select name="judul" id="judul" type="text" class="form-control">
                        </select>
                        <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="file_sertifikat_pembelajaran">Bukti Dukung Sertifikasi</label>
                        <input type="file" data-allowed-file-extensions="pdf" name="file_sertifikat_pembelajaran" id="file_sertifikat_pembelajaran"  data-buttonname="btn-secondary"  class="form-control filestyle">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a class="btn btn-secondary" href="{{ route('instruktur.narasumber.index') }}" role="button">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end page content-->
  </div> <!-- content -->
</div> <!-- content -->
@endsection
@push('js')

@endpush
