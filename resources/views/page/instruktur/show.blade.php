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
                      <form action="">
                        <div class="form-group row">
                          <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ old('nip', $instruktur->nip) }}" name="nip">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="nama_instruktur" class="col-sm-4 col-form-label">Nama Instruktur</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_instruktur" value={{ old('nama_instruktur', $instruktur->nama_instruktur)}}>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tipeinstruktur" class="col-sm-4 col-form-label">Tipe Instruktur</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="tipe_instruktur" value={{ old('tipe_instruktur', $instruktur->tipe_instruktur)}}>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="udiklat" class="col-sm-4 col-form-label">Unit Diklat</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="udiklat" value={{ old('udiklat', $instruktur->udiklat)}}>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="jabatan_peserta" class="col-sm-4 col-form-label">Jabatan</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="jabatan_peserta" value={{ old('jabatan_peserta', $instruktur->jabatan_peserta) }} >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="grade" class="col-sm-4 col-form-label">Grade</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="grade" value="{{ old('grade', $instruktur->grade)}}" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="jeniskelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="jeniskelamin">
                              <option value='1' {{ (old('jeniskelamin', $instruktur->jeniskelamin) == '1') ? 'selected' : ''}}>Laki-laki</option>
                              <option value='2' {{ (old('jeniskelamin', $instruktur->jeniskelamin) == '2') ? 'selected' : ''}}>Perempuan</option>
                              <option value='3' {{ (old('jeniskelamin', $instruktur->jeniskelamin) == '3') ? 'selected' : ''}}> - </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="tempat_lahir" value={{ old('tempat_lahir', $instruktur->tempat_lahir)}}>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="no_hp" class="col-sm-4 col-form-label">No Hp:</label>
                          <div class="col-sm-8">
                            <input type="number" min="0" class="form-control" name="no_hp" value={{ old('no_hp', $instruktur->no_hp)}}>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" min="0" class="form-control" name="email" value={{ old('email', $instruktur->email)}}>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="unit_level1" class="col-sm-4 col-form-label">Unit Induk</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="unit_level1" value="{{ old('unit_level1', $instruktur->unit_level1) }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="pendidikan" value="{{ old('pendidikan', $instruktur->pendidikan ) }}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="no_ktp" class="col-sm-4 col-form-label">No KTP</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="no_ktp" value={{ old('no_ktp', $instruktur->no_ktp) }}>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="no_npwp" class="col-sm-4 col-form-label">NPWP</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="no_npwp" value={{ old('no_npwp', $instruktur->no_npwp) }} >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="level_instruktur" class="col-sm-4 col-form-label">Level Instruktur</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="level_instruktur" value={{ old('level_instruktur', $instruktur->level_instruktur) }}>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="bank" class="col-sm-4 col-form-label">Bank</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="bank" value={{ old('bank', $instruktur->bank) }}>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="no_rekening" class="col-sm-4 col-form-label">No Rekening</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="no_rekening" value={{ old('no_rekening', $instruktur->no_rekening) }}>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="atas_nama_rekening" class="col-sm-4 col-form-label">Atas Nama Rekening</label>
                          <div class="col-sm-8">
                            <input type="text" min="0" class="form-control" name="atas_nama_rekening" value={{ old('atas_nama_rekening', $instruktur->atas_nama_rekening) }}>
                          </div>
                        </div>
                      </form>
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
