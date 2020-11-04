<div class="modal fade" id="modal-sertifikasi_bidang" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form form-horizontal" id="form-kompetensi" data-toggle="validator"  method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> &times;</span> </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_sertifikasi_bidang" name="id_sertifikasi_bidang" >
          <div class="form-group">
            <label for="nama_sertifikasi" class="col-md-5 control-label">Sertifikasi Bidang</label>
            <div class="col-md-12">
            <select name="nama_sertifikasi" id="nama_sertifikasi"  class="form-control select2 js-states">
              <option></option>
                <option value="TME">TME</option>
                <option value="Konstrukturan">Keinstrukturan</option>
                <option value="BNSP/LSP">BNSP/LSP</option>
                <option value="TCB">TCB</option>
            </select>
            <span class="help-block with-errors"></span>
          </div>
          </div>
          <div class="form-group">
            <label for="tgl_pelaksanaan" class="col-md-5 control-label">Tanggal Pelaksanaan</label>
            <div class="col-md-12">
              <input type="date" id="tgl_pelaksanaan" class="form-control" placeholder="Tanggal Mulai" name="tgl_pelaksanaan" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="batas_sertifikasi" class="col-md-5 control-label">Batas Sertifikasi</label>
            <div class="col-md-12">
              <input type="date" id="batas_sertifikasi" class="form-control" placeholder="Batas Sertifikasi" name="batas_sertifikasi" autofocus>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_file" class="col-md-5 control-label">File</label>
            <div class="col-md-12">
              <input type="file" class="form-control dropify" data-allowed-file-extensions="pdf" id="nama_file" name="nama_file">
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
          <h5 class="modal-title">Detail Pengalaman Sertifikasi Kompetensi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="nama_sertifikasi" class="col-sm-4 col-form-label">Nama Sertifikat</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_sertifikasi_show">
            </div>
            </div>
          <div class="form-group row">
            <label for="tgl_pelaksanaan" class="col-sm-4 col-form-label">Tanggal Pelaksanaan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="tgl_pelaksanaan_show">
            </div>
            </div>
            <div class="form-group row">
              <label for="batas_sertifikasi" class="col-sm-4 col-form-label">Batas Sertifikasi</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="batas_sertifikasi_show" >
              </div>
            </div>
            <div class="form-group row">
              <label for="nama_file" class="col-sm-4 col-form-label">File Pendidikan Formal</label>
              <div class="col-sm-8">
                <input type="text" min="0" class="form-control" id="nama_file_show">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>