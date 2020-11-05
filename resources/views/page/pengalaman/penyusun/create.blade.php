@extends('layouts.app')
@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-title-box page-title-box-dark">
          <h4 class="page-title">Pengalaman Penyusun</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0);"><i class="mdi mdi-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              Pengalaman Penyusun
            </li>
          </ol>
        </div>
      </div>
    </div> <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card m-b-20">
              <div class="card-header">
                <h5>Tambah Pengalaman Penyusun</h5>
              </div>
              <form class="form" method="post" enctype="multipart/form-data" action="/pengalaman-penyusun/store">
              @csrf
                <div class="card-body">

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="">Sertifikasi</label>
                        <select type="text" id="judul_id" class="form-control" name="judul_id" autofocus ></select>
                        <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="file_sertifikat_pembelajaran">Bukti Dukung Sertifikasi</label>
                        <input type="file" data-allowed-file-extensions="pdf" name="file_sertifikat_pembelajaran" id="file_sertifikat_pembelajaran" data-buttonname="btn-secondary"  class="form-control filestyle">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <input type="date"  class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="tanggal_selesai">Tanggal Selesai</label>
                        <input type="date"  class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="pendidikan_formal">Pendidikan Formal</label>
                        <select class="form-control" name="pendidikan_formal" id="pendidikan_formal">
                          <option value="" selected disabled>- pilih -</option>
                          <option>SMA</option>
                          <option>D3</option>
                          <option>S1</option>
                          <option>S2</option>
                          <option>S3</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="file_pendidikan_formal">Bukti Dukung Pendidikan Formal</label>
                        <input type="file" data-allowed-file-extensions="pdf" name="file_pendidikan_formal" id="file_pendidikan_formal"  data-buttonname="btn-secondary"  class="form-control filestyle">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="file_bukti_karyatulis">Karya Ilmiah</label>
                        <input type="file" data-allowed-file-extensions="pdf" name="file_bukti_karyatulis" id="file_bukti_karyatulis"  data-buttonname="btn-secondary"  class="form-control filestyle">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="file_penyusun">Materi Pembelajaran</label>
                        <input type="file" data-allowed-file-extensions="pdf" name="file_penyusun" id="file_penyusun"  data-buttonname="btn-secondary"  class="form-control filestyle">
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="card-footer">
                  <div class="text-right">
                    <a class="btn btn-secondary" href="{{ route('instruktur.penyusun.index') }}" role="button">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div> <!-- end col -->
        </div> <!-- end row -->
      </div> <!-- end page content-->
  </div> <!-- content -->
</div> <!-- content -->
@endsection
@push('js')
<script type="text/javascript">
$('select#judul_id').select2({
  allowClear: true,
  placeholder: 'Search',
  minimumInputLength: 1,
  ajax: {
    url: '/pengalaman-penyusun/select2',
    dataType: 'json',
    data: function (params) {
      return {
        q: $.trim(params.term),
        page: params.page || 1
      };
    },
    processResults: function (data) {
      data.page = data.page || 1;
      return {
        results: data.items.map(function (item) {
          return {
            id: item.id,
            text: item.nama_judul
          };
        }),
        pagination: {
          more: data.pagination
        }
      }
    },
    cache: true
  }
});
</script>

@endpush
