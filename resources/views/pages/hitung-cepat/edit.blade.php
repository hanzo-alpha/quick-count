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
      <div class="col-9">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">TAMBAH CALON</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form class="form form-horizontal needs-validation" method="post" action="{{route('data-calon.store') }}" novalidate>
                @csrf
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-4 text-right">
                      <label for="select-provinsi">Jenis Calon</label>
                    </div>
                    <div id="sel-jenis" class="col-md-8 form-group ">
                      <div class="position-relative">
                        <div class="form-group">
                          <select name="jenis_calon" data-select2-id="select-jeniscalon" id="select-jeniscalon"
                                  placeholder="Cari Jenis Calon" class="select2 form-control @error('jenis_calon')
                            is-invalid @enderror" required>
                          </select>
                          {{--                                                    <div class="valid-feedback">Example valid custom select feedback</div>--}}
                          {{--                                                    <div class="invalid-feedback">--}}
                          {{--                                                        Please Select the field--}}
                          {{--                                                    </div>--}}
                          @error('jenis_calon')
                          <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-right">
                      <label>Nama Calon 1</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <div class="position-relative has-icon-left">
                        <input type="text" id="nama-calon1" class="form-control @error('nama_calon_1') is-invalid @enderror"
                               name="nama_calon_1" placeholder="Nama Calon 1" required>
                        <div class="form-control-position">
                          <i class="bx bx-box"></i>
                        </div>
                        @error('nama_calon_1')
                        <div class="invalid-feedback">
                          <i class="bx bx-radio-circle"></i>
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-4 text-right">
                      <label for="nama-calon2">Nama Calon 2</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <div class="position-relative has-icon-left">
                        <input type="text" id="nama-calon2" class="form-control @error('nama_calon_2') is-invalid @enderror"
                               name="nama_calon_2" placeholder="Nama Calon 2" required>
                        <div class="form-control-position">
                          <i class="bx bx-box"></i>
                        </div>
                        @error('nama_calon_2')
                        <div class="invalid-feedback">
                          <i class="bx bx-radio-circle"></i>
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end ">
                      <button id="btnSubmit" type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                      <button id="btnReset" type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
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

      let selectJenisCalon = $("#select-jeniscalon");

      selectJenisCalon.select2({
        dropdownAutoWidth: true,
        width: '100%',
        closeOnSelect: true,
        selectOnClose: false,
        allowClear: false,
        ajax: {
          url: "{!! route('select.jeniscalon') !!}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            let query = {
              q: params.term, // search term
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
        placeholder: 'Cari Jenis Salon',
        escapeMarkup: function (markup) {
          return markup;
        }, // let our custom formatter work
        //minimumInputLength: 1,
        minimumResultsForSearch: 15,
        templateResult: formatJenisCalon,
      });

      function formatJenisCalon(result) {
        if (result.loading) return result.text;
        let tpl = '<span><b>' + result.text + '</b></span>';
        return tpl;
      }
    });
  </script>
@endsection
