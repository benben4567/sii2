@extends('layouts.admin.app')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Data Instruktur</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            
          </ol>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="page-content-wrapper">
      <div class="row">
        
        <div class="col-md-12 col-lg-12">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                @foreach($instruktur as $i)
                <label style="font-size: 15px;"><b>DATA {{ $i->nama_instruktur }}</b></label>
                <div class="col-md-12">
                  <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                      <table class="table  nowrap table-narasumber" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                        <!-- Identitas -->
                        <tbody>
                          <tr>
                            <th>NIP</th>
                            <th>:</th>
                            <th>{{ $i->nip }}</th>
                          </tr>
                          <tr>
                            <th>Nama Instruktur</th>
                            <th>:</th>
                            <th>{{ $i->nama_instruktur }}</th>
                          </tr>
                          <tr>
                            <th>Tipe Instruktur</th>
                            <th>:</th>
                            <th>{{ $i->tipe_instruktur }}</th>
                          </tr>
                          <tr>
                            <th>Udiklat</th>
                            <th>:</th>
                            <th>{{ $i->udiklat }}</th>
                          </tr>
                          <tr>
                            <th>Jabatan</th>
                            <th>:</th>
                            <th>{{ $i->jabatan }}</th>
                          </tr>
                          <tr>
                            <th>Grade</th>
                            <th>:</th>
                            <th>{{ $i->grade }}</th>
                          </tr>
                          <tr>
                            <th>Jenis Kelamin</th>
                            <th>:</th>
                            <th>{{ $i->jenis_kelamin }}</th>
                          </tr>
                          <tr>
                            <th>Tempat Tanggal Lahir</th>
                            <th>:</th>
                            <th>{{ $i->tempat_lahir }}</th>
                          </tr>
                          <tr>
                            <th>Cabang Profesi</th>
                            <th>:</th>
                            <th>{{ $i->cabang_profesi }}</th>
                          </tr>
                          <tr>
                            <th>No Handphone</th>
                            <th>:</th>
                            <th>{{ $i->no_hp }}</th>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <th>:</th>
                            <th>{{ $i->email }}</th>
                          </tr>
                          <tr>
                            <th>Unit Induk</th>
                            <th>:</th>
                            <th>{{ $i->unit_induk }}</th>
                          </tr>
                          <tr>
                            <th>Pendidikan</th>
                            <th>:</th>
                            <th>{{ $i->pendidikan }}</th>
                          </tr>
                          <tr>
                            <th>No KTP</th>
                            <th>:</th>
                            <th>{{ $i->no_ktp }}</th>
                          </tr>
                          <tr>
                            <th>No NPWP</th>
                            <th>:</th>
                            <th>{{ $i->no_npwp }}</th>
                          </tr>
                          <tr>
                            <th>Level Instruktur</th>
                            <th>:</th>
                            <th>{{ $i->level_instruktur }}</th>
                          </tr>
                          <tr>
                            <th>Bank</th>
                            <th>:</th>
                            <th>{{ $i->bank }}</th>
                          </tr>
                          <tr>
                            <th>No Rekening</th>
                            <th>:</th>
                            <th>{{ $i->no_rekening }}</th>
                          </tr>
                          <tr>
                            <th>Nama Rekening</th>
                            <th>:</th>
                            <th>{{ $i->nama_rekening }}</th>
                          </tr>
                          <tr>
                            <th>Status</th>
                            <th>:</th>
                            <th>{{ $i->status }}</th>
                          </tr>
                        </tbody>
                        @endforeach

                        <!-- Pengalaman Instruktur -->
                        @foreach($narasumber as $n)
                        <tbody>
                            <tr>
                              <th>Pengalaman Bidang Materi</th>
                              <th>:</th>
                              <th>{{ $n->pengalaman_bidang }}</th>
                            </tr>
                            <tr>
                              <th>Judul Sertifikat Bidang</th>
                              <th>:</th>
                              <th>{{ $n->judul_sertifikat_pembelajaran }}</th>                            
                            </tr>
                            <tr>
                              <th>File Sertifikat Bidang</th>
                              <th>:</th>
                              <th><strong><a href="../assets/file/narasumber/file_sertifikat_pembelajaran/{{ $n->file_sertifikat_pembelajaran }}" target="_blank">{{ $n->file_sertifikat_pembelajaran }}</a> </strong></th>
                            </tr>
                            <tr>
                              <th>Pendidikan Formal</th>
                              <th>:</th>
                              <th>{{ $n->pendidikan_formal }}</th>
                            </tr>
                            <tr>
                              <th>File Pendidikan Formal</th>
                          <th>:</th><th><strong><a href="../assets/file/narasumber/file_ijazah/{{ $n->file_pendidikan_formal }}" target="_blank">{{ $n->file_pendidikan_formal }}</a></strong></th>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

       
                   
       
        <div class="col-md-12 col-lg-12">
          <div class="card m-b-20">
            <div class="card-body">
              <div class="form-group">
                <label>Evaluasi Instruktur</label>
                <div class="col-md-12">
                  <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                      <table class="table  nowrap table-narasumber" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                        <tbody>
                        	<tr>
                        		<th>Pengalmaan Magang</th>
                        		<th>:</th>
                          <th>Dummy Text</th>
                        	</tr>
                        	<tr>
                        		<th>Judul Sertifikat Bidang</th>
                        		<th>:</th>
                        		<th>sdfsf</th>                        		
                        	</tr>
                        	<tr>
                        		<th>File Sertifikat Bidang</th>
                        		<th>:</th>
                        		<th>sdfsf</th>
                        	</tr>
                        	<tr>
                        		<th>Pendidikan Formal</th>
                        		<th>:</th>
                        		<th>sdfsf</th>
                        	</tr>
                        	<tr>
                        		<th>File Pendidikan Formal</th>
                        		<th>:</th>
                        		<th>sdfsf</th>
                        	</tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end col -->
        </div>
      </div>
    </div> <!-- end row -->
  </div>
  <!-- end page content-->
</div> <!-- content -->
</div> <!-- content -->
@endsection