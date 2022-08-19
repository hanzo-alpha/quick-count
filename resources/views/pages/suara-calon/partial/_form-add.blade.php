<form class="form form-vertical" method="post" action="{{ route('data-suara-calon.store') }}">
  @csrf
  <div class="modal-body" id="modal-body">
    <div class="form-group">
      <label for="select-paslon-add">Pasangan Calon</label>
      <div class="position-relative">
        <div class="form-group">
          <select class="form-control selectAddPaslon select2" id="select-paslon-add" name="paslon"></select>
          @error('paslon')
          <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="select-tps-add">TPS</label>
      <div class="position-relative">
        <div class="form-group">
          <select class="form-control selectAddTps select2" id="select-tps-add" name="tps" placeholder="Cari TPS"></select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-12">
        <div class="form-group has-icon-left">
          <label for="jumlah-suara">Jumlah Suara Calon</label>
          <div class="position-relative">
            <input type="text" id="jumlah-suara-add" class="form-control @error('jumlah_suara') is-invalid @enderror"
                   name="jumlah_suara" placeholder="Jumlah Suara Calon" required>
            <div class="form-control-position">
              <i class="bx bx-calculator"></i>
            </div>
            @error('jumlah_suara')
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
