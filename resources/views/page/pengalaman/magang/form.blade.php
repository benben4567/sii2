<div class="modal fade" id="modal-magang" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form form-horizontal" id="form-magang" data-toggle="validator"  method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> &times;</span> </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_magang" name="id_magang" >
          <div class="form-group">
            <label for="tempat_magang" class="col-md-5 control-label">Tempat Magang</label>
            <div class="col-md-12">
              <input type="text" id="tempat_magang" class="form-control" placeholder="Tempat Magang" name="tempat_magang" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="tema_magang" class="col-md-5 control-label">Tema Magang</label>
            <div class="col-md-12">
              <input type="text" id="tema_magang" class="form-control" placeholder="Tema Magang" name="tema_magang" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="tgl_mulai" class="col-md-5 control-label">Tanggal Mulai</label>
            <div class="col-md-12">
              <input type="date" id="tgl_mulai" class="form-control" placeholder="Tanggal Mulai" name="tgl_mulai" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="tgl_selesai" class="col-md-5 control-label">Tanggal Selesai</label>
            <div class="col-md-12">
              <input type="date" id="tgl_selesai" class="form-control" placeholder="Tanggal Selesai" name="tgl_selesai" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_file" class="col-md-5 control-label">File</label>
            <div class="col-md-12">
              <input type="file" id="nama_file" class="form-control dropify" data-allowed-file-extensions="pdf" name="nama_file">
              <span class="help-block with-errors"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">
            <span class='glyphicon glyphicon-check'></span> Simpan</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class='glyphicon glyphicon-remove'></span> Batal
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
