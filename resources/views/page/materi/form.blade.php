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
        <h5 class="modal-title">Detail Materi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="kode_materi" class="col-sm-4 col-form-label">Kode Materi</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="kode_materi_show">
          </div>
          </div>
          <div class="form-group row">
            <label for="jenis_materi" class="col-sm-4 col-form-label">Jenis Materi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="jenis_materi_show" >
            </div>
          </div>
          <div class="form-group row">
          <label for="materi" class="col-sm-4 col-form-label">Materi</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="materi_show">
          </div>
          </div>
          <div class="form-group row">
            <label for="durasi" class="col-sm-4 col-form-label">Durasi</label>
            <div class="col-sm-4">
              <input type="number" min="0" class="form-control" id="durasi_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="nilai_minimum" class="col-sm-4 col-form-label">Nilai Minimum</label>
            <div class="col-sm-4">
              <input type="number" min="0" class="form-control" id="nilai_minimum_show">
            </div>
          </div>
          <div class="form-group row">
            <label for="presentase_pembayaran" class="col-sm-4 col-form-label">Presentase Pembayaran</label>
            <div class="col-sm-4">
              <input type="number" min="0" class="form-control" id="presentase_pembayaran_show">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
