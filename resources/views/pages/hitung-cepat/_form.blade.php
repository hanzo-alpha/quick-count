@if($form === 'add')
  <form class="form form-vertical needs-validation" method="post" action="{{ route('data-suara-calon.store') }}" novalidate>
    @csrf
    <div class="modal-body" id="modal-body">
      <div class="row">
        <div class="col-12">
          {{--        {!! Form::hidden('id',$model->id) !!}--}}
          <div class="form-group">
            <label for="select-provinsi">Pasangan Calon</label>
            <div class="position-relative">
              <div class="form-group">
                {!! Form::select('paslon', $jenisCalon, [],['class' => 'form-control selectPaslon select2', 'id'=>'select-paslon']) !!}
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
            <label for="select-tps">TPS</label>
            <div class="position-relative">
              <div class="form-group">
                {!! Form::select('tps', $tps, $id,['class' => 'form-control selectTps select2','id'=>'select-tps']) !!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group has-icon-left">
                <label for="jumlah-suara">Jumlah Suara Calon</label>
                <div class="position-relative">
                  <input type="text" id="jumlah-suara" class="form-control @error('jumlah_suara') is-invalid @enderror"
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
            <button id="btnReset" type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@else
  <form class="form form-vertical needs-validation" method="post" action="{{ route('data-suara-calon.update', $id) }}" novalidate>
    @method('PUT')
    @csrf
    <div class="modal-body" id="modal-body">
      <div class="row">
        <div class="col-12">
          {!! Form::hidden('id',$model->id) !!}
          <div class="form-group">
            <label for="select-provinsi">Pasangan Calon</label>
            <div class="position-relative">
              <div class="form-group">
                {!! Form::select('paslon', $jenisCalon, $calon->jenis_calon,['class' => 'form-control selectPaslon select2',
                'id'=>'select-paslon'])
                 !!}
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="select-tps">TPS</label>
            <div class="position-relative">
              <div class="form-group">
                {!! Form::select('tps', $tps, $tpss->id,['class' => 'form-control selectTps select2','id'=>'select-tps']) !!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group has-icon-left">
                <label for="jumlah-suara">Jumlah Suara Calon</label>
                <div class="position-relative">
                  <input type="text" id="jumlah-suara" class="form-control @error('jumlah_suara') is-invalid @enderror"
                         name="jumlah_suara" value="{{ $model->jumlah_suara }}" placeholder="Jumlah Suara Calon" required>
                  <div class="form-control-position">
                    <i class="bx bx-calculator"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 d-flex justify-content-end ">
            <button id="btnSubmit" type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
            <button id="btnReset" type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endif
