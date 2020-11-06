@extends('layouts.app')
@section('title', 'Review Materi')
@section('content')

<div class="content showKategori">
<div class="container-fluid">
  <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title title-review">Review Materi</h4>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
          </li>

          <li class="breadcrumb-item active">
          {{$judul[0]['judul']->nama_judul ?? ''}}
          </li>
        </ol>
        </div>
      </div>
  </div>

  <div class="page-content-wrapper">
    <div class="row">
      <div class="col-sm-3">
          <div class="card">
          <div class="card-body mx-auto">
              <h6 class="card-title">Kurikulum</h6>
              <img src="{{ url('assets\icons\kurikulum.png')}}" width="90px"><br>
          </div>
          <button type="submit" class="btn btn-primary kurikulum" data-toggle="modal" data-target="#kurikulum">Open</button>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="card">
          <div class="card-body mx-auto">
              <h6 class="card-title">Silabus</h6>
              <img src="{{ url('assets\icons\silabus.png')}}" width="90px"><br>
          </div>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#silabus">Open</button>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="card">
          <div class="card-body mx-auto">
              <h6 class="card-title">Handout</h6>
              <img src="{{ url('assets\icons\handout.png')}}" width="90px"><br>
          </div>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#handout">Open</button>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="card">
          <div class="card-body mx-auto">
              <h6 class="card-title">Materi Tayang</h6>
              <img src="{{ url('assets\icons\materitayang.png')}}" width="90px"><br>
          </div>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#materitayang">Open</button>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="card">
          <div class="card-body mx-auto">
              <h6 class="card-title">Petunjuk Instruktur</h6>
              <img src="{{ url('assets\icons\instructor.png')}}" width="90px"><br>
          </div>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#petunjukinstruktur">Open</button>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="card">
          <div class="card-body mx-auto">
              <h6 class="card-title">Penyelenggara</h6>
              <img src="{{ url('assets\icons\professor.png')}}" width="90px"><br>
          </div>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#petunjukpenyelenggara">Open</button>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="card">
          <div class="card-body mx-auto">
              <h6 class="card-title">Tools Evaluasi</h6>
              <img src="{{ url('assets\icons\checklist.png')}}" width="90px"><br>
          </div>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#toolseval">Open</button>
          </div>
      </div>

      <div class="col-sm-3">
          <div class="card">
          <div class="card-body mx-auto">
              <h6 class="card-title">Petunjuk Praktik</h6>
              <img src="{{ url('assets\icons\prac.png')}}" width="90px"><br>
          </div>
          <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#praktik">Open</button>
          </div>
      </div>

    </div>
  </div>


