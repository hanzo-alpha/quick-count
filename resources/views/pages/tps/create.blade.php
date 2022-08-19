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
        <a href="{{ route('data-tps.index') }}" class="btn btn-link mr-1 mb-1"><i class="bx bx-arrow-back"></i> Kembali</a>
        <div class="row match-height">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">TAMBAH TPS</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            {{--                            @if ($errors->any())--}}
                            {{--                                <div class="alert alert-danger">--}}
                            {{--                                    <ul>--}}
                            {{--                                        @foreach ($errors->all() as $error)--}}
                            {{--                                            <li>{{ $error }}</li>--}}
                            {{--                                        @endforeach--}}
                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}

                            <form class="form form-horizontal needs-validation" method="post" action="{{route('data-tps.store') }}" novalidate>
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4 text-right">
                                            <label for="select-provinsi">Provinsi</label>
                                        </div>
                                        <div id="sel-prov" class="col-md-8 form-group ">
                                            <div class="position-relative">
                                                <div class="form-group">
                                                    <select name="prov_id" data-select2-id="select-provinsi" id="select-provinsi" placeholder="Cari
                                                        Provinsi" class="select2 form-control @error('prov_id') is-invalid @enderror"
                                                            required>
                                                    </select>
{{--                                                    <div class="valid-feedback">Example valid custom select feedback</div>--}}
{{--                                                    <div class="invalid-feedback">--}}
{{--                                                        Please Select the field--}}
{{--                                                    </div>--}}
                                                    @error('prov_id')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div id="label-kota" class="col-md-4 text-right">
                                            <label for="select-kota">Kabupaten / Kota</label>
                                        </div>
                                        <div id="sel-kota" class="col-md-8 form-group">
                                            <div class="position-relative">
                                                <div class="form-group">
                                                    <select name="kota_id" data-select2-id="select-kota" id="select-kota" class="select2
                                                    form-control @error('kota_id') is-invalid @enderror" required>
                                                    </select>
{{--                                                    <div class="valid-feedback">Example valid custom select feedback</div>--}}
{{--                                                    <div class="invalid-feedback">--}}
                                                    @error('kota_id')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div id="label-kec" class="col-md-4 text-right">
                                            <label for="select-kec">Kecamatan</label>
                                        </div>
                                        <div id="sel-kec" class="col-md-8 form-group ">
                                            <div class="position-relative">
                                                <div class="form-group">
                                                    <select name="kec_id" data-select2-id="select-kec" id="select-kec"
                                                            class="select2 form-control @error('kec_id') is-invalid @enderror" required>
                                                    </select>
{{--                                                    <div class="valid-feedback">Example valid custom select feedback</div>--}}
{{--                                                    <div class="invalid-feedback">--}}
                                                    @error('kec_id')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div id="label-desa" class="col-md-4 text-right">
                                            <label for="select-desa">Kelurahan / Desa</label>
                                        </div>
                                        <div id="sel-desa" class="col-md-8 form-group ">
                                            <div class="position-relative">
                                                <div class="form-group">
                                                    <select name="kel_id" data-select2-id="select-desa" id="select-desa"
                                                            class="select2 form-control @error('kel_id') is-invalid @enderror" required>
                                                    </select>
{{--                                                    <div class="valid-feedback">Example valid custom select feedback</div>--}}
{{--                                                    <div class="invalid-feedback">--}}
                                                    @error('kel_id')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <label>Nama TPS</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="nama-tps" class="form-control @error('nama_tps') is-invalid @enderror"
                                                       name="nama_tps" placeholder="Nama TPS" required>
                                                <div class="form-control-position">
                                                    <i class="bx bx-box"></i>
                                                </div>
                                                @error('nama_tps')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div><hr>
{{--                                      <div class="divider divider-primary">--}}
{{--                                        <div class="divider-text">Test</div>--}}
{{--                                      </div>--}}

                                        <div class="col-md-4 text-right">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="position-relative has-icon-left">
                                                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                                       name="email" placeholder="Email" required>
                                                <div class="form-control-position">
                                                    <i class="bx bx-mail-send"></i>
                                                </div>
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="position-relative has-icon-left">
                                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                                       name="password" placeholder="Kata Kunci" required>
                                                <div class="form-control-position">
                                                    <i class="bx bx-lock"></i>
                                                </div>
                                                @error('password')
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
        // window.addEventListener('load', function() {
        //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
        //     let forms = document.getElementsByClassName('select');
        //     let invalid = $('.select .invalid-feedback');
        //
        //     // Loop over them and prevent submission
        //     let validation = Array.prototype.filter.call(forms, function(form) {
        //         form.addEventListener('submit', function(event) {
        //             if (form.checkValidity() === false) {
        //                 event.preventDefault();
        //                 event.stopPropagation();
        //                 invalid.css('display', 'block');
        //             } else {
        //                 invalid.css('display', 'none');
        //                 form.classList.add('was-validated');
        //             }
        //         }, false);
        //     });
        // }, false);
        // window.addEventListener('load', function() {
        //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
        //     let forms = document.getElementsByClassName('needs-validation');
        //     // Loop over them and prevent submission
        //     let validation = Array.prototype.filter.call(forms, function(form) {
        //         form.addEventListener('submit', function(event) {
        //             if (form.checkValidity() === false) {
        //                 event.preventDefault();
        //                 event.stopPropagation();
        //             }
        //             form.classList.add('was-validated');
        //         }, false);
        //     });
        // }, false);
        $(function () {
            // Clear Form Value
            $("#btnReset").click(function () {
                let forms = document.getElementsByClassName('needs-validation');
                let validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('reset', function(event) {
                        form.classList.val('');
                    }, false);
                });
                $('.select2').val('').trigger('change');
                toogleKota(0);
                toogleKec(0);
                toogleDesa(0);
            })

            function toogleKota(param) {
                if (param === 0) {
                    $("#label-kota").hide();
                    $("#sel-kota").hide();
                } else {
                    $("#label-kota").show();
                    $("#sel-kota").show();
                }
            }

            function toogleKec(param) {
                if (param === 0) {
                    $("#label-kec").hide();
                    $("#sel-kec").hide();
                } else {
                    $("#label-kec").show();
                    $("#sel-kec").show();
                }
            }

            function toogleDesa(param) {
                if (param === 0) {
                    $("#label-desa").hide();
                    $("#sel-desa").hide();
                } else {
                    $("#label-desa").show();
                    $("#sel-desa").show();
                }
            }

            toogleKota(0);
            toogleKec(0);
            toogleDesa(0);

            let selectProvinsi = $("#select-provinsi");
            let selectKotaKab = $("#select-kota");
            let selectKecamatan = $("#select-kec");
            let selectDesa = $("#select-desa");

            selectProvinsi.select2({
                dropdownAutoWidth: true,
                width: '100%',
                closeOnSelect: true,
                selectOnClose: true,
                allowClear: false,
                ajax: {
                    url: "{!! route('select.prov') !!}",
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
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
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
                placeholder: 'Cari Provinsi',
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                minimumResultsForSearch: 15,
                templateResult: formatProvinsi,
            });

            // Loading remote data
            selectProvinsi.change(function () {
                toogleKota(1);
                $("#select-kota").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    closeOnSelect: true,
                    selectOnClose: true,
                    allowClear: false,
                    ajax: {
                        url: "{!! route('select.kota') !!}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            let query = {
                                q: params.term, // search term
                                i: $("#select-provinsi").find(':selected').val(), // search term
                                type: 'public',
                                page: params.page || 1
                            };
                            return query;
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
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
                    placeholder: 'Cari Kabupaten / Kota',
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    minimumResultsForSearch: 15,
                    templateResult: formatKota,
                    //templateSelection: formatRepoSelection
                });
            });

            selectKotaKab.change(function () {
                toogleKec(1);
                $("#select-kec").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    closeOnSelect: true,
                    selectOnClose: true,
                    allowClear: false,
                    ajax: {
                        url: "{!! route('select.kecamatan') !!}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            let query = {
                                q: params.term, // search term
                                i: $("#select-kota").find(':selected').val(), // search term
                                type: 'public',
                                page: params.page || 1
                            };
                            return query;
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
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
                    placeholder: 'Cari Kecamatan',
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    minimumResultsForSearch: 15,
                    templateResult: formatKota,
                    //templateSelection: formatRepoSelection
                });
            });

            selectKecamatan.change(function () {
                toogleDesa(1);
                $("#select-desa").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    closeOnSelect: true,
                    selectOnClose: true,
                    allowClear: false,
                    ajax: {
                        url: "{!! route('select.desa') !!}",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            let query = {
                                q: params.term, // search term
                                i: $("#select-kec").find(':selected').val(),
                                type: 'public',
                                page: params.page || 1
                            };
                            return query;
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
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
                    placeholder: 'Cari Kelurahan / Desa',
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    //minimumInputLength: 1,
                    minimumResultsForSearch: 15,
                    templateResult: formatKota,
                    //templateSelection: formatRepoSelection
                });
            });

            function formatKota(result) {
                if (result.loading) return result.text;
                let tpl = '<span><b>' + result.text + '</b></span><br><small>' + result.name
                    + '</small>'
                return tpl;
            }

            function formatProvinsi(result) {
                if (result.loading) return result.text;
                let tpl = '<span><b>' + result.text + '</b></span>';
                return tpl;
            }
        });
    </script>
@endsection
