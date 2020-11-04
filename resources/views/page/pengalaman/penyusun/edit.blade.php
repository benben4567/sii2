  {{-- MODAL SHOW DETAIL DATA --}}
  <div class="modal fade" id="show-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Pengalaman Narasumber</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="nama_judul" class="col-sm-4 col-form-label">Judul</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_judul_show">
            </div>
            </div>
          <div class="form-group row">
            <label for="tanggal_mulai" class="col-sm-4 col-form-label">Tanggal Mulai</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="tanggal_mulai_show">
            </div>
            </div>
            <div class="form-group row">
              <label for="tanggal_selesai" class="col-sm-4 col-form-label">Tanggal Selesai</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="tanggal_selesai_show" >
              </div>
            </div>
            <div class="form-group row">
              <label for="file_pendidikan_formal" class="col-sm-4 col-form-label">File Pendidikan Formal</label>
              <div class="col-sm-8">
                <input type="text" min="0" class="form-control" id="file_pendidikan_formal_show">
              </div>
            </div>
            <div class="form-group row">
              <label for="file_sertifikat_pembelajaran" class="col-sm-4 col-form-label">File Sertifikat Pembelajaran</label>
              <div class="col-sm-8">
                <input type="text" min="0" class="form-control" id="file_sertifikat_pembelajaran_show">
              </div>
            </div>
            <div class="form-group row">
              <label for="file_bukti_karyatulis" class="col-sm-4 col-form-label">File Sertifikat Pembelajaran</label>
              <div class="col-sm-8">
                <input type="text" min="0" class="form-control" id="file_bukti_karyatulis_show">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div>
  