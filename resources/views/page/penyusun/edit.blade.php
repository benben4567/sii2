@extends('layouts.app')
@section('title', 'Penyusun')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Ubah Data Penyusun</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Penyusun
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

                <form method="post" action="/penyusun/{{$penyusun->id_penyusun}}" id="form-penyusun" target="votar">
                   @method('patch')
                  {{ csrf_field() }}
                  <div class="form-group row">
                    <label for="nip" class="col-sm-4 col-form-label">Nip</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{$penyusun->nip}}">
                      @error('nip')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>

                  </div>
                   <div class="form-group row">
                    <label for="nama_penyusun" class="col-sm-4 col-form-label">Nama Penyusun</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('nama_penyusun') is-invalid @enderror" id="nama_penyusun" name="nama_penyusun"  value="{{$penyusun->nama_penyusun }}">
                      @error('nama_penyusun')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tipe_penyusun" class="col-sm-4 col-form-label">Tipe Penyusun</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('tipe_penyusun') is-invalid @enderror" id="tipe_penyusun" name="tipe_penyusun"  value="{{$penyusun->tipe_penyusun }}">
                      @error('tipe_penyusun')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="udiklat" class="col-sm-4 col-form-label">Udiklat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('udiklat') is-invalid @enderror" id="udiklat" name="udiklat"  value="{{$penyusun->udiklat}}">
                      @error('udiklat')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan"  value="{{$penyusun->jabatan}}">
                      @error('jabatan')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="grade" class="col-sm-4 col-form-label">Grade</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade"  value="{{$penyusun->grade}}">
                      @error('grade')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                      <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{$penyusun->jenis_kelamin }}">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir"   value="{{$penyusun->tempat_lahir  }}">
                      @error('tempat_lahir')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="cabang_profesi" class="col-sm-4 col-form-label">Cabang Profesi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('cabang_profesi') is-invalid @enderror" id="cabang_profesi" name="cabang_profesi"  value="{{$penyusun->cabang_profesi }}">
                      @error('cabang_profesi')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_hp" class="col-sm-4 col-form-label">No Handphone</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp"  value="{{$penyusun->no_hp }}">
                      @error('no_hp')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>

              </div>
            </div>
          </div> <!-- end col -->
         <!-- end row -->


        <div class="col-6">
          <div class="card m-b-20">
            <div class="card-body">

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{$penyusun->email }}">
                      @error('email')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="unit_induk" class="col-sm-4 col-form-label">Unit Induk</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('unit_induk') is-invalid @enderror" id="unit_induk" name="unit_induk"  value="{{$penyusun->unit_induk }}">
                      @error('unit_induk')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan"  value="{{$penyusun->pendidikan }}">
                      @error('pendidikan')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_ktp" class="col-sm-4 col-form-label">Nomor Ktp</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp"  value="{{$penyusun->no_ktp }}">
                    @error('no_ktp')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_npwp" class="col-sm-4 col-form-label">Nomor NPWP</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('no_npwp') is-invalid @enderror" id="no_npwp" name="no_npwp"  value="{{$penyusun->no_npwp }}">
                    @error('no_npwp')
                      <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="level_penyusun" class="col-sm-4 col-form-label">Level Penyusun</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('level_penyusun') is-invalid @enderror" id="level_penyusun" name="level_penyusun"  value="{{$penyusun->level_penyusun }}">
                      @error('level_penyusun')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="bank" class="col-sm-4 col-form-label">Bank</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('bank') is-invalid @enderror" id="bank" name="bank"  value="{{$penyusun->bank }}">
                      @error('bank')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="no_rekening" class="col-sm-4 col-form-label">Nomor Rekening</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('no_rekening') is-invalid @enderror" id="no_rekening" name="no_rekening"  value="{{$penyusun->no_rekening }}"    >
                      @error('no_rekening')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_rekening" class="col-sm-4 col-form-label">Nama Rekening</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" id="nama_rekening" name="nama_rekening"  value="{{$penyusun->nama_rekening }}"    >
                      @error('nama_rekening')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-4">
                      <select class="form-control" id="status" name="status" value="{{$penyusun->status }}">
                        <option>Aktif</option>
                        <option>Tdk Aktif</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row" style="padding-top: 30px; text-align: right;">
                    <div class="col-sm-12">
                      <a class="btn btn-light" href="/penyusun" role="button">Batal</a>

                      <button type="submit"  class="btn btn-outline-primary" style="margin-left: 10px">Simpan</button>

                    </div>

                  </div>
              </form>
            </div>

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
