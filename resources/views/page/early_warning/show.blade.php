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
              {{$judul->nama_judul ?? ''}}
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
                  <a class="nav-link" id="handout-tab" data-toggle="tab" href="#handout" role="tab" aria-controls="handout" aria-selected="false">Handout</a>
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
                {{-- Kurikulum --}}
                <div class="tab-pane active" id="kurikulum" role="tabpanel" aria-labelledby="kurikulum-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Review Kurikulum</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-kurikulum" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Pembelajaran</th>
                            <th>Instruktur</th>
                            <th>Tujuan</th>
                            <th>Syarat Peserta</th>
                            <th>SKP</th>
                            <th>Metode</th>
                            <th>Lingkup Bahasan</th>
                            <th>Stategi</th>
                            <th>Level</th>
                            <th>Sertifikat</th>
                            <th>Referensi</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{-- End kurikulum --}}

                {{-- Silabus --}}
                <div class="tab-pane" id="silabus" role="tabpanel" aria-labelledby="silabus-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Review silabus</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-silabus" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Pembelajaran</th>
                            <th>Instruktur</th>
                            <th>Pokok/Sub Bahasan</th>
                            <th>Hasil Pelatihan</th>
                            <th>Kriteria Penilaian</th>
                            <th>Metode Penilaian</th>
                            <th>Waktu</th>
                            <th>Referensi</th>
                            <th>Waktu input</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{-- End silabus --}}

                {{-- Handout --}}
                <div class="tab-pane" id="handout" role="tabpanel" aria-labelledby="handout-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Review Handout</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-handout" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Pembelajaran</th>
                            <th>Instruktur</th>
                            <th>Previous Handout</th>
                            <th>Updated Handout</th>
                            <th>Waktu input</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{-- End handout --}}


                {{-- Materi Tayang --}}
                <div class="tab-pane" id="materitayang" role="tabpanel" aria-labelledby="materitayang-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Review Materi Tayang</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-materitayang" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Pembelajaran</th>
                            <th>Instruktur</th>
                            <th>Previous Materi Tayang</th>
                            <th>Updated Materi Tayang</th>
                            <th>Waktu input</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{-- End Materi Tayang --}}

                {{-- Petunjuk Instruktur --}}
                <div class="tab-pane" id="petunjukinstruktur" role="tabpanel" aria-labelledby="petunjukinstruktur-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Review Petunjuk Instruktur</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-petunjukinstruktur" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Pembelajaran</th>
                            <th>Instruktur</th>
                            <th>Previous Petunjuk Instruktur</th>
                            <th>Updated Petunjuk Instruktur</th>
                            <th>Waktu input</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{-- End Petunjuk Instruktur --}}
                

                {{-- Petunjuk Penyelenggara --}}
                <div class="tab-pane" id="petunjukpenyelenggara" role="tabpanel" aria-labelledby="petunjukpenyelenggara-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Review Petunjuk Penyelenggara</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-petunjukpenyelenggara" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Pembelajaran</th>
                            <th>Instruktur</th>
                            <th>Previous Petunjuk Penyelenggara</th>
                            <th>Updated Petunjuk Penyelenggara</th>
                            <th>Waktu input</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{-- End Petunjuk Penyelenggara --}}


                {{-- Tools Evaluasi --}}
                <div class="tab-pane" id="toolsevaluasi" role="tabpanel" aria-labelledby="toolsevaluasi-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Review Tools Evaluasi</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-toolsevaluasi" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Pembelajaran</th>
                            <th>Instruktur</th>
                            <th>Previous Tools Evaluasi</th>
                            <th>Updated Tools Evaluasi</th>
                            <th>Waktu input</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{-- End Tools Evaluasi --}}

                {{-- Petunjuk Praktik --}}
                <div class="tab-pane" id="petunjukpraktik" role="tabpanel" aria-labelledby="petunjukpraktik-tab">
                  <div class="card mt-2">
                    <div class="card-header">
                      <h6>Review Petunjuk Praktik</h6>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered" id="table-petunjukpraktik" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Judul Pembelajaran</th>
                            <th>Instruktur</th>
                            <th>Previous Petunjuk Praktik</th>
                            <th>Updated Petunjuk Praktik</th>
                            <th>Waktu input</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                {{-- End Petunjuk Praktik --}}


              </div>

              <!-- Tab panes -->

              
            {{-- End Silabus --}}


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
          "url" : "{{ '/warning/show/'.$judul->judul_id.'/kurikulum' }}",
          "type" : "GET"
        },

        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
              {data: 'tujuan', name: 'tujuan'},
              {data: 'syarat_peserta', name: 'syarat_peserta'},
              {data: 'skp', name: 'skp'},
              {data: 'metode', name: 'metode'},
              {data: 'lingkup', name: 'lingkup'},
              {data: 'strategi', name: 'strategi'},
              {data: 'level', name: 'level'},
              {data: 'sertifikat', name: 'sertifikat'},
              {data: 'referensi', name: 'referensi'}
        ]
      });

      var table2 = $('#table-silabus').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/warning/show/'.$judul->judul_id.'/silabus' }}",
          "type" : "GET"
        },

        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
              {data: 'bahasan', name: 'bahasan'},
              {data: 'hasil_pelatihan', name: 'hasil_pelatihan'},
              {data: 'kriteria_penilaian', name: 'kriteria_penilaian'},
              {data: 'metode_penilaian', name: 'metode_penilaian'},
              {data: 'waktu', name: 'waktu'},
              {data: 'referensi', name: 'referensi'}
        ]
      });

      var table3 = $('#table-handout').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/warning/show/'.$judul->judul_id.'/handout' }}",
          "type" : "GET"
        },

        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
              {data: 'handout_sebelum', name: 'handout_sebelum'},
              {data: 'handout_new', name: 'handout_new'}
        ]
      });
      
      var table4 = $('#table-materitayang').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/warning/show/'.$judul->judul_id.'/materitayang' }}",
          "type" : "GET"
        },

        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
              {data: 'materitayang_sebelum', name: 'materitayang_sebelum'},
              {data: 'materitayang_new', name: 'materitayang_new'}
        ]
      });

      var table5 = $('#table-petunjukinstruktur').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/warning/show/'.$judul->judul_id.'/petunjukinstruktur' }}",
          "type" : "GET"
        },

        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
              {data: 'petunjukinstruktur_sebelum', name: 'petunjukinstruktur_sebelum'},
              {data: 'petunjukinstruktur_new', name: 'petunjukinstruktur_new'}
        ]
      });

      var table6 = $('#table-petunjukpenyelenggara').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/warning/show/'.$judul->judul_id.'/petunjukpenyelenggara' }}",
          "type" : "GET"
        },

        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
              {data: 'petunjukpenyelenggara_sebelum', name: 'petunjukpenyelenggara_sebelum'},
              {data: 'petunjukpenyelenggara_new', name: 'petunjukpenyelenggara_new'}
        ]
      });

      var table7 = $('#table-toolsevaluasi').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/warning/show/'.$judul->judul_id.'/toolsevaluasi' }}",
          "type" : "GET"
        },

        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
              {data: 'toolsevaluasi_sebelum', name: 'toolsevaluasi_sebelum'},
              {data: 'toolsevaluasi_new', name: 'toolsevaluasi_new'}
        ]
      });

      var table8 = $('#table-petunjukpraktik').DataTable({
        "responsive" : true,
        "processing" : true,
        "serverside" : true,
        "ajax":{
          "url" : "{{ '/warning/show/'.$judul->judul_id.'/petunjukpraktik' }}",
          "type" : "GET"
        },

        "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'nama_judul', name: 'nama_judul'},
              {data: 'atas_nama_rekening', name: 'atas_nama_rekening'},
              {data: 'petunjukpraktik_sebelum', name: 'petunjukpraktik_sebelum'},
              {data: 'petunjukpraktik_new', name: 'petunjukpraktik_new'}
        ]
      });


    });
</script>
@endpush
