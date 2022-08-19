<form class="form form-vertical" method="POST" action="{{ route('hitung-cepat.update',$id) }}">
  @method('PUT')
  @csrf
  <div class="modal-body" id="modal-body">
    <div class="row">
      <div class="col-md-5 col-12">
        <div class="form-group">
          <label for="select-kecamatan-edit">Kecamatan</label>
          <div class="position-relative">
            <div class="form-group">
              {!! Form::select('kecamatan',$kecamatan,$model->kecamatan,['class' => 'form-control selecKecEdit select2','id' =>
              'select-kecamatan-edit']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="form-group">
          <label for="select-desa-edit">Kelurahan</label>
          <div class="position-relative">
            <div class="form-group">
              {!! Form::select('desa',$desa,$model->desa,['class' => 'form-control selectDesaEdit select2','id' => 'select-desa-edit']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="tps-edit">TPS</label>
          <div class="position-relative">
            <div class="form-group">
              {!! Form::number('tps',$model->no_tps,['class' => 'form-control','id' =>'tps-edit','placeholder' => 'TPS']) !!}
              <div class="form-control-position">
                <i class="bx bx-building"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="form-group">
          <label for="calon-edit">Nama Pasangan Calon</label>
          <div class="position-relative">
            <div class="form-group">
              {!! Form::hidden('calon1_id',$calon[0]['id']) !!}
              {!! Form::text('nama_calon1',$calon[0]['id'].'. '.$calon[0]['nama_calon_1'] .' - '. $calon[0]['nama_calon_2'],['class' =>
              'form-control','id' =>'calon-edit','placeholder' => 'Suara','readonly']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="suara1">Jumlah Suara</label>
          <div class="position-relative">
            <div class="form-group">
              {!! Form::number('suara1',old('suara1') ?? $model->suara1,['class' => 'form-control','id' =>'suara'.$calon[0]['id'],'placeholder' =>
              'Suara']) !!}
              <div class="form-control-position">
                <i class="bx bx-calculator"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="form-group">
          <div class="position-relative">
            <div class="form-group">
              {!! Form::hidden('calon2_id',$calon[1]['id']) !!}
              {!! Form::text('nama_calon2',$calon[1]['id'].'. '.$calon[1]['nama_calon_1'] .' - '. $calon[1]['nama_calon_2'],['class' =>
              'form-control','id' =>'calon', 'placeholder' => 'Suara','readonly']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <div class="position-relative">
            <div class="form-group">
              {!! Form::number('suara2',old('suara2') ?? $model->suara2,['class' => 'form-control','id' =>'suara'.$calon[1]['id'],'placeholder' =>
              'Suara']) !!}
              <div class="form-control-position">
                <i class="bx bx-calculator"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="status-edit">Suara Tidak Sah</label>
      <div class="position-relative">
        <div class="form-group">
          {!! Form::number('suara_tidak_sah',$model->suara_tidak_sah,['class' => 'form-control','id' =>'status-edit','placeholder' => 'Input Suara
          Tidak
          Sah']) !!}
        </div>
      </div>
    </div>
    <div class="col-12 d-flex justify-content-end ">
      <button id="btnSubmit" type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
      <button id="btnReset" type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
      <button id="btnCancel" onclick="$('#modal-form').modal('hide')" type="reset" class="btn btn-light-danger mr-1 mb-1">Batal</button>
    </div>
  </div>
</form>
