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


<!-- Modal Show Data -->
<div class="modal fade" id="show-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Instruktur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="nip" class="col-sm-4 col-form-label">NIP</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nip_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama_instruktur" class="col-sm-4 col-form-label">Nama Instruktur</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nama_instruktur_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="tipeinstruktur" class="col-sm-4 col-form-label">Tipe Instruktur</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="tipe_instruktur_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="udiklat" class="col-sm-4 col-form-label">Unit Diklat</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="udiklat_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="jabatan_peserta" class="col-sm-4 col-form-label">Jabatan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="jabatan_peserta_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="grade" class="col-sm-4 col-form-label">Grade</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="grade_show" >
          </div>
        </div>
        <div class="form-group row">
          <label for="jeniskelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="jeniskelamin_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="tempat_lahir_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="no_hp" class="col-sm-4 col-form-label">No Hp:</label>
          <div class="col-sm-8">
            <input type="number" min="0" class="form-control" id="no_hp_show">
          </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" min="0" class="form-control" id="email_show">
            </div>
        </div>
        <div class="form-group row">
          <label for="unit_level1" class="col-sm-4 col-form-label">Unit Induk</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="unit_level1_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="pendidikan_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="no_ktp" class="col-sm-4 col-form-label">No KTP</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="no_ktp_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="no_npwp" class="col-sm-4 col-form-label">NPWP</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="no_npwp_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="level_instruktur" class="col-sm-4 col-form-label">Level Instruktur</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="level_instruktur_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="bank" class="col-sm-4 col-form-label">Bank</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="bank_show">
          </div>
        </div>
        <div class="form-group row">
          <label for="no_rekening" class="col-sm-4 col-form-label">No Rekening</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="no_rekening_show">
          </div>
        </div>

        <div class="form-group row">
          <label for="atas_nama_rekening" class="col-sm-4 col-form-label">Atas Nama Rekening</label>
          <div class="col-sm-8">
            <input type="text" min="0" class="form-control" id="atas_nama_rekening_show">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
