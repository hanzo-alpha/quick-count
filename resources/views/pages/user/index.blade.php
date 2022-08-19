@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Datatables')

{{-- vendor style --}}
@section('vendor-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
{{-- page-styles --}}
@section('page-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

@section('content')
  <!-- users list start -->
  <section class="users-list-wrapper">
    @include('widgets.filter')
    <div class="users-list-table">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <!-- datatable start -->
            <div class="table-responsive">
              <table id="users-list-datatable" class="table">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>role</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ route('pengguna.show', 1) }}">{{ $item->username }}</a></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->is_superadmin === 1 ? 'Admin' : 'Relawan' }}</td>
                    <td>
                      <span class="badge badge-light-{{ $item->status === 1 ? 'success' : 'danger' }}">
                        {{ $item->status === 1 ? 'Aktif' : 'Tidak Aktif' }}
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('pengguna.edit',1) }}"><i class="bx bx-edit-alt"></i></a>
                      <a href="{{ route('pengguna.destroy',1) }}"><i class="bx bx-trash-alt"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- datatable ends -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- users list ends -->
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
{{--  <script src="{{ asset('js/scripts/pages/page-users.js')}}"></script>--}}
  <script>
    $(function () {
      $(document).ready(function () {

        // variable declaration
        var usersTable;
        var usersDataArray = [];
        // datatable initialization
        if ($("#users-list-datatable").length > 0) {
          usersTable = $("#users-list-datatable").DataTable({
            responsive: true,
            'columnDefs': [
              {
                "orderable": false,
                "targets": [5]
              }]
          });
        };
        // on click selected users data from table(page named page-users-list)
        // to store into local storage to get rendered on second page named page-users-view
        $(document).on("click", "#users-list-datatable tr", function () {
          $(this).find("td").each(function () {
            usersDataArray.push($(this).text().trim())
          })
          console.log(usersDataArray);
          localStorage.setItem("usersId", usersDataArray[0]);
          localStorage.setItem("usersUsername", usersDataArray[1]);
          localStorage.setItem("usersName", usersDataArray[2]);
          localStorage.setItem("usersRole", usersDataArray[3]);
          localStorage.setItem("usersStatus", usersDataArray[4]);
        })
        // render stored local storage data on page named page-users-view
        if (localStorage.usersId !== undefined) {
          $(".users-view-id").html(localStorage.getItem("usersId"));
          $(".users-view-username").html(localStorage.getItem("usersUsername"));
          $(".users-view-name").html(localStorage.getItem("usersName"));
          $(".users-view-role").html(localStorage.getItem("usersRole"));
          $(".users-view-status").html(localStorage.getItem("usersStatus"));
          // update badge color on status change
          if ($(".users-view-status").text() === "Tidak Aktif") {
            $(".users-view-status").toggleClass("badge-light-success badge-light-danger")
          }
          // update badge color on status change
          if ($(".users-view-status").text() === "Aktif") {
            $(".users-view-status").toggleClass("badge-light-success badge-light-warning")
          }
        }
        // page users list verified filter
        $("#users-list-verified").on("change", function () {
          var usersVerifiedSelect = $("#users-list-verified").val();
          usersTable.search(usersVerifiedSelect).draw();
        });
        // page users list role filter
        $("#users-list-role").on("change", function () {
          var usersRoleSelect = $("#users-list-role").val();
          // console.log(usersRoleSelect);
          usersTable.search(usersRoleSelect).draw();
        });
        // page users list status filter
        $("#users-list-status").on("change", function () {
          var usersStatusSelect = $("#users-list-status").val();
          // console.log(usersStatusSelect);
          usersTable.search(usersStatusSelect).draw();
        });
        // users language select
        if ($("#users-language-select2").length > 0) {
          $("#users-language-select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
          });
        }
        // page users list clear filter
        $(".users-list-clear").on("click", function(){
          usersTable.search("").draw();
        })
        // users music select
        if ($("#users-music-select2").length > 0) {
          $("#users-music-select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
          });
        }
        // users movies select
        if ($("#users-movies-select2").length > 0) {
          $("#users-movies-select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
          });
        }
        // users birthdate date
        if ($(".birthdate-picker").length > 0) {
          $('.birthdate-picker').pickadate({
            format: 'mmmm, d, yyyy'
          });
        }
        // Input, Select, Textarea validations except submit button validation initialization
        if ($(".users-edit").length > 0) {
          $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }
      });

    });
  </script>
@endsection
