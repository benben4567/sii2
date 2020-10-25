  <!-- Modal Kurikulum -->
  <div class="modal fade" id="review-kurikulum" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center">
            {{$warnings[0]->judul['nama_judul']}}
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tujuan</th>
                    <th>Syarat Peserta</th>
                    <th>SKP</th>
                    <th>Metode</th>
                    <th>Lingkup Bahasan</th>
                    <th>Stategi</th>
                    <th>Level</th>
                    <th>Sertifikat</th>
                    <th>Refernsi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="idKurikulum"></th>
                    <td class="tujuanKurikulum"></td>
                    <td class="syaratKurikulum"></td>
                    <td class="skpKurikulum"></td>
                    <td class="metodeKurikulum"></td>
                    <td class="lingkupKurikulum"></td>
                    <td class="strategiKurikulum"></td>
                    <td class="levelKurikulum"></td>
                    <td class="sertifikatKurikulum"></td>
                    <td class="referensiKurikulum"></td>
        
                </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- End Modal -->
    
  <!-- Modal Silabus -->
  <div class="modal fade" id="review-silabus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center">{{$warnings[0]->judul['nama_judul']}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Warning</th>
                    <th>Pokok/Sub Bahasan</th>
                    <th>Hasil Pelatihan</th>
                    <th>Kriteria Penilaian</th>
                    <th>Metode Penilaian</th>
                    <th>Waktu</th>
                    <th>Referensi</th>
                    <th>Waktu input</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="idKurikulum"></th>
                    <td class="tujuanKurikulum"></td>
                    <td class="syaratKurikulum"></td>
                    <td class="skpKurikulum"></td>
                    <td class="metodeKurikulum"></td>
                    <td class="lingkupKurikulum"></td>
                    <td class="strategiKurikulum"></td>
                    <td class="levelKurikulum"></td>
                    <td class="sertifikatKurikulum"></td>
                    <td class="referensiKurikulum"></td>
        
                </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- End Modal -->
    
 <!-- Modal Handout -->
 <div class="modal fade" id="review-handout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-responsive-sm">
                <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Warning</th>
                    <th>Previous Handout</th>
                    <th>Updated Handout</th>
                    <th>Waktu input</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th class="idHandout"></th>
                    <td class="tujuanHandout"></td>
                    <td class="syaratHandout"></td>
                    <td class="skpHandout"></td>
                    <td class="metodeHandout"></td>
        
                </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <!-- End Modal -->

    <!-- Modal Materi Tayang -->
 <div class="modal fade" id="review-materitayang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-responsive-sm">
              <thead class="thead-dark">
              <tr>
                  <th>No</th>
                  <th>Warning</th>
                  <th>Previous Materi Tayang</th>
                  <th>Updated Materi Tayang</th>
                  <th>Waktu input</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <th class="idMateriTayang"></th>
                  <td class="tujuanMateriTayang"></td>
                  <td class="syaratMateriTayang"></td>
                  <td class="skpMateriTayang"></td>
                  <td class="metodeMateriTayang"></td>
      
              </tr>
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal -->

  <!-- Modal Petunjuk Instruktur-->
 <div class="modal fade" id="review-jukpen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-responsive-sm">
              <thead class="thead-dark">
              <tr>
                  <th>No</th>
                  <th>Warning</th>
                  <th>Previous Petunjuk Instruktur</th>
                  <th>Updated Petunjuk Instruktur</th>
                  <th>Waktu input</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <th class="idJukIns"></th>
                  <td class="tujuanJukIns"></td>
                  <td class="syaratJukIns"></td>
                  <td class="skpJukIns"></td>
                  <td class="metodeJukIns"></td>
      
              </tr>
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal -->

  <!-- Modal Petunjuk Penyelenggara -->
 <div class="modal fade" id="review-jukpen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-responsive-sm">
              <thead class="thead-dark">
              <tr>
                  <th>No</th>
                  <th>Warning</th>
                  <th>Previous Petunjuk Penyelenggara</th>
                  <th>Updated Petunjuk Penyelenggara</th>
                  <th>Waktu input</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <th class="idJukPen"></th>
                  <td class="tujuanJukPen"></td>
                  <td class="syaratJukPen"></td>
                  <td class="skpJukPen"></td>
                  <td class="metodeJukPen"></td>
      
              </tr>
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal -->
    
<!-- Modal Tools Evaluasi -->
<div class="modal fade" id="review-toolseval" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-responsive-sm">
              <thead class="thead-dark">
              <tr>
                  <th>No</th>
                  <th>Warning</th>
                  <th>Previous Tools Evaluasi</th>
                  <th>Updated Tools Evaluasi</th>
                  <th>Waktu input</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <th class="idToolsEval"></th>
                  <td class="tujuanToolsEval"></td>
                  <td class="syaratToolsEval"></td>
                  <td class="skpToolsEval"></td>
                  <td class="metodeToolsEval"></td>
      
              </tr>
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal -->

  <!-- Modal Petunjuk Praktik -->
 <div class="modal fade" id="review-jukprak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-responsive-sm">
              <thead class="thead-dark">
              <tr>
                  <th>No</th>
                  <th>Warning</th>
                  <th>Previous Petunjuk Praktik</th>
                  <th>Updated Petunjuk Praktik</th>
                  <th>Waktu input</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <th class="idMateriTayang"></th>
                  <td class="tujuanMateriTayang"></td>
                  <td class="syaratMateriTayang"></td>
                  <td class="skpMateriTayang"></td>
                  <td class="metodeMateriTayang"></td>
      
              </tr>
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal -->