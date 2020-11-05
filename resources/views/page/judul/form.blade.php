<div class="modal fade" id="modal-import" data-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> &times;</span> </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="importMateri" class="col-md-5 control-label">Import Data</label>
            <div class="col-md-12">
              <input type="file" class="form-control dropify" data-allowed-file-extensions="csv xlsx" name="importMateri" required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer ">
          <button type="submit" class="btn btn-primary ">
            <span class='glyphicon glyphicon-check'></span> Simpan</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Tutup
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Show Data -->
<div class="modal fade" id="show-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Judul Pembelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="kode_judul" class="col-sm-4 col-form-label">Kode Judul</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="kode_judul_show">
          </div>
          </div>
          <div class="form-group row">
            <label for="kode_judul_lama" class="col-sm-4 col-form-label">Kode Judul Lama</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="kode_judul_lama_show" >
            </div>
          </div>
          <div class="form-group row">
          <label for="nama_judul" class="col-sm-4 col-form-label">Nama Judul</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nama_judul_show">
          </div>
          </div>
          <div class="form-group row">
            <label for="jenis_diklat" class="col-sm-4 col-form-label">Jenis Diklat</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="jenis_diklat_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="sifat_diklat" class="col-sm-4 col-form-label">Sifat Diklat</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="sifat_diklat_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="dahan_profesi" class="col-sm-4 col-form-label">Dahan Profesi</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="dahan_profesi_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="level_profisiensi" class="col-sm-4 col-form-label">Level Profisiensi</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="level_profisiensi_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="penyelenggaraan" class="col-sm-4 col-form-label">Penyelenggaraan</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="penyelenggaraan_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="penanggung_jawab" class="col-sm-4 col-form-label">Penanggung Jawab</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="penanggung_jawab_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="jenis_Sertifikat" class="col-sm-4 col-form-label">Jenis Sertifikat</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="jenis_Sertifikat_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="tahun_terbit" class="col-sm-4 col-form-label">Tahun Terbit</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="tahun_terbit_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="durasi_hari" class="col-sm-4 col-form-label">Durasi Hari</label>
            <div class="col-sm-8">
              <input type="text" min="0" class="form-control" id="durasi_hari_show">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
