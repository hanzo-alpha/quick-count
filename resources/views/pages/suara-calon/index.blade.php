@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Datatables')

{{-- vendor style --}}
@section('vendor-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-analytics.css')}}">
@endsection
{{-- page-styles --}}

@section('content')
  {{--  <section id="dashboard-analytics">--}}
  {{--    @livewire('pilkada.hitung-cepat')--}}
  {{--  </section>--}}
  <!-- Zero configuration table -->
  <section id="basic-datatable">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- head -->
            <h5 class="card-title">PERHITUNGAN SUARA CEPAT PASANGAN CALON (PASLON)</h5>
            <!-- Single Date Picker and button -->
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li class="ml-2">
                  <button type="button" id="btnTambah" class="btn btn-primary modal-loader" data-toggle="modal"
                          data-target="#modal-form" data-url="{{ route('data-suara-calon.create') }}" title="TAMBAH DATA SUARA CALON">
                    <i class="bx bx-plus-circle"></i>
                    Tambah
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-content">
            <div class="card-body m-0">
              {{--                            <div class="table-responsive">--}}
              <table id="table-suaracalon" class="table table-hover table-responsive">
                <thead class="thead-light">
                <tr class="text-center">
                  <th width="3%">No</th>
                  {{--                                  <th>Kecamatan</th>--}}
                  <th>Kec / Kel</th>
                  <th>TPS</th>
                  <th>Nama Calon 1</th>
                  <th>Nama Calon 2</th>
                  <th>Suara Calon</th>
                  {{--                                  <th>Persentase Calon 1</th>--}}
                  {{--                                  <th>Persentase Calon 2</th>--}}
                  {{--                                  <th>Total Suara Calon</th>--}}
                  {{--                                    <th>Status</th>--}}
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
  <script src="{{asset('vendors/js/tables/datatable/dataTables.checkboxes.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
  <script>
    $(function () {
      let tabelCalon = $('#table-suaracalon').DataTable({
        // dom: 'Bfrtip',
        processing: true,
        serverSide: true,
        ajax: {
          url: '{!! route('suaracalon.list') !!}'
        },
        columns: [
          {data: 'id', name: 'suara_calon.id'},
          {data: 'kecamatan', name: 'indonesia_districts.name'},
          // {data: 'kelurahan', name: 'indonesia_villages.name'},
          {data: 'nama_tps', name: 'tps.nama_tps'},
          {data: 'nama_calon_1', name: 'calon.nama_calon_1'},
          {data: 'nama_calon_2', name: 'calon.nama_calon_2'},
          {data: 'jumlah_suara', name: 'suara_calon.jumlah_suara'},
          // {data: 'total_suara', name: 'suara_calon.total_suara'},
          // {data: 'persentase_suara_1', name: 'suara_calon.persentase_suara_1'},
          // {data: 'persentase_suara_2', name: 'suara_calon.persentase_suara_2'},
          // {data: 'status', name: 'calon.status'},
          {data: 'action', name: 'action', searchable: false, orderable: false}
        ],
        columnDefs: [{
          render: function (data, type, row) {
            return data + ' / ' + row['kelurahan'];
          },
          "targets": 1
        },
          {"visible": false, "targets": 2}
        ]
        // columnDefs: [
        //     {
        //         "orderable": true,
        //         // "targets": [0,3]
        //     },
        // ],
        // drawCallback : function(settings) {
        //     let api = this.api();
        //     let rows = api.rows({
        //         page: 'current'
        //     }).nodes();
        //     let last = null;
        //
        //     api.column(1, {
        //         page: 'current'
        //     }).data().each(function(group, i) {
        //         if (last !== group) {
        //             $(rows).eq(i).before(
        //                 '<tr class="group"><td colspan="8">' + group + '</td></tr>'
        //             );
        //
        //             last = group;
        //         }
        //     });
        // },
        // buttons: [
        //     {
        //         extend: 'copyHtml5',
        //         exportOptions: {
        //             columns: [0,1,2,3,4,5,6]
        //         }
        //     },
        //     {
        //         extend: 'excelHtml5',
        //         text: 'XLS',
        //         exportOptions: {
        //             columns: [0,1,2,3,4,5,6]
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         exportOptions: {
        //             columns: [0,1,2,3,4,5,6]
        //         }
        //     },
        //     {
        //         extend: 'print',
        //         exportOptions: {
        //             columns: [0,1,2,3,4,5,6]
        //         }
        //     }
        // ]
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
    });
  </script>
@endsection
