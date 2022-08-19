<div class="users-list-filter px-1">
  <form>
      <div class="row border rounded py-1 mb-2">
{{--      <div class="col-12 col-sm-6 col-lg-3">--}}
{{--        <label for="users-list-verified">Verified</label>--}}
{{--        <fieldset class="form-group">--}}
{{--          <select class="form-control" id="users-list-verified">--}}
{{--            <option value="">Any</option>--}}
{{--            <option value="Yes">Yes</option>--}}
{{--            <option value="No">No</option>--}}
{{--          </select>--}}
{{--        </fieldset>--}}
{{--      </div>--}}
      <div class="col-12 col-sm-6 col-lg-3">
        <label for="users-list-role">Role</label>
        <fieldset class="form-group">
          <select class="form-control" id="users-list-role">
            <option value="">Semua</option>
            <option value="Admin">Admin</option>
            <option value="Relawan">Relawan</option>
          </select>
        </fieldset>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <label for="users-list-status">Status</label>
        <fieldset class="form-group">
          <select class="form-control" id="users-list-status">
            <option value="">Semua</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Non Aktif</option>
          </select>
        </fieldset>
      </div>
      <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
        <button type="reset" class="btn btn-secondary glow users-list-clear mb-0 ">Reset</button>
      </div>
    </div>
  </form>
</div>
