@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Hitung Cepat')

{{-- vendor style --}}
@section('vendor-styles')
{{--  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">--}}
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-analytics.css')}}">
{{--  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/hitung-cepat.min.css')}}">--}}
@endsection
{{-- page-styles --}}

@section('content')
  <section>
    @include('flash::message')
    @include('widgets.error')
  </section>
  <section>
{{--    @include('widgets.filter-hitung',['kecamatan' => $kecamatan])--}}
  </section>

  <!-- Zero configuration table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- head -->
            <h5 class="card-title">PERHITUNGAN SUARA CEPAT PASANGAN CALON (PASLON)</h5>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li class="ml-2">

                  <a href="{{ route('hitung.export') }}" class="btn btn-danger">
                    <i class="bx bx-export"></i>
                    Eksport
                  </a>
                  <button type="button" id="btnTambah" class="btn btn-primary modal-loader" data-toggle="modal"
                          data-target="#modal-form" data-url="{{ route('hitung-cepat.create') }}" title="TAMBAH DATA HITUNG SUARA">
                    <i class="bx bx-plus-circle"></i>
                    Tambah
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-content">
            <div class="card-body m-0">
{{--              <div class="table-responsive">--}}
                <table id="table-hitungcepat" class="table table-hover table-responsive">
                  <thead class="thead-light">
                  <tr class="text-center">
                    <th width="3%">No</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>TPS</th>
                    <th>Suara Calon 1</th>
                    <th>Suara Calon 2</th>
                    <th>Suara Tidak Sah</th>
                    <th width="3%">Aksi</th>
                  </tr>
                  </thead>
                </table>
              {{--                            </div>--}}
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('widgets.modal')
  </section>
@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
  <script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
  {{--    <script src="{{asset('vendors/js/tables/datatable/dataTables.checkboxes.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/jszip/dist/jszip.min.js')}}"></script>--}}
  <script src="{{asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
  {{--  <script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>--}}
@endsection
{{-- page scripts --}}
@section('page-scripts')
  <script>
    $(function () {
      let tabelHitung = $('#table-hitungcepat').DataTable({
        // dom: 'Bfrtip',
        processing: true,
        serverSide: true,
        ajax: {
          url: '{!! route('hitungsuara.list') !!}'
        },
        columns: [
          {data: 'id', name: 'id'},
          {data: 'kecamatan.name', name: 'kecamatan'},
          {data: 'desa.name', name: 'desa'},
          {data: 'no_tps', name: 'no_tps'},
          {data: 'suara1', name: 'suara1'},
          {data: 'suara2', name: 'suara2'},
          {data: 'suara_tidak_sah', name: 'suara_tidak_sah'},
          {data: 'action', name: 'action', searchable: false, orderable: false}
        ],
      });

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

      // page users list verified filter
      $("#filter-kecamatan").on("change", function () {
        let usersVerifiedSelect = $("#filter-kecamatan").val();
        tabelHitung.search(usersVerifiedSelect).draw();
      });
      // page users list role filter
      $("#filter-kelurahan").on("change", function () {
        let usersRoleSelect = $("#filter-kelurahan").val();
        // console.log(usersRoleSelect);
        tabelHitung.search(usersRoleSelect).draw();
      });
      // page users list clear filter
      $(".users-list-clear").on("click", function () {
        tabelHitung.search("").draw();
      })
    });
  </script>
@endsection
