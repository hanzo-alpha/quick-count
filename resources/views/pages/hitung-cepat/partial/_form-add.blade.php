<form class="form form-vertical" method="POST" action="{{ route('hitung-cepat.store') }}">
  @csrf
  <div class="modal-body" id="modal-body">
    <div class="row">
      <div class="col-md-5 col-12">
        <div class="form-group">
          <label for="select-kecamatan-add">Kecamatan</label>
          <div class="position-relative">
            <div class="form-group">
              <select class="form-control selectKecAdd select2" id="select-kecamatan-add" name="kecamatan"></select>
              @error('kecamatan')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="form-group">
          <label for="select-desa-add">Kelurahan</label>
          <div class="position-relative">
            <div class="form-group">
              <select class="form-control selectDesaAdd select2" id="select-desa-add" name="desa"></select>
              @error('desa')
              <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="tps-add">TPS</label>
          <div class="position-relative">
            <div class="form-group">
              {!! Form::number('tps','',['class' => 'form-control','id' =>'tps-add','placeholder' => 'TPS']) !!}
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
          <label for="calon-add">Nama Pasangan Calon</label>
          <div class="position-relative">
            <div class="form-group">
              {!! Form::hidden('calon1_id',$calon[0]['id']) !!}
              {!! Form::text('nama_calon1',$calon[0]['id'].'. '.$calon[0]['nama_calon_1'] .' - '. $calon[0]['nama_calon_2'],['class' =>
              'form-control','id'=>'calon-add','placeholder' => 'Suara','readonly']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="tps-add">Jumlah Suara</label>
          <div class="position-relative">
            <div class="form-group">
              {!! Form::number('suara1',old('suara1') ?? '',['class' => 'form-control','id' =>'suara'.$calon[0]['id'],'placeholder' =>
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
              'form-control','id' =>'calon-add', 'placeholder' => 'Suara','readonly']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <div class="position-relative">
            <div class="form-group">
              {!! Form::number('suara2',old('suara2') ?? '',['class' => 'form-control','id' =>'suara'.$calon[1]['id'],'placeholder' =>
              'Suara']) !!}
              <div class="form-control-position">
                <i class="bx bx-calculator"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{--      <div class="col-md-9">--}}
      {{--        <div class="form-group">--}}
      {{--          <div class="position-relative">--}}
      {{--            <div class="form-group">--}}
      {{--              {!! Form::hidden('calon3_id',$calon[2]['id']) !!}--}}
      {{--              {!! Form::text('nama_calon3',$calon[2]['id'].'. '.$calon[2]['nama_calon_1'] .' - '. $calon[2]['nama_calon_2'],['class' =>--}}
      {{--              'form-control','id' =>'calon-add', 'placeholder' => 'Suara','readonly']) !!}--}}
      {{--            </div>--}}
      {{--          </div>--}}
      {{--        </div>--}}
      {{--      </div>--}}
      {{--      <div class="col-md-3">--}}
      {{--        <div class="form-group">--}}
      {{--          <div class="position-relative">--}}
      {{--            <div class="form-group">--}}
      {{--              {!! Form::text('suara3',old('suara3') ?? '',['class' => 'form-control','id' =>'suara'.$calon[2]['id'],'placeholder' =>--}}
      {{--              'Suara']) !!}--}}
      {{--              <div class="form-control-position">--}}
      {{--                <i class="bx bx-calculator"></i>--}}
      {{--              </div>--}}
      {{--            </div>--}}
      {{--          </div>--}}
      {{--        </div>--}}
      {{--      </div>--}}
    </div>
    <div class="form-group">
      <label for="tps-add">Suara Tidak Sah</label>
      <div class="position-relative">
        <div class="form-group">
          {!! Form::number('suara_tidak_sah','',['class' => 'form-control','id' =>'status','placeholder' => 'Input Suara Tidak Sah']) !!}
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
