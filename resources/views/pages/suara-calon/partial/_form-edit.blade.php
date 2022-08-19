<form class="form form-vertical needs-validation" method="post" action="{{ route('data-suara-calon.update', $id) }}" novalidate>
  @method('PUT')
  @csrf
  <div class="modal-body" id="modal-body">
    {!! Form::hidden('id',$id) !!}
    <div class="form-group">
      <label for="select-paslon">Pasangan Calon</label>
      <div class="position-relative">
        <div class="form-group">
          <select class="form-control selectPaslon select2" id="select-paslon" name="paslon">
              <option value="{{ $calon->id }}">{{ $calon->nama_calon_1 .' / '.$calon->nama_calon_2}}</option>
          </select>
{{--          {!! Form::select('paslon', $arrCalon, $calon->id,['class' => 'form-control selectPaslon select2',--}}
{{--          'id'=>'select-paslon'])--}}
{{--           !!}--}}
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="select-tps">TPS</label>
      <div class="position-relative">
        <div class="form-group">
          <select class="form-control selectTps select2" id="select-tps" name="tps">
            <option value="{{ $tps->id }}">{{ $tps->nama_tps .' - '. $namaKecKel}}</option>
          </select>
{{--          {!! Form::select('tps', $tps, $tpss->id,['class' => 'form-control selectTps select2','id'=>'select-tps']) !!}--}}
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
{{--      <button id="btnReset" type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>--}}
    </div>
  </div>
</form>
