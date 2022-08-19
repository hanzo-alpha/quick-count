@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Datatables')

{{-- vendor style --}}
@section('vendor-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
{{-- page-styles --}}
@section('page-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-user.css')}}">
@endsection

@section('content')
  <!-- users view start -->
  <section class="users-view">
    <!-- users view media object start -->
    <div class="row">
      <div class="col-12 col-sm-7">
        <div class="media mb-2">
          <a class="mr-1" href="#">
            <img src="{{ asset('images/portrait/small/avatar-s-26.jpg') }}" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
          </a>
          <div class="media-body pt-25">
            <h4 class="media-heading"><span class="users-view-name">Dean Stanley </span><span class="text-muted font-medium-1"> @</span><span class="users-view-username text-muted font-medium-1 ">candy007</span></h4>
            <span>ID:</span>
            <span class="users-view-id">305</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
        <a href="#" class="btn btn-sm mr-25 border"><i class="bx bx-envelope font-small-3"></i></a>
        <a href="#" class="btn btn-sm mr-25 border">Profile</a>
        <a href="{{ route('pengguna.edit',1) }}" class="btn btn-sm btn-primary">Edit</a>
      </div>
    </div>
    <!-- users view media object ends -->
    <!-- users view card data start -->
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-4">
              <table class="table table-borderless">
                <tbody>
                <tr>
                  <td>Registered:</td>
                  <td>01/01/2019</td>
                </tr>
                <tr>
                  <td>Latest Activity:</td>
                  <td class="users-view-latest-activity">30/04/2019</td>
                </tr>
                <tr>
                  <td>Verified:</td>
                  <td class="users-view-verified">Yes</td>
                </tr>
                <tr>
                  <td>Role:</td>
                  <td class="users-view-role">Staff</td>
                </tr>
                <tr>
                  <td>Status:</td>
                  <td><span class="badge badge-light-success users-view-status">Active</span></td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="col-12 col-md-8">
              <div class="table-responsive">
                <table class="table mb-0">
                  <thead>
                  <tr>
                    <th>Module Permission</th>
                    <th>Read</th>
                    <th>Write</th>
                    <th>Create</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Users</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>No</td>
                    <td>Yes</td>
                  </tr>
                  <tr>
                    <td>Articles</td>
                    <td>No</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>Yes</td>
                  </tr>
                  <tr>
                    <td>Staff</td>
                    <td>Yes</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>No</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- users view card data ends -->
    <!-- users view card details start -->
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Posts: <span class="font-large-1 align-middle">125</span></h6>
            </div>
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Followers: <span class="font-large-1 align-middle">534</span></h6>
            </div>
            <div class="col-12 col-sm-4 p-2">
              <h6 class="text-primary mb-0">Following: <span class="font-large-1 align-middle">256</span></h6>
            </div>
          </div>
          <div class="col-12">
            <table class="table table-borderless">
              <tbody>
              <tr>
                <td>Username:</td>
                <td class="users-view-username">dean3004</td>
              </tr>
              <tr>
                <td>Name:</td>
                <td class="users-view-name">Dean Stanley</td>
              </tr>
              <tr>
                <td>E-mail:</td>
                <td class="users-view-email">deanstanley@gmail.com</td>
              </tr>
              <tr>
                <td>Comapny:</td>
                <td>XYZ Corp. Ltd.</td>
              </tr>

              </tbody>
            </table>
            <h5 class="mb-1"><i class="bx bx-link"></i> Social Links</h5>
            <table class="table table-borderless">
              <tbody>
              <tr>
                <td>Twitter:</td>
                <td><a href="#">https://www.twitter.com/</a></td>
              </tr>
              <tr>
                <td>Facebook:</td>
                <td><a href="#">https://www.facebook.com/</a></td>
              </tr>
              <tr>
                <td>Instagram:</td>
                <td><a href="#">https://www.instagram.com/</a></td>
              </tr>
              </tbody>
            </table>
            <h5 class="mb-1"><i class="bx bx-info-circle"></i> Personal Info</h5>
            <table class="table table-borderless mb-0">
              <tbody>
              <tr>
                <td>Birthday:</td>
                <td>03/04/1990</td>
              </tr>
              <tr>
                <td>Country:</td>
                <td>USA</td>
              </tr>
              <tr>
                <td>Languages:</td>
                <td>English</td>
              </tr>
              <tr>
                <td>Contact:</td>
                <td>+(305) 254 24668</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- users view card details ends -->

  </section>
  <!-- users view ends -->
  @include('widgets.modal')
@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
  <script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
  {{--  <script src="{{asset('vendors/js/tables/datatable/dataTables.checkboxes.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/dataTables.select.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/jszip/dist/jszip.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>--}}
  {{--  <script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>--}}
@endsection
{{-- page scripts --}}
@section('page-scripts')
  <script src="{{ asset('js/scripts/pages/page-user.js')}}"></script>
  <script>
    $(function () {
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

      {{--let tabelTps = $('#table-tps').DataTable({--}}
      {{--  // dom: 'Bfrtip',--}}
      {{--  processing: true,--}}
      {{--  serverSide: true,--}}
      {{--  ajax: {--}}
      {{--    url: '{!! route('tps.list') !!}'--}}
      {{--  },--}}
      {{--  // order: [--}}
      {{--  //     [1, 'asc']--}}
      {{--  // ],--}}
      {{--  // displayLength : 10,--}}
      {{--  columns: [--}}
      {{--    // {data: 'DT_RowIndex',searchable: false, orderable: false},--}}
      {{--    {data: 'id', name:'id'},--}}
      {{--    // {data: 'prov_id', name: 'prov_id', searchable: false, orderable: false},--}}
      {{--    // {data: 'kota_id', name: 'kota_id', searchable: false, orderable: false},--}}
      {{--    {data: 'kec_id', name: 'kec_id'},--}}
      {{--    {data: 'kel_id', name: 'kel_id'},--}}
      {{--    {data: 'nama_tps', name: 'nama_tps'},--}}
      {{--    // {data: 'jumlah_tps', name: 'jumlah_tps'},--}}
      {{--    {data: 'status', name: 'status'},--}}
      {{--    {data: 'action', name: 'action', searchable: false, orderable: false}--}}
      {{--  ],--}}
      {{--  columnDefs: [--}}
      {{--    {--}}
      {{--      "orderable": false,--}}
      {{--      // "targets": [0,3]--}}
      {{--    },--}}
      {{--  ],--}}
      {{--  --}}
      {{--});--}}
      // Grouping Tabel
      // $('#table-tps tbody').on('click', 'tr.group', function() {
      //     let currentOrder = tabelTps .order()[0];
      //     if (currentOrder[0] === 3 && currentOrder[1] === 'asc') {
      //         tabelTps.order([3, 'desc']).draw();
      //     }
      //     else {
      //         tabelTps.order([3, 'asc']).draw();
      //     }
      // });

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
