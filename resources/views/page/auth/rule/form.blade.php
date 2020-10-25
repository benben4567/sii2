<div class="modal fade" id="modal-rule" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-horizontal" data-toggle="validator" method="post">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> &times;</span> </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_role" name="id_role" >
          <div class="form-group">
            <label for="name" class="col-md-5 control-label">Nama Rule</label>
            <div class="col-md-12">
              <input type="text" id="name" class="form-control" placeholder="name" name="name" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-md-5 control-label">Set Permission</label>
            <div class="col-md-12">
              <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">

                  <table  class="table table-striped dt-responsive nowrap table-detail" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                      <tr>
                        <th>Nama Permission</th>
                        <th>Create <input type="checkbox" id="create_func" value="1" ></th>
                        <th>Read <input type="checkbox" id="read_func" value="1" ></th>
                        <th>Update <input type="checkbox" id="update_func" value="1" ></th>
                        <th>Delete <input type="checkbox" id="delete_func" value="1" ></th>
                        <th>CRUD <input type="checkbox" id="crud_func" value="1" ></th>
                      </tr>
                    </thead>
                    <tbody>
                     
                  
                    </tbody>

                  </table>
                </div>
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
