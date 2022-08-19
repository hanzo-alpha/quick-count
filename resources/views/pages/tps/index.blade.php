@extends('layouts.contentLayoutMaster')

{{-- title --}}
@section('title','TPS')

{{-- vendor style --}}
@section('vendor-styles')
@endsection

{{-- page-styles --}}
@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

@section('content')
    <!-- Content Start -->
    <section class="users-list-wrapper">
        {{--      @include('widgets.filter')--}}
        @include('flash::message')
        <div class="user-list-table">
            <div class="card">
                <div class="card-header">
                    <!-- head -->
                    <h5 class="card-title">Data TPS</h5>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li class="ml-2">
                                <button type="button" id="btnTambah" class="btn btn-primary glow modal-loader" data-toggle="modal"
                                        data-target="#modal-form" data-url="{{ route('data-tps.create') }}" title="TAMBAH DATA TPS">
                                    <i class="bx bx-plus-circle"></i>
                                    Tambah TPS
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body m-0">
                        {{--              <div class="table-responsive">--}}
                        <table id="table-tps" class="table table-hover">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th>No</th>
                                {{--                                    <th>Provinsi</th>--}}
                                {{--                                    <th>Kota</th>--}}
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Nama TPS</th>
                                <th>Jumlah TPS</th>
{{--                                <th>Status</th>--}}
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                        {{--              </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content end -->
    @include('widgets.modal')
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')

@endsection

{{-- page scripts --}}
@section('page-scripts')

    <script>
        $(function () {
            // Livewire Component
            // $('#btnTambah').on('click', function () {
            //     $('#createModal').on('show.bs.modal', function () {
            //         // alert('onShow event fired.');
            //     });
            // });
            // document.addEventListener('livewire:load', function () {
            //     window.livewire.on('tpsStore', () => {
            //         $('#create-modal').modal('hide');
            //     });
            // })

            /* Datatable data from database */

            // let groupingTable = $('.row-grouping').DataTable({
            //     "columnDefs": [{
            //         "visible": false,
            //         "targets": 2
            //     }],
            //     "order": [
            //         [2, 'asc']
            //     ],
            //     "displayLength": 10,
            //     "drawCallback": function(settings) {
            //         let api = this.api();
            //         let rows = api.rows({
            //             page: 'current'
            //         }).nodes();
            //         let last = null;
            //
            //         api.column(2, {
            //             page: 'current'
            //         }).data().each(function(group, i) {
            //             if (last !== group) {
            //                 $(rows).eq(i).before(
            //                     '<tr class="group"><td colspan="5">' + group + '</td></tr>'
            //                 );
            //
            //                 last = group;
            //             }
            //         });
            //     }
            // });

            let tabelTps = $('#table-tps').DataTable({
                // dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('tps.list') !!}'
                },
                order: [
                    [1, 'asc']
                ],
                // displayLength : 10,
                columns: [
                    // {data: 'DT_RowIndex',searchable: false, orderable: false},
                    {data: 'id', name: 'id'},
                    // {data: 'provinsi.name', name: 'prov_id', searchable: false, orderable: false},
                    // {data: 'kota.name', name: 'kota_id', searchable: false, orderable: false},
                    // {data: 'kecamatan', name: 'kec_id'},
                    {data: 'kec_id', name: 'kec_id'},
                    {data: 'kel_id', name: 'kel_id'},
                    // {data: 'desa', name: 'kel_id'},
                    {data: 'nama_tps', name: 'nama_tps'},
                    {data: 'jumlah_tps', name: 'jumlah_tps'},
                    // {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', searchable: false, orderable: false}
                ],
                columnDefs: [
                    {
                        "orderable": false,
                        // "targets": [0,3]
                    },
                ],
                drawCallback: function (settings) {
                    let api = this.api();
                    let rows = api.rows({
                        page: 'current'
                    }).nodes();
                    let last = null;

                    api.column(1, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group bg-rgba-info"><td colspan="8">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                },
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'XLS',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'print',
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .prepend(
                                    '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                                );

                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        },
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    }
                ]
            });
            // Grouping Tabel
            $('#table-tps tbody').on('click', 'tr.group', function () {
                let currentOrder = tabelTps.order()[0];
                if (currentOrder[0] === 3 && currentOrder[1] === 'asc') {
                    tabelTps.order([3, 'desc']).draw();
                } else {
                    tabelTps.order([3, 'asc']).draw();
                }
            });

            /* Lapor Kegiatan Pegawai Ajax */
            // btnLapor.click(function () {
            //     Swal.fire({
            //         // title: 'Lapor kegiatan anda sekarang ?',
            //         text: "Lapor kegiatan anda sekarang ?",
            //         type: 'question',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Lapor',
            //         showLoaderOnConfirm: true,
            //         preConfirm: () => {
            //             let a = document.getElementById('filter-tglharian').value;
            //             return $.post(base_url + `/pegawai/lapor-kegiatan?t=${a}`)
            //                 .then(response => {
            //                     if (!response.status && response.error === 1) {
            //                         Swal.showValidationMessage(
            //                             response.msg
            //                         );
            //                     }
            //                     return response;
            //                 })
            //         },
            //         allowOutsideClick: () => !Swal.isLoading()
            //     }).then((result) => {
            //         if (result.value) {
            //             Swal.fire({
            //                 text: `${result.value.msg}`,
            //                 type: 'success'
            //             });
            //             tabelKegiatan.DataTable().ajax.reload();
            //         }
            //     })
            // });
        });
    </script>
@endsection
