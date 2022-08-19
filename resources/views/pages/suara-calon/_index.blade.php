@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Datatables')

{{-- vendor style --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
{{-- page-styles --}}

@section('content')
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- head -->
                        <h5 class="card-title">DATA PASANGAN CALON (PASLON)</h5>
                        <!-- Single Date Picker and button -->
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li class="ml-2">
{{--                                    <button type="button" id="btnTambah" class="btn btn-primary" data-toggle="modal" data-target="#createModal">--}}
{{--                                        <i class="bx bx-plus-circle"></i>--}}
{{--                                        Tambah--}}
{{--                                    </button>--}}
                                    <a href="{{ route('data-calon.create') }}" class="btn btn-primary"><i class="bx bx-plus-circle"></i> Tambah</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body m-0">
                            <table id="table-calon" class="table table-hover table-responsive">
                                <thead class="thead-light">
                                <tr class="text-center">
                                    <th width="3%">No</th>
                                    <th>Jenis Calon</th>
                                    <th>Nama Calon 1</th>
                                    <th>Nama Calon 2</th>
                                    <th>Status</th>
                                    <th width="3%">Aksi</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
{{--    @include('livewire.create-tps')--}}
    @include('widgets.modal')
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
{{--<script src="{{asset('js/scripts/modal/components-modal.js')}}"></script>--}}
<script>
    $(function () {

        let tabelCalon = $('#table-calon').DataTable({
            // dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! route('calon.list') !!}'
            },
            columns: [
                {data: 'id', name:'calon.id'},
                {data: 'jenis_calon', name: 'ref_jenis_calon.jenis_calon'},
                {data: 'nama_calon_1', name: 'calon.nama_calon_1'},
                {data: 'nama_calon_2', name: 'calon.nama_calon_2'},
                {data: 'status', name: 'calon.status'},
                {data: 'action', name: 'action', searchable: false, orderable: false}
            ],
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
    });
</script>
@endsection
