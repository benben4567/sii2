<div class="modal fade" id="modal-jurnal-ilmiah" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form form-horizontal" id="form-jurnal-ilmiah" data-toggle="validator"  method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> &times;</span> </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id" name="id" >

          <div class="form-group">
            <label for="judul" class="col-md-5 control-label">Judul Jurnal</label>
            <div class="col-md-12">
              <select type="text" id="judul" class="form-control" name="judul" autofocus required></select>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="tingkatan" class="col-md-5 control-label">Tingkatan Jurnal</label>
            <div class="col-md-12">
              <select class="form-control" name="tingkatan" id="tingkatan">
                <option value="" selected disabled>- Pilih -</option>
                <option value="Nasional">Nasional</option>
                <option value="Regional">Regional</option>
                <option value="Internasional">Internasional</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label for="lembaga_penyelenggara" class="col-md-5 control-label">Lembaga Penyelenggara</label>
            <div class="col-md-12">
              <input type="text" id="lembaga_penyelenggara" class="form-control" placeholder="Lembaga Penyelenggara" name="lembaga_penyelenggara" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="tanggal_submit" class="col-md-5 control-label">Tanggal Submit</label>
            <div class="col-md-12">
              <input type="date" id="tanggal_submit" class="form-control" placeholder="Tanggal Submit" name="tanggal_submit" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="tanggal_presentasi" class="col-md-5 control-label">Tanggal Presentasi</label>
            <div class="col-md-12">
              <input type="date" id="tanggal_presentasi" class="form-control" placeholder="Tanggal Submit" name="tanggal_presentasi" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="row">
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="file_jurnal_ilmiah" class="col-md-12 control-label">File Jurnal Ilmiah</label>
              <input type="file" id="file_jurnal_ilmiah" class="form-control dropify" data-allowed-file-extensions="pdf" name="file_jurnal_ilmiah">
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="file_abstrak" class="col-md-12 control-label">File Abstrak</label>
              <input type="file" id="file_abstrak" class="form-control dropify" data-allowed-file-extensions="pdf" name="file_abstrak">
              <span class="help-block with-errors"></span>
            </div>
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


  {{-- MODAL SHOW DETAIL DATA
  <div class="modal fade" id="show-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Sertifikat Toefl</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
          <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
  </div> --}}