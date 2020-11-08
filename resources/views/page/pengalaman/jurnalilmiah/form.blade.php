<div class="modal fade" id="modal-toefl" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form form-horizontal" id="form-toefl" data-toggle="validator"  method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> &times;</span> </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" name="id" >
          <div class="form-group">
            <label for="skor" class="col-md-5 control-label">Skor</label>
            <div class="col-md-12">
            <select name="skor" id="skor"  class="form-control select2 js-states"></select>
            <span class="help-block with-errors"></span>
          </div>
          </div>
          <div class="form-group">
            <label for="tipe">Tipe</label>
            <select class="form-control" name="tipe" id="tipe">
              <option value="" selected disabled>- Pilih -</option>
              <option value="PBT">PBT</option>
              <option value="iBT">iBT</option>
              <option value="CBT">CBT</option>
              <option value="ITP">ITP</option>
            </select>
          </div>
        </div>
          <div class="form-group">
            <label for="lembaga_penyelenggara" class="col-md-5 control-label">Lembaga Penyelenggara</label>
            <div class="col-md-12">
              <input type="text" id="lembaga_penyelenggara" class="form-control" placeholder="Tanggal Mulai" name="lembaga_penyelenggara" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="masa_berlaku" class="col-md-5 control-label">Masa Berlaku</label>
            <div class="col-md-12">
              <input type="date" id="masa_berlaku" class="form-control" placeholder="Tanggal Selesai" name="masa_berlaku" autofocus required>
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


  {{-- MODAL SHOW DETAIL DATA --}}
  <div class="modal fade" id="show-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Pengalaman Mengajar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="materi" class="col-sm-4 col-form-label">Judul Materi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="materi_show">
            </div>
            </div>
            <div class="form-group row">
              <label for="penyelenggara" class="col-sm-4 col-form-label">Penyelenggara</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="penyelenggara_show" >
              </div>
            </div>
            <div class="form-group row">
            <label for="tgl_mulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="tgl_mulai_show">
            </div>
            </div>
            <div class="form-group row">
              <label for="tgl_selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
              <div class="col-sm-8">
                <input type="text" min="0" class="form-control" id="tgl_selesai_show">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>