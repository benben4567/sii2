<div class="modal fade" id="modal-mengajar" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form form-horizontal" id="form-mengajar" data-toggle="validator"  method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> &times;</span> </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" name="id" >
          <div class="form-group">
            <label for="materi_pembelajaran" class="col-md-5 control-label">Materi Pembelajaran</label>
            <div class="col-md-12">
              <select type="text" id="materi_pembelajaran" class="form-control" name="materi_pembelajaran" autofocus required></select>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="tempat_mengajar" class="col-md-5 control-label">Tempat</label>
            <div class="col-md-12">
              <input type="text" id="tempat_mengajar" class="form-control" placeholder="Tempat mengajar" name="tempat_mengajar" autofocus required>
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
