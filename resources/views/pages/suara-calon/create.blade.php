@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Datatables')

{{-- vendor style --}}
@section('vendor-styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/forms/select/select2.min.css')}}">
@endsection
{{-- page-styles --}}

@section('content')
  <div class="row">
    <div class="col-12">

    </div>
  </div>
  <!-- Zero configuration table -->
  <section id="add-tps">
    <a href="{{ route('data-calon.index') }}" class="btn btn-link mr-1 mb-1"><i class="bx bx-arrow-back"></i> Kembali</a>
    <div class="row match-height">
      <div class="col-md-8 col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">INPUT DATA SUARA CALON</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form class="form form-vertical needs-validation" method="post" action="{{route('data-calon.store') }}" novalidate>
                @csrf
                <div class="form-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="select-provinsi">Pasangan Calon</label>
                        <div class="position-relative">
                          <div class="form-group">
                            <select name="paslon" data-select2-id="select-paslon" id="select-paslon"
                                    placeholder="Cari Pasangan Calon" class="select2 form-control @error('paslon')
                              is-invalid @enderror" required>
                              @isset($data)
                                @foreach($data as $item)
                                  <option value="{{$item['id']}}">{{ $item['text'] }}</option>
                                @endforeach
                              @endisset
                            </select>
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
                        <label for="select-provinsi">TPS</label>
                        <div class="position-relative">
                          <div class="form-group">
                            <select name="tps" data-select2-id="select-tps" id="select-tps"
                                    placeholder="Pilih TPS" class="select2 form-control @error('tps')
                              is-invalid @enderror" required>
                            </select>
                            @error('tps')
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
{{--                      <div class="row">--}}
{{--                        <div class="col-md-6 col-12">--}}
{{--                          <div class="form-group has-icon-left">--}}
{{--                            <label for="total-suara-calon1">Total Suara Calon 1</label>--}}
{{--                            <div class="position-relative">--}}
{{--                              <input type="text" id="total-suara-calon1" class="form-control @error('total_suara_calon_1') is-invalid @enderror"--}}
{{--                                     name="total_suara_calon_1" placeholder="Total Suara Calon 1" required>--}}
{{--                              <div class="form-control-position">--}}
{{--                                <i class="bx bx-calculator"></i>--}}
{{--                              </div>--}}
{{--                              @error('total_suara_calon_1')--}}
{{--                              <div class="invalid-feedback">--}}
{{--                                <i class="bx bx-radio-circle"></i>--}}
{{--                                {{ $message }}--}}
{{--                              </div>--}}
{{--                              @enderror--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-12">--}}
{{--                          <div class="form-group has-icon-left">--}}
{{--                            <label for="total-suara-calon2">Total Suara Calon 2</label>--}}
{{--                            <div class="position-relative">--}}
{{--                              <input type="text" id="total-suara-calon2" class="form-control @error('total_suara_calon_2') is-invalid @enderror"--}}
{{--                                     name="total_suara_calon_2" placeholder="Total Suara Calon 2" required>--}}
{{--                              <div class="form-control-position">--}}
{{--                                <i class="bx bx-calculator"></i>--}}
{{--                              </div>--}}
{{--                              @error('total_suara_calon_1')--}}
{{--                              <div class="invalid-feedback">--}}
{{--                                <i class="bx bx-radio-circle"></i>--}}
{{--                                {{ $message }}--}}
{{--                              </div>--}}
{{--                              @enderror--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                      <div class="row">--}}
{{--                        <div class="col-md-6 col-12">--}}
{{--                          <div class="form-group has-icon-left">--}}
{{--                            <label for="total-suara-calon1">Persentase Suara Calon 1</label>--}}
{{--                            <div class="position-relative">--}}
{{--                              <input type="text" id="persentase-suara-calon1" class="form-control @error('persentase_suara_calon_1') is-invalid--}}
{{--@enderror"--}}
{{--                                     name="persentase_suara_calon_1" placeholder="Persentase Suara Calon 1" required>--}}
{{--                              <div class="form-control-position">--}}
{{--                                <i class="bx bx-pulse"></i>--}}
{{--                              </div>--}}
{{--                              @error('persentase_suara_calon_1')--}}
{{--                              <div class="invalid-feedback">--}}
{{--                                <i class="bx bx-radio-circle"></i>--}}
{{--                                {{ $message }}--}}
{{--                              </div>--}}
{{--                              @enderror--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-12">--}}
{{--                          <div class="form-group has-icon-left">--}}
{{--                            <label for="persentase-suara-calon2">Persentase Suara Calon 2</label>--}}
{{--                            <div class="position-relative">--}}
{{--                              <input type="text" id="persentase-suara-calon2" class="form-control @error('persentase_suara_calon_2') is-invalid--}}
{{--@enderror"--}}
{{--                                     name="persentase_suara_calon_2" placeholder="Persentase Suara Calon 2" required>--}}
{{--                              <div class="form-control-position">--}}
{{--                                <i class="bx bx-pulse"></i>--}}
{{--                              </div>--}}
{{--                              @error('persentase_suara_calon_2')--}}
{{--                              <div class="invalid-feedback">--}}
{{--                                <i class="bx bx-radio-circle"></i>--}}
{{--                                {{ $message }}--}}
{{--                              </div>--}}
{{--                              @enderror--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                        </div>--}}
{{--                      </div>--}}
                      <div class="col-12 d-flex justify-content-end ">
                        <button id="btnSubmit" type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                        <button id="btnReset" type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Zero configuration table -->

@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
  <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{asset('js/scripts/forms/select/form-select2.js')}}"></script>
@endsection
{{-- page scripts --}}
{{--    <script src="{{asset('js/scripts/forms/form-tooltip-valid.js')}}"></script>--}}
@section('page-scripts')
  <script>
    $(function () {
      // Clear Form Value
      $("#btnReset").click(function () {
        let forms = document.getElementsByClassName('needs-validation');
        let validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('reset', function (event) {
            form.classList.val('');
          }, false);
        });
        $('.select2').val('').trigger('change');
      })

      let selectPaslon = $("#select-paslon");
      let selectTps = $("#select-tps");

      selectTps.select2({
        dropdownAutoWidth: true,
        width: '100%',
        closeOnSelect: true,
        selectOnClose: false,
        allowClear: false,
        ajax: {
          url: "{!! route('select.tps') !!}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            let query = {
              q: params.term,
              type: 'public',
              page: params.page || 1
            };
            return query;
          },
          processResults: function (data, params) {
            params.page = params.page || 1;

            return {
              results: data.results,
              pagination: {
                more: (params.page * 15) < data.total_count
              }
            };
          },
          cache: true
        },
        placeholder: 'Cari TPS',
        escapeMarkup: function (markup) {
          return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        minimumResultsForSearch: 15,
        templateResult: formatJenisCalon,
      });

      selectPaslon.select2({
        dropdownAutoWidth: true,
        width: '100%',
        closeOnSelect: true,
        selectOnClose: false,
        allowClear: false,
        ajax: {
          url: "{!! route('select.paslon') !!}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            let query = {
              q: params.term,
              i: $("#select-paslon").find(':selected').val(),
              type: 'public',
              page: params.page || 1
            };
            return query;
          },
          processResults: function (data, params) {
            params.page = params.page || 1;

            return {
              results: data.results,
              pagination: {
                more: (params.page * 15) < data.total_count
              }
            };
          },
          cache: true
        },
        placeholder: 'Cari Pasangan Calon',
        escapeMarkup: function (markup) {
          return markup;
        }, // let our custom formatter work
        //minimumInputLength: 1,
        minimumResultsForSearch: 15,
        templateResult: formatJenisCalon,
      });

      function formatJenisCalon(result) {
        if (result.loading) return result.text;
        let tpl = '<span><b>' + result.text + '</b></span><br><small>' + result.info + '</small>';
        return tpl;
      }
    });
  </script>
@endsection
