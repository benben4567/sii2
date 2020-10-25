<div class="modal fade" id="modal-users" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" data-toggle="validator" method="post">
        {{csrf_field()}} {{method_field('POST')}}
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> &times;</span> </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_user" name="id_user" >
          <div class="form-group">
            <label for="username" class="col-md-5 control-label">Username</label>
            <div class="col-md-12">
              <input type="text" id="username" class="form-control" placeholder="username" name="username" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-md-5 control-label">Email</label>
            <div class="col-md-12">
              <input type="email" id="email" class="form-control" placeholder="email" name="email" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-md-5 control-label" >Assign Role</label>
            <div class="col-md-12">
              <div class="row">
                @foreach ($roles as $role)
                <div class="col-lg-4">
                  <div class="checkbox">
                    <label class="control-inline fancy-checkbox">
                      <input type="checkbox" id="select_{{$role->id_role}}" class="role" name="role[]" value="{{ $role->id_role }}">
                      <span> {{ $role->name }}</span>
                    </label>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-5 control-label">Password</label>
            <div class="col-md-12">
              <input type="password" id="password" class="form-control" placeholder="password" name="password" autofocus>
              <span class="help-block with-errors"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="password1" class="col-md-5 control-label">Ulang Password</label>
            <div class="col-md-12">
              <input type="password"  data-match="#password" id="password1" class="form-control" placeholder="ulang password" name="password1" autofocus>
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