<!-- Modal -->
	<!-- Kurikulum -->
	<div class="modal fade" id="kurikulum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="kurikulum-title">{{$judul[0]['judul']->nama_judul ?? ''}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/review/kurikulum" method="post">
          @csrf
          <div class="modal-body">
		  <input type="hidden" value="{{$judul[0]['judul_id']}}" name="judul_id">
		  <input type="hidden" value="{{Auth::user()->instruktur->id}}" id="instruktur_id" name="instruktur_id"/>
            <div class="form-group">
              <label for="tujuan" class="col-form-label">Tujuan:</label>
              <input type="text" class="form-control" id="tujuan" name="tujuan">
            </div>

            <div class="form-group">
              <label for="syarat_peserta" class="col-form-label">Persyaratan Peserta:</label>
              <textarea class="form-control" id="syarat_peserta" name="syarat_peserta"></textarea>
            </div>

            <div class="form-group">
              <label for="skp" class="col-form-label">Standar Kompetisi:</label>
              <textarea class="form-control" id="skp" name="skp"></textarea>
            </div>

            <div class="form-group">
              <label for="metode" class="col-form-label">Metode Pembelajaran:</label>
              <textarea class="form-control" id="metode" name="metode"></textarea>
            </div>

            <div class="form-group">
              <label for="lingkup" class="col-form-label">Lingkup Bahasan:</label>
              <textarea class="form-control" id="lingkup" name="lingkup"></textarea>
            </div>

            <div class="form-group">
              <label for="strategi" class="col-form-label">Strategi Pelaksanaan:</label>
              <textarea class="form-control" id="strategi" name="strategi"></textarea>
            </div>

            <div class="form-group">
              <label for="level" class="col-form-label">Level Evaluasi:</label>
              <textarea class="form-control" id="level" name="level"></textarea>
            </div>

            <div class="form-group">
              <label for="sertifikat" class="col-form-label">Sertifikat:</label>
              <textarea class="form-control" id="sertifikat" name="sertifikat"></textarea>
            </div>

            <div class="form-group">
              <label for="referensi" class="col-form-label">Referensi:</label>
              <textarea class="form-control" id="referensi" name="referensi"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="kurikulum" class="btn btn-primary">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

	<!-- END KURIKULUM -->

	<!-- Silabus -->
		<div class="modal fade" id="silabus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">{{$judul[0]['judul']->nama_judul ?? ''}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="/review/silabus" method="post">
				@csrf
				<input type="hidden" value="{{$judul[0]['judul_id']}}" name="judul_id">
		  		<input type="hidden" value="{{Auth::user()->instruktur->id}}" id="instruktur_id" name="instruktur_id"/>
		          <div class="form-group">
		            <label for="bahasan" class="col-form-label">Pokok/Sub Pokok Bahasan:</label>
		            <input type="text" class="form-control" id="bahasan" name="bahasan">
		          </div>
		          <div class="form-group">
		            <label for="hasil_pelatihan" class="col-form-label">Hasil Pelatihan:</label>
		            <textarea class="form-control" id="hasil_pelatihan" name="hasil_pelatihan"></textarea>
		          </div>
		          <div class="form-group">
		            <label for="kriteria_penilaian" class="col-form-label">Kriteria Penilaian:</label>
		            <textarea class="form-control" id="kriteria_penilaian" name="kriteria_penilaian"></textarea>
		          </div>
		          <div class="form-group">
		            <label for="metode_penilaian" class="col-form-label">Metode Penilaian:</label>
		            <textarea class="form-control" id="metode_penilaian" name="metode_penilaian"></textarea>
		          </div>
		          <div class="form-group">
		            <label for="waktu" class="col-form-label">Waktu:</label>
		            <textarea class="form-control" id="waktu" name="waktu"></textarea>
		          </div>
		          <div class="form-group">
		            <label for="referensi" class="col-form-label">Referensi:</label>
		            <textarea class="form-control" id="referensi" name="referensi"></textarea>
		          </div>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Send</button>
			  </div>
			</form>
		    </div>
		  </div>
		</div>
	<!-- End silabus -->

	<!-- Handout -->
		<div class="modal fade" id="handout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">{{$judul[0]['judul']->nama_judul ?? ''}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="/review/handout" method="post">
				@csrf
				<input type="hidden" value="{{$judul[0]['judul_id']}}" name="judul_id">
		  		<input type="hidden" value="{{Auth::user()->instruktur->id}}" id="instruktur_id" name="instruktur_id"/>
		          <div class="form-group">
		            <label for="handout_sebelum" class="col-form-label">Previous Handout:</label>
		            <input type="text" class="form-control" id="handout_sebelum" name="handout_sebelum">
		          </div>
		          <div class="form-group">
		            <label for="handout_new" class="col-form-label">New Handout:</label>
		            <textarea class="form-control" id="handout_new" name="handout_new"></textarea>
		          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</form>
		    </div>
		  </div>
		</div>
	<!-- End handout -->

	<!-- Materi tayang -->
		<div class="modal fade" id="materitayang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">{{$judul[0]['judul']->nama_judul ?? ''}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
				<form action="/review/materi_tayang" method="post">
				@csrf
				<input type="hidden" value="{{$judul[0]['judul_id']}}" name="judul_id">
		  		<input type="hidden" value="{{Auth::user()->instruktur->id}}" id="instruktur_id" name="instruktur_id"/>
		          <div class="form-group">
		            <label for="materi_sebelum" class="col-form-label">Previous Materi Tayang:</label>
		            <input type="text" class="form-control" id="materi_sebelum" name="materi_sebelum">
		          </div>
		          <div class="form-group">
		            <label for="materi_new" class="col-form-label">New Materi Tayang:</label>
		            <textarea class="form-control" id="materi_new" name="materi_new"></textarea>
		          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</form>
		    </div>
		  </div>
		</div>
	<!-- End materi tayang -->

	<!-- Petunjuk Instruktur -->
		<div class="modal fade" id="petunjukinstruktur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">{{$judul[0]['judul']->nama_judul ?? ''}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
				<form action="/review/petunjuk_instruktur" method="post">
				@csrf
				<input type="hidden" value="{{$judul[0]['judul_id']}}" name="judul_id">
		  		<input type="hidden" value="{{Auth::user()->instruktur->id}}" id="instruktur_id" name="instruktur_id"/>
		          <div class="form-group">
		            <label for="jukins_sebelum" class="col-form-label">Previous Petunjuk Instruktur:</label>
		            <input type="text" class="form-control" id="jukins_sebelum" name="jukins_sebelum">
		          </div>
		          <div class="form-group">
		            <label for="jukins_new" class="col-form-label">New Petunjuk Instruktur:</label>
		            <textarea class="form-control" id="jukins_new" name="jukins_new"></textarea>
		          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</form>
		    </div>
		  </div>
		</div>
	<!-- End Petunjuk Instruktur-->

	<!-- Penyelenggara -->
		<div class="modal fade" id="petunjukpenyelenggara" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">{{$judul[0]['judul']->nama_judul ?? ''}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="/review/petunjuk_penyelenggara" method="post">
				@csrf
				<input type="hidden" value="{{$judul[0]['judul_id']}}" name="judul_id">
		  		<input type="hidden" value="{{Auth::user()->instruktur->id}}" id="instruktur_id" name="instruktur_id"/>
		          <div class="form-group">
		            <label for="jukpen_sebelum" class="col-form-label">Previous Petunjuk Penyelenggara:</label>
		            <input type="text" class="form-control" id="jukpen_sebelum" name="jukpen_sebelum">
		          </div>
		          <div class="form-group">
		            <label for="jukpen_new" class="col-form-label">New Petunjuk Penyelenggara:</label>
		            <textarea class="form-control" id="jukpen_new" name="jukpen_new"></textarea>
		          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</form>
		    </div>
		  </div>
		</div>
	<!-- End penyelenggara -->

	<!-- Tools  Evaluasi -->
		<div class="modal fade" id="toolseval" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
			  <h5 class="modal-title">{{$judul[0]['judul']->nama_judul ?? ''}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
			  </div>
			  <div class="modal-body">
		        <form action="/review/tools_evaluasi" method="post">
				@csrf
				<input type="hidden" value="{{$judul[0]['judul_id']}}" name="judul_id">
		  		<input type="hidden" value="{{Auth::user()->instruktur->id}}" id="instruktur_id" name="instruktur_id"/>
		          <div class="form-group">
		            <label for="toolseval_sebelum" class="col-form-label">Previous Tools Evaluasi:</label>
		            <input type="text" class="form-control" id="toolseval_sebelum" name="toolseval_sebelum">
		          </div>
		          <div class="form-group">
		            <label for="toolseval_new" class="col-form-label">New Tools Evaluasi:</label>
		            <textarea class="form-control" id="toolseval_new" name="toolseval_new"></textarea>
		          </div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</form>
		    </div>
		  </div>
		</div>
	<!-- End tools evaluasi -->

	<!-- Petunjuk Praktik -->
		<div class="modal fade" id="praktik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
			  <h5 class="modal-title">{{$judul[0]['judul']->nama_judul ?? ''}}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="/review/petunjuk_praktik" method="post">
				@csrf
				<input type="hidden" value="{{$judul[0]['judul_id']}}" name="judul_id">
		  		<input type="hidden" value="{{Auth::user()->instruktur->id}}" id="instruktur_id" name="instruktur_id"/>
		          <div class="form-group">
		            <label for="jukpraktik_sebelum" class="col-form-label">Previous Petunjuk Praktik:</label>
		            <input type="text" class="form-control" id="jukpraktik_sebelum" name="jukpraktik_sebelum">
		          </div>
		          <div class="form-group">
		            <label for="jukpraktik_new" class="col-form-label">New Petunjuk Praktik:</label>
		            <textarea class="form-control" id="jukpraktik_new" name="jukpraktik_new"></textarea>
		          </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</form>
		    </div>
		  </div>
		</div>
	<!-- End petunjuk praktik -->

<!-- END MODAL -->


</div>
</div>

@endsection

