<div>
  {{-- In work, do what you enjoy. --}}
  <div class="row">
    <div class="col-12">
      <div class="card">
        <h5 class="card-title"></h5>
        <div class="card-content">
          <div class="card-body">
            <form wire:submit.prevent="submit" class="form form-vertical" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-5 col-12">
                  <div class="form-group">
                    <label for="select-kecamatan-add">Kecamatan</label>
                    <div class="position-relative">
                      <div wire:ignore class="form-group">
                        <select class="form-control selectKecAdd select2" id="select-kecamatan-add" tabindex="-1" aria-hidden="true" name="kecamatan"
                                placeholder="Pilih Kecamatan">
                          <option value="">Pilih Kecamatan</option>
                          @foreach($kec as $val)
                            <option value="{{ $val->id }}"> {{ $val->name }}</option>
                          @endforeach
                        </select>
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
                      <div wire:ignore class="form-group">
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
                        {{--              <input type="text" class="form-control" id="tps-add" placeholder="TPS" wire:model.lazy="tps">--}}
                        {!! Form::text('tps','',['class' => 'form-control','id' =>'tps-add','placeholder' => 'TPS','wire:model.lazy' => 'tps']) !!}
                        @error('tps')
                        <div class="invalid-feedback">
                          <i class="bx bx-radio-circle"></i>
                          {{ $message }}
                        </div>
                        @enderror
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
                        {{--              {!! Form::hidden('calon1_id',$calon[0]['id']) !!}--}}
                        {!! Form::text('nama_calon1',$calon[0]['id'].'. '.$calon[0]['nama_calon_1'] .' - '. $calon[0]['nama_calon_2'],['class' =>
                        'form-control','id'=>'calon-add','placeholder' => 'Suara','readonly','wire.model.lazy' => 'nama_calon1']) !!}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="tps-add">Jumlah Suara</label>
                    <div class="position-relative">
                      <div class="form-group">
                        {!! Form::text('suara1',old('suara1') ?? '',['class' => 'form-control','id' =>'suara'.$calon[0]['id'],'placeholder' =>
                        'Suara','wire.model.lazy' => 'suara1']) !!}
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
                        'form-control','id' =>'calon-add', 'placeholder' => 'Suara','readonly','wire.model.lazy' => 'nama_calon2']) !!}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <div class="position-relative">
                      <div class="form-group">
                        {!! Form::text('suara2',old('suara2') ?? '',['class' => 'form-control','id' =>'suara'.$calon[1]['id'],'placeholder' =>
                        'Suara','wire.model.lazy' => 'suara2']) !!}
                        <div class="form-control-position">
                          <i class="bx bx-calculator"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="tps-add">Suara Tidak Sah</label>
                <div class="position-relative">
                  <div class="form-group">
                    {!! Form::number('suara_tidak_sah','',['class' => 'form-control','id' =>'status','placeholder' => 'Input Suara Tidak Sah','wire.model
                    .lazy' => 'suara_tidak_sah']) !!}
                  </div>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end ">
                <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@section('page-scripts')
  <script>
    {{--function formatSuaraCalon(result) {--}}
    {{--  if (result.loading) return result.text;--}}
    {{--  let tpl = '<span><b>' + result.text + '</b></span><br><small>' + result.info + '</small>';--}}
    {{--  return tpl;--}}
    {{--}--}}

    {{--function formatKota(result) {--}}
    {{--  if (result.loading) return result.text;--}}
    {{--  let tpl = '<span><b>' + result.text + '</b></span><br><small>' + result.name--}}
    {{--    + '</small>'--}}
    {{--  return tpl;--}}
    {{--}--}}

    {{--function formatDefault(result) {--}}
    {{--  if (!result.id) return result.text;--}}
    {{--  let tpl = $('<span><b>' + result.text + '</b></span>');--}}
    {{--  return tpl;--}}
    {{--}--}}

    {{--function setTemplate(tipe) {--}}
    {{--  let tpl = '';--}}
    {{--  switch (tipe) {--}}
    {{--    case 'suaracalon':--}}
    {{--      tpl = formatSuaraCalon;--}}
    {{--      break;--}}
    {{--    case 'kota':--}}
    {{--      tpl = formatKota;--}}
    {{--      break;--}}
    {{--    default:--}}
    {{--      tpl = formatDefault;--}}
    {{--      break;--}}
    {{--  }--}}
    {{--  return tpl;--}}
    {{--}--}}

    {{--function renderSelect(selectInit, url, tpl, placehld, param) {--}}
    {{--  return selectInit.select2({--}}
    {{--    dropdownAutoWidth: true,--}}
    {{--    width: '100%',--}}
    {{--    closeOnSelect: true,--}}
    {{--    selectOnClose: false,--}}
    {{--    allowClear: true,--}}
    {{--    minimumResultsForSearch: 15,--}}
    {{--    placeholder: placehld,--}}
    {{--    ajax: {--}}
    {{--      url: url,--}}
    {{--      delay: 250,--}}
    {{--      dataType: 'json',--}}
    {{--      data: function (params) {--}}
    {{--        let query = {--}}
    {{--          q: params.term,--}}
    {{--          i: param,--}}
    {{--          type: 'public',--}}
    {{--          page: params.page || 1--}}
    {{--        };--}}
    {{--        return query;--}}
    {{--      },--}}
    {{--      processResults: function (data, params) {--}}
    {{--        params.page = params.page || 1;--}}

    {{--        return {--}}
    {{--          results: data.results,--}}
    {{--          pagination: {--}}
    {{--            more: (params.page * 15) < data.total_count--}}
    {{--          }--}}
    {{--        };--}}
    {{--      },--}}
    {{--      cache: true--}}
    {{--    },--}}
    {{--    escapeMarkup: function (markup) {--}}
    {{--      return markup;--}}
    {{--    },--}}
    {{--    templateResult: tpl,--}}
    {{--  });--}}
    {{--}--}}

    {{--function kecamatanChange(param) {--}}
    {{--  if (param === 'edit') {--}}
    {{--    $("#select-kecamatan-edit").change(function () {--}}
    {{--      let selectDesa = $("#select-desa-edit");--}}
    {{--      selectDesa.prop("disabled", false);--}}
    {{--      return renderSelect(selectDesa, "{!! route('select.desa') !!}", setTemplate('kota'), 'Pilih Kelurahan/Desa', $("#select-kecamatan-edit").find--}}
    {{--      (':selected').val());--}}
    {{--    });--}}
    {{--  } else {--}}
    {{--    $("#select-kecamatan-add").change(function () {--}}
    {{--      // let selectDesa = $("#select-desa-add");--}}
    {{--      // selectDesa.prop("disabled", false);--}}
    {{--      return renderSelect($("#select-desa-add"), "{!! route('select.desa') !!}", setTemplate('kota'), 'Pilih Kelurahan/Desa', $("#select-kecamatan-add").find--}}
    {{--      (':selected').val());--}}
    {{--    });--}}
    {{--  }--}}
    {{--}--}}

    {{--function desaChange(param) {--}}
    {{--  if (param !== 'edit') {--}}
    {{--    $("#select-desa-add").change(function () {--}}
    {{--      let fieldTps = $("#tps-add");--}}
    {{--      fieldTps.prop("disabled", false);--}}
    {{--    });--}}
    {{--  } else {--}}
    {{--    $("#select-desa-edit").change(function () {--}}
    {{--      let fieldTps = $("#tps-edit");--}}
    {{--      fieldTps.prop("disabled", false);--}}
    {{--    });--}}
    {{--  }--}}
    {{--}--}}
    {{--function disabledSelect() {--}}
    {{--  $("#tps-add").prop("disabled", true);--}}
    {{--  // $("#tps-edit").prop("disabled", true);--}}
    {{--  $("#status").prop("disabled", true);--}}
    {{--  $("#status-edit").prop("disabled", true);--}}
    {{--  $("#calon-1").prop("disabled", true);--}}
    {{--  $("#calon-2").prop("disabled", true);--}}
    {{--  $("#suara1").prop("disabled", true);--}}
    {{--  $("#suara2").prop("disabled", true);--}}
    {{--  $("#select-desa-add").prop("disabled", true);--}}
    {{--  // $("#select-desa-edit").prop("disabled", true);--}}
    {{--}--}}


    {{--renderSelect($("#select-kecamatan-add"), '{!! route('select.kecamatan') !!}', setTemplate('kota'), 'Pilih Kecamatan');--}}
    {{--renderSelect($("#select-desa-add"), '{!! route('select.desa') !!}', setTemplate('kota'), 'Pilih Kelurahan/Desa');--}}

    {{--$("#select-kecamatan-add").change(function () {--}}
    {{--  let selectDesa = $("#select-desa-add");--}}
    {{--  selectDesa.prop("disabled", false);--}}
    {{--  renderSelect($("#select-desa-add"), "{!! route('select.desa') !!}", setTemplate('kota'), 'Pilih Kelurahan/Desa', $("#select-kecamatan-add").find(':selected').val--}}
    {{--  ());--}}
    {{--});--}}

    $(document).ready(function () {
      disabledSelect();
      // kecamatanChange();

      $("#btnReset").click(function () {
        let forms = document.getElementsByClassName('needs-validation');
        let validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('reset', function (event) {
            form.classList.val('');
          }, false);
        });
        $('.select2').val('').trigger('change');
      })
    })
  </script>
@endsection
