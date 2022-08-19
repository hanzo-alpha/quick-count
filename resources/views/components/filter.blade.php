<div class="users-list-filter px-1">
  <form>
    <div class="row border rounded py-2 mb-2">
      <div class="col-12 col-sm-6 col-lg-3">
        <label for="users-list-verified">Verified</label>
        <fieldset class="form-group">
          <select class="form-control" id="users-list-verified">
            <option value="">Any</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </fieldset>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <label for="users-list-role">Role</label>
        <fieldset class="form-group">
          <select class="form-control" id="users-list-role">
            <option value="">Any</option>
            <option value="User">User</option>
            <option value="Staff">Staff</option>
          </select>
        </fieldset>
      </div>
      <div class="col-12 col-sm-6 col-lg-3">
        <label for="users-list-status">Status</label>
        <fieldset class="form-group">
          <select class="form-control" id="users-list-status">
            <option value="">Any</option>
            <option value="Active">Active</option>
            <option value="Close">Close</option>
            <option value="Banned">Banned</option>
          </select>
        </fieldset>
      </div>
      <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
        <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Clear</button>
      </div>
    </div>
  </form>
</div>
