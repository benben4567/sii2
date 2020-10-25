@extends('layouts.app')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman Penyusun</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Pengalaman Penyusun
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
                <h5>Update Pengalaman Penyusun</h5>
              </div>
              <form action="">
              @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Sertifikasi</label>
                        <select class="form-control select2" name="" id="">
                          <option value="" selected disabled>- pilih -</option>
                          <option value=""></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Bukti Dukung Sertifikasi</label>
                        <input type="file" data-allowed-file-extensions="pdf" name="filesertifikasiinput" id="filesertifikasiinput"  data-buttonname="btn-secondary"  class="form-control filestyle">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Tanggal Mulai</label>
                        <input type="date"  class="form-control" id="tgl_mulai_input" name="tgl_mulai_input" placeholder="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Tanggal Selesai</label>
                        <input type="date"  class="form-control" id="tgl_selesai_input" name="tgl_selesai_input" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Pendidikan Formal</label>
                        <select class="form-control" name="" id="">
                          <option value="" selected disabled>- pilih -</option>
                          <option>SMA</option>
                          <option>D3</option>
                          <option>S1</option>
                          <option>S2</option>
                          <option>S3</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Bukti Dukung Pendidikan Formal</label>
                        <input type="file" data-allowed-file-extensions="pdf" name="filependidikanformalinput" id="filependidikanformalinput"  data-buttonname="btn-secondary"  class="form-control filestyle">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Karya Ilmiah</label>
                    <input type="file" data-allowed-file-extensions="pdf" name="filependidikanformalinput" id="filependidikanformalinput"  data-buttonname="btn-secondary"  class="form-control filestyle">
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a class="btn btn-secondary" href="{{ route('instruktur.penyusun.index') }}" role="button">Kembali</a>
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
