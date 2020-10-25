@extends('layouts.app')
@section('title', 'Materi')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Tambah Data Materi</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Materi
            </li>
          </ol>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="page-content-wrapper">

      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-6">
            <div class="card m-b-20">
              <div class="card-body">
                <form method="post" action="/materi" id="form-instruktur" target="votar">
                  {{ csrf_field() }}
                  <div class="form-group row">
                    <label for="kode_materi" class="col-sm-4 col-form-label">Kode Materi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('kode_materi') is-invalid @enderror" id="kode_materi" name="kode_materi" value="{{old('kode_materi')}}">
                      @error('kode_materi')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jenis_materi" class="col-sm-4 col-form-label">Jenis Materi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('jenis_materi') is-invalid @enderror" id="jenis_materi" name="jenis_materi" value="{{old('jenis_materi')}}">
                      @error('jenis_materi')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="materi" class="col-sm-4 col-form-label">Materi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('materi') is-invalid @enderror" id="materi" name="materi"  value="{{old('materi')}}">
                      @error('materi')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="durasi" class="col-sm-4 col-form-label">Durasi</label>
                    <div class="col-sm-4">
                      <input type="number" min="0" class="form-control @error('durasi') is-invalid @enderror" id="durasi" name="durasi"  value="{{old('durasi')}}">
                      @error('durasi')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nilai_minimum" class="col-sm-4 col-form-label">Nilai Minimum</label>
                    <div class="col-sm-4">
                      <input type="number" min="0" class="form-control @error('nilai_minimum') is-invalid @enderror" id="nilai_minimum" name="nilai_minimum"  value="{{old('nilai_minimum')}}">
                      @error('nilai_minimum')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="prosentase_pembayaran" class="col-sm-4 col-form-label">Prosentase Pembayaran</label>
                    <div class="col-sm-4">
                      <input type="number" min="0" class="form-control @error('prosentase_pembayaran') is-invalid @enderror" id="prosentase_pembayaran" name="prosentase_pembayaran"  value="{{old('prosentase_pembayaran')}}">
                      @error('prosentase_pembayaran')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="diinput" class="col-sm-4 col-form-label">Diinput Oleh</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('diinput') is-invalid @enderror" id="diinput" name="diinput"  value="{{old('diinput')}}">
                      @error('diinput')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row" style="padding-top: 30px; text-align: right;">
                    <div class="col-sm-12">
                      <a class="btn btn-light" href="/materi" role="button">Batal</a>
                      <button type="submit"  class="btn btn-outline-primary" style="margin-left: 10px">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
          <!-- end row -->


              </form>
          </div>

        </div>
      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->


@section('js')

@endsection


@endsection
