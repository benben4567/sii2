@extends('layouts.app')
@section('title', 'Instruktur')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Review Judul Pembelajaran</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Review Judul Pembelajaran
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
                  <a class="nav-link active" id="kurikulum-tab" data-toggle="tab" href="#kurikulum" role="tab" aria-controls="kurikulum" aria-selected="true">Kurikulum</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="silabus-tab" data-toggle="tab" href="#silabus" role="tab" aria-controls="silabus" aria-selected="false">Silabus</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="hadnout-tab" data-toggle="tab" href="#hadnout" role="tab" aria-controls="hadnout" aria-selected="false">Handout</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="materitayang-tab" data-toggle="tab" href="#materitayang" role="tab" aria-controls="materitayang" aria-selected="false">Materi Tayang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="petunjukinstruktur-tab" data-toggle="tab" href="#petunjukinstruktur" role="tab" aria-controls="petunjukinstruktur" aria-selected="false">Petunjuk Instruktur</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="petunjukpenyelenggara-tab" data-toggle="tab" href="#petunjukpenyelenggara" role="tab" aria-controls="petunjukpenyelenggara" aria-selected="false">Petunjuk Penyelenggara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="toolsevaluasi-tab" data-toggle="tab" href="#toolsevaluasi" role="tab" aria-controls="toolsevaluasi" aria-selected="false">Tools Evaluasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="petunjukpraktik-tab" data-toggle="tab" href="#petunjukpraktik" role="tab" aria-controls="petunjukpraktik" aria-selected="false">Petunjuk Praktik</a>
                </li>
              </ul>
              

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="kurikulum" role="tabpanel" aria-labelledby="kurikulum-tab">
                    <div class="card mt-2">
                        <div class="card-header">
                          <h6>Pengalaman Magang</h6>
                        </div>
                        <div class="card-body">
                          <table class="table table-bordered" id="table-kurikulum" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tujuan</th>
                                <th>Syarat Peserta</th>
                                <th>SKP</th>
                                <th>Metode</th>
                                <th>Lingkup Bahasan</th>
                                <th>Stategi</th>
                                <th>Level</th>
                                <th>Sertifikat</th>
                                <th>Refernsi</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
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
        var table1 = $('#table-kurikulum').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "",
          "type" : "GET"
        },
        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'tujuan', name: 'tujuan'},
              {data: 'syarat_peserta', name: 'syarat_peserta'},
              {data: 'skp', name: 'skp'},
              {data: 'metode', name: 'metode'},
              {data: 'lingkup', name: 'lingkup'},
              {data: 'strategi', name: 'strategi'},
              {data: 'level', name: 'level'},
              {data: 'sertifikat', name: 'sertifikat'},
              {data: 'referensi', name: 'referensi'}
        ],
      });
    });
</script>
  {{-- <script>
    $(document).ready(function () {
      
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


    });
  </script> --}}
@endpush
