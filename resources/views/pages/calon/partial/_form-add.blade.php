<form class="form form-vertical" method="post" action="{{ route('data-calon.store') }}">
  @csrf
  <div class="modal-body" id="modal-body">
    <div class="form-group">
      <label for="select-jeniscalon-add">Jenis Calon</label>
      <div class="position-relative">
        <div class="form-group">
          <select name="jenis_calon" data-select2-id="select-jeniscalon-add" id="select-jeniscalon-add"
                  placeholder="Cari Jenis Calon" class="select2 selectJenisCalonAdd form-control @error('jenis_calon')
            is-invalid @enderror" required>
          </select>
{{--          <select class="form-control selectAddPaslon select2" id="select-paslon-add" name="paslon"></select>--}}
          @error('jenis_calon')
          <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-12">
        <div class="form-group has-icon-left">
          <label for="nama-calon1">Nama Calon 1</label>
          <div class="position-relative">
            <input type="text" id="nama-calon1" class="form-control @error('nama_calon_1') is-invalid @enderror"
                   name="nama_calon_1" placeholder="Nama Calon 1" required>
            <div class="form-control-position">
              <i class="bx bx-user"></i>
            </div>
            @error('nama_calon_1')
            <div class="invalid-feedback">
              <i class="bx bx-radio-circle"></i>
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="form-group has-icon-left">
          <label for="nama-calon2">Nama Calon 2</label>
          <div class="position-relative">
            <input type="text" id="nama-calon2" class="form-control @error('nama_calon_2') is-invalid @enderror"
                   name="nama_calon_2" placeholder="Nama Calon 2" required>
            <div class="form-control-position">
              <i class="bx bx-user"></i>
            </div>
            @error('nama_calon_2')
            <div class="invalid-feedback">
              <i class="bx bx-radio-circle"></i>
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 d-flex justify-content-end ">
      <button id="btnSubmit" type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
{{--      <button id="btnReset" type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>--}}
    </div>
  </div>
</form>
