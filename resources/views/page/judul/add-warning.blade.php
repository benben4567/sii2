<!-- Modal -->
<div class="modal fade" id="add-warning" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="/warning/store" method="post" enctype="multipart/form-data" id="form-warning">
          {{ csrf_field() }}
          <div class="form-group">

            <input id="id_judul" type="hidden" name="id_judul" readonly/>

            <label for="aspek">
              <i class="fas fa-exclamation-triangle mr-3"></i> Aspek Pembaruan
            </label>


            {{-- @forelse($aspeks as $aspek)
              <div class="custom-control custom-checkbox my-1 mr-sm-2">
                <input type="checkbox" class="custom-control-input aspek" id="{{$aspek->aspek}}" name="aspek[]" value="{{$aspek->aspek}}">
                <label class="custom-control-label" for="{{$aspek->aspek}}">{{$aspek->aspek}}</label>
              </div>
            @empty --}}
              <div class="custom-control custom-checkbox my-1 mr-sm-2">
                <input type="checkbox" class="custom-control-input aspek" name="aspek[]" value="">
                <label class="custom-control-label"></label>
              </div>
            {{-- @endforelse --}}

            <br><label for="informasi_pendukung"><i class="fas fa-info-circle mr-2 informasi_pendukung"></i>Informasi Pendukung</label>
            <textarea class="form-control" id="informasi_pendukung" name="informasi_pendukung" rows="3"></textarea>


          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Kirim!</button>
      </div>
        </form>
      </div>


    </div>
  </div>
</div>
<!-- End Modal -->
