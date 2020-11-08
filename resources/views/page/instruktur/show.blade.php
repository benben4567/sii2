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
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sertifikasi</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" id="jurnal-ilmiah-tab" data-toggle="tab" href="#jurnal-ilmiah">Jurnal Ilmiah</a>
                    <a class="dropdown-item" id="kompetensi-tab" data-toggle="tab" href="#kompetensi">Kompetensi</a>
                    <a class="dropdown-item" id="bidang-tab" data-toggle="tab" href="#bidang">Bidang</a>
                    <a class="dropdown-item" id="toefl-tab" data-toggle="tab" href="#toefl">Toefl</a>
                  </div>
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
                      <table class="table table-bordered" id="table-magang" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tema</th>
                            <th>Tempat</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                            <th>Data Dukung</th>
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
                      <table class="table table-bordered" id="table-mengajar" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Tempat Mengajar</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
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
                      <table class="table table-bordered" id="table-pendalaman-materi" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Materi</th>
                            <th>Kode Materi</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                            <th>Penyelenggara</th>
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
                      <table class="table table-bordered" id="table-narasumber" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Pengalaman Bidang</th>
                            <th>Pendidikan Formal</th>
                            <th>File Pendidikan Formal</th>
                            <th>File Sertifikat Pembelajaran</th>
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
                      <table class="table table-bordered" id="table-penyusun" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                            <th>File Karya Tulis</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="bidang" role="tabpanel" aria-labelledby="bidang-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Sertifikasi Bidang</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-bidang" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Sertifikasi</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Masa Berlaku</th>
                            <th>File</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="kompetensi" role="tabpanel" aria-labelledby="kompetensi-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Sertifikasi Kompetensi</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-kompetensi" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Sertifikasi</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Masa Berlaku</th>
                            <th>File</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              <div class="tab-pane" id="jurnal-ilmiah" role="tabpanel" aria-labelledby="jurnal-ilmiah-tab">
                <div class="card mt-2">
                  <div class="card-header">
                    <h6>Jurnal Ilmiah</h6>
                  </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-jurnal-ilmiah" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tingkatan</th>
                            <th>Lembaga Penyelenggara</th>
                            <th>Tanggal Submit</th>
                            <th>Tanggal Presentasi</th>
                            <th>File Jurnal Ilmiah</th>
                            <th>File Abstrak</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="toefl" role="tabpanel" aria-labelledby="toefl-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Sertifikasi Toefl</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-toefl" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Skor Toefl</th>
                            <th>Tipe</th>
                            <th>Lembaga Penyelenggara</th>
                            <th>Masa Berlaku</th>
                            <th>File Sertifikat</th>
                          </tr>
                        </thead>

                        <tbody>
                        </tbody>

                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Skor Toefl</th>
                            <th>Tipe</th>
                            <th>Lembaga Penyelenggara</th>
                            <th>Masa Berlaku</th>
                            <th>File Sertifikat</th>
                          </tr>
                        </tfoot>
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
  <script>
    $(document).ready(function () {
      var table1 = $('#table-magang').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/magang' }}",
          "type" : "GET"
        },
        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'tema_magang', name: 'tema_magang'},
              {data: 'tempat_magang', name: 'tempat_magang'},
              {data: 'tgl_mulai', name: 'tgl_mulai'},
              {data: 'tgl_selesai', name: 'tgl_selesai'},
              {data: 'nama_file', name: 'nama_file'},
        ],
        "columnDefs": [
        {
          "targets" : 5,
          "className": 'text-center',
          "data" : 'nama_file',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/file_magang/${data}"><i class="fas fa-download"></i></a>` ;
          }
        }
      ]
      });

      var table2 = $('#table-mengajar').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/mengajar' }}",
          "type" : "GET"
        },
        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'tempat_mengajar', name: 'tempat_mengajar'},
              {data: 'tgl_mulai', name: 'tgl_mulai'},
              {data: 'tgl_selesai', name: 'tgl_selesai'},
        ],
      });

      var table3 = $('#table-pendalaman-materi').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/materi' }}",
          "type" : "GET"
        },
        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'materi', name: 'materi'},
              {data: 'kode_materi', name: 'kode_materi'},
              {data: 'tgl_mulai', name: 'tgl_mulai'},
              {data: 'tgl_selesai', name: 'tgl_selesai'},
              {data: 'penyelenggara', name: 'penyelenggara'},
        ],
      });

      var table4 = $('#table-narasumber').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/narasumber' }}",
          "type" : "GET"
        },
        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'pengalaman_bidang', name: 'pengalaman_bidang'},
              {data: 'pendidikan_formal', name: 'pendidikan_formal'},
              {data: 'file_pendidikan_formal', name: 'file_pendidikan_formal'},
              {data: 'file_sertifikat_pembelajaran', name: 'file_sertifikat_pembelajaran'},
        ],
        "columnDefs": [
        {
          "targets" : 3,
          "className": 'text-center',
          "data" : 'file_pendidikan_formal',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/narasumber/file_pendidikan_formal/${data}"><i class="fas fa-download"></i></a>` ;
          }
        },
        {
          "targets" : 4,
          "className": 'text-center',
          "data" : 'file_sertifikat_pembelajaran',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/narasumber/file_sertifikat_pembelajaran/${data}"><i class="fas fa-download"></i></a>` ;
          }
        }
      ]
      });

      var table5 = $('#table-penyusun').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/penyusun' }}",
          "type" : "GET"
        },
        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'tanggal_mulai', name: 'tanggal_mulai'},
              {data: 'tanggal_selesai', name: 'tanggal_selesai'},
              {data: 'file_bukti_karyatulis', name: 'file_bukti_karyatulis'},
        ],
        "columnDefs": [
        {
          "targets" : 4,
          "className": 'text-center',
          "data" : 'file_bukti_karyatulis',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/penyusun/file_bukti_karyatulis/${data}"><i class="fas fa-download"></i></a>` ;
          }
        }
      ]
      });

      var table6 = $('#table-bidang').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/bidang' }}",
          "type" : "GET"
        },
        "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_sertifikasi', name: 'nama_sertifikasi'},
            {data: 'tgl_pelaksanaan', name: 'tgl_pelaksanaan'},
            {data: 'batas_sertifikasi', name: 'batas_sertifikasi'},
            {data: 'nama_file', name: 'nama_file'}
      ],

      "columnDefs": [
        {
          "targets" : 4,
          "className": 'text-center',
          "data" : 'nama_file',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/file_bidang/${data}"><i class="fas fa-download"></i></a>` ;
          }
        }
      ]
      });

      var table7 = $('#table-kompetensi').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/kompetensi' }}",
          "type" : "GET"
        },
        "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_sertifikasi', name: 'nama_sertifikasi'},
            {data: 'tgl_pelaksanaan', name: 'tgl_pelaksanaan'},
            {data: 'batas_sertifikasi', name: 'batas_sertifikasi'},
            {data: 'nama_file', name: 'nama_file'}
      ],
      "columnDefs": [
        {
          "targets" : 4,
          "className": 'text-center',
          "data" : 'nama_file',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/file_sertifikasi_bidang/${data}"><i class="fas fa-download"></i></a>` ;
          }
        }
      ]
      });

      var table8 = $('#table-jurnal-ilmiah').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/jurnalilmiah/' }}",
          "type" : "GET"
        },
        "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_judul', name: 'nama_judul'},
            {data: 'lembaga_penyelenggara', name: 'lembaga_penyelenggara'},
            {data: 'tingkatan', name: 'tingkatan'},
            {data: 'tanggal_submit', name: 'tanggal_submit'},
            {data: 'tanggal_presentasi', name: 'tanggal_presentasi'},
      ],
      "columnDefs": [
        {
          "targets" : 6,
          "className": 'text-center',
          "data" : 'nama_file',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/jurnalilmiah/${data}"><i class="fas fa-download"></i></a>` ;
          }
        },
        {
          "targets" : 7,
          "className": 'text-center',
          "data" : 'nama_file',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/jurnalilmiah/abstrak/${data}"><i class="fas fa-download"></i></a>` ;
          }
        }
      ]
      });

      var table9 = $('#table-toefl').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/instruktur/show/'.$instruktur->nip.'/toefl/' }}",
          "type" : "GET"
        },
        "columns": [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'skor', name: 'skor'},
            {data: 'tipe', name: 'tipe'},
            {data: 'lembaga_penyelenggara', name: 'lembaga_penyelenggara'},
            {data: 'masa_berlaku', name: 'masa_berlaku'}
      ],
      "columnDefs": [
        {
          "targets" : 5,
          "className": 'text-center',
          "data" : 'nama_file',
          "render": function ( data, type, row, meta ) {
            return `<a class="btn btn-sm btn-primary" role="button" target="_blank" href="/storage/file/toefl/${data}"><i class="fas fa-download"></i></a>` ;
          }
        }
      ]
      });


    });
  </script>
@endpush
