<div class="users-list-filter px-1">
  <form>
    <div class="row border rounded py-1 mb-2">
      <div class="col-12 col-sm-6 col-lg-3">
        <label for="users-list-role">Kecamatan</label>
        <fieldset class="form-group">
          <select class="form-control" id="filter-kecamatan">
            <option value="">Semua</option>
            @foreach($kecamatan as $kec)
              <option value="{{ $kec->name }}">{{ $kec->name }}</option>
            @endforeach
          </select>
        </fieldset>
      </div>
      {{--      <div class="col-12 col-sm-6 col-lg-3">--}}
      {{--        <label for="users-list-status">Kelurahan</label>--}}
      {{--        <fieldset class="form-group">--}}
      {{--          <select class="form-control" id="filter-kelurahan">--}}
      {{--            <option value="">Semua</option>--}}
      {{--            @foreach($desa as $kel)--}}
      {{--            <option value="{{ $kel->name }}">{{ $kel->name }}</option>--}}
      {{--            @endforeach--}}
      {{--          </select>--}}
      {{--        </fieldset>--}}
      {{--      </div>--}}
      <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
        <button type="reset" class="btn btn-secondary glow users-list-clear mb-0 ">Reset</button>
      </div>
    </div>
  </form>
</div>
