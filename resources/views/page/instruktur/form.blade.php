<div class="modal fade" id="modal-import" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
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
            <label for="importInstruktur" class="col-md-5 control-label">Import Data</label>
            <div class="col-md-12">
              <input type="file" class="form-control dropify" data-allowed-file-extensions="csv" name="importInstruktur" required>
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

<div class="modal fade" id="modalJudul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Instruktur Berdasarkan Judul</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form action="" id="form-cari-judul">
              <div class="form-group">
                <label for="">Judul Pembelajaran</label>
                <select class="form-control" name="judul">
                  <option value="a">Judul A</option>
                  <option value="b">Judul B</option>
                  <option value="c">Judul C</option>
                  <option value="d">Judul D</option>
                  <option value="e">Judul E</option>
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" onclick="event.preventDefault(); document.getElementById('form-cari-judul').submit(); " class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
      </div>
    </div>
  </div>
</div>
