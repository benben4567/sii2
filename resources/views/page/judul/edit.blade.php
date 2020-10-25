@extends('layouts.admin.app')
@section('title', 'Narasumber(Instruktur & SME)')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Ubah Data Judul</h4>
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

      <div class="page-content-wrapper">
        <div class="row">
          <div class="col-6">
            <div class="card m-b-20">
             
              <div class="card-body">
                <form method="post" action="/judul/{{$judul->id_judul}}" id="form-instruktur" target="votar">
                  @method('patch')
                  {{ csrf_field() }}
                  <div class="form-group row">
                    <label for="kode_judul" class="col-sm-4 col-form-label">Kode Judul</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('kode_judul') is-invalid @enderror" id="kode_judul" name="kode_judul" value="{{$judul->kode_judul}}">
                      @error('kode_judul')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kode_judul_lama" class="col-sm-4 col-form-label">Kode Judul Lama</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('kode_judul_lama') is-invalid @enderror" id="kode_judul_lama" name="kode_judul_lama" value="{{$judul->kode_judul_lama}}">
                      @error('kode_judul_lama')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="nama_judul" class="col-sm-4 col-form-label">Nama Judul</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('nama_judul') is-invalid @enderror" id="nama_judul" name="nama_judul"  value="{{$judul->nama_judul}}">
                      @error('nama_judul')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jenis_diklat" class="col-sm-4 col-form-label">Jenis Diklat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('jenis_diklat') is-invalid @enderror" id="jenis_diklat" name="jenis_diklat"  value="{{$judul->jenis_diklat}}">
                      @error('jenis_diklat')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sifat_diklat" class="col-sm-4 col-form-label">Sifat Diklat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('sifat_diklat') is-invalid @enderror" id="sifat_diklat" name="sifat_diklat"  value="{{$judul->sifat_diklat}}">
                      @error('sifat_diklat')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="dahan_profesi" class="col-sm-4 col-form-label">Dahan Profesi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('dahan_profesi') is-invalid @enderror" id="dahan_profesi" name="dahan_profesi"  value="{{$judul->dahan_profesi}}">
                      @error('dahan_profesi')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="level_profisiensi" class="col-sm-4 col-form-label">Level Profisiensi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('level_profisiensi') is-invalid @enderror" id="level_profisiensi" name="level_profisiensi"  value="{{$judul->level_profisiensi}}">
                      @error('level_profisiensi')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="penyelenggaraan" class="col-sm-4 col-form-label">Penyelenggaraan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('penyelenggaraan') is-invalid @enderror" id="penyelenggaraan" name="penyelenggaraan"  value="{{$judul->penyelenggaraan}}">
                      @error('penyelenggaraan')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="penanggung_jawab" class="col-sm-4 col-form-label">Penanggung Jawab</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab"  value="{{$judul->penanggung_jawab}}">
                      @error('penanggung_jawab')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>


                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="card m-b-20">
                <div class="card-body">
                 <div class="form-group row">
                    <label for="jenis_sertifikat" class="col-sm-4 col-form-label">Jenis Sertifikat</label>
                    <div class="col-sm-5">
                      <select class="form-control" id="jenis_sertifikat" name="jenis_sertifikat" value="{{$judul->jenis_sertifikat}}">
                        <option>WORKSHOP</option>
                        <option>DIKLAT</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tahun_terbit" class="col-sm-4 col-form-label">Tahun Terbit</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit"  value="{{$judul->tahun_terbit}}">
                      @error('tahun_terbit')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="durasi_hari_efektif" class="col-sm-4 col-form-label">Durasi Hari Efektif</label>
                    <div class="col-sm-4">
                      <input type="number" min="0" class="form-control " id="durasi_hari_efektif" name="durasi_hari_efektif"  value="{{$judul->durasi_hari_efektif}}">
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="total_jp_materi" class="col-sm-4 col-form-label">Total JP Materi</label>
                    <div class="col-sm-4">
                      <input type="number" min="0" class="form-control " id="total_jp_materi" name="total_jp_materi"  value="{{$judul->total_jp_materi}}">
                      
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="jml_pagu_anggaran" class="col-sm-4 col-form-label">Total Pagu Anggaran</label>
                    <div class="col-sm-4">
                      <input type="number" min="0" class="form-control " id="jml_pagu_anggaran" name="jml_pagu_anggaran"  value="{{$judul->jml_pagu_anggaran}}">
                      
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="cabang_profesi" class="col-sm-4 col-form-label">Cabang Profesi</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('cabang_profesi') is-invalid @enderror" id="cabang_profesi" name="cabang_profesi"  value="{{$judul->cabang_profesi}}">
                      @error('cabang_profesi')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="tanggal_input_judul" class="col-sm-4 col-form-label">Tanggal Input</label>
                    <div class="col-sm-6">
                      <input  type="date" class="form-control @error('tanggal_input_judul') is-invalid @enderror" id="tanggal_input_judul" name="tanggal_input_judul"  value="{{$judul->tanggal_input_judul}}">
                      @error('tanggal_input_judul')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>

               
                  <div class="form-group row" style="padding-top: 30px; text-align: right;">
                    <div class="col-sm-12">
                      <a class="btn btn-light" href="/judul" role="button">Batal</a>
                      <button type="submit"  class="btn btn-outline-primary" style="margin-left: 10px">Simpan</button>
                  </div>  
                </div>
              </form>
              </div>
            </div>
          </div> <!-- end col -->
         <!-- end row -->

      </div>
      <!-- end page content-->
    </div> <!-- container-fluid -->
  </div> <!-- content -->
</div> <!-- content -->


@section('js')

@endsection


@endsection
