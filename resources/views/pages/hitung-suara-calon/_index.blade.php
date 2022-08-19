@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Hitung Cepat')

{{-- vendor style --}}
@section('vendor-styles')
  {{--  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">--}}
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-analytics.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/hitung-cepat.min.css')}}">
@endsection
{{-- page-styles --}}

@section('content')
  <section>
    @include('flash::message')
    @include('widgets.error')
  </section>
  <section>
    {{--    @include('widgets.filter-hitung')--}}
    {{--    @livewire('hitung')--}}
  </section>

  <!-- Zero configuration table -->
  <section id="basic-datatable" class="invoice-list-wrapper">
    <!-- create invoice button-->
    <div class="invoice-create-btn mb-1">
      <button type="button" id="btnTambah" class="btn btn-primary glow invoice-create modal-loader" aria-pressed="true" data-toggle="modal"
              data-target="#modal-form" data-url="{{ route('hitung-cepat.create') }}" title="TAMBAH DATA HITUNG SUARA">
        <i class="bx bx-plus-circle"></i>
        Tambah
      </button>
      {{--      <a href="app-invoice-add.html" class="btn btn-primary glow invoice-create" role="button" aria-pressed="true">--}}
      {{--        Tambah Hitung</a>--}}
    </div>
    <!-- Options and filter dropdown button-->
    @include('widgets.filter-hitung')
    <div class="table-responsive">
      <table id="table-hitungcepat" class="table table-hover invoice-data-table dt-responsive nowrap" style="width:100%">
        <thead>
        <tr class="text-center">
          <th width="3%"></th>
          {{--          <th width="3%">No</th>--}}
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
    </div>
    {{--    <div class="row">--}}
    {{--      <div class="col-12">--}}
    {{--        <div class="card">--}}
    {{--          <div class="card-header">--}}
    {{--            <!-- head -->--}}
    {{--            <h5 class="card-title">PERHITUNGAN SUARA CEPAT PASANGAN CALON (PASLON)</h5>--}}
    {{--            <!-- Single Date Picker and button -->--}}
    {{--            <div class="heading-elements">--}}
    {{--              <ul class="list-inline mb-0">--}}
    {{--                <li class="ml-2">--}}
    {{--                  <a href="{{ route('hitung.export') }}" class="btn btn-danger">--}}
    {{--                    <i class="bx bx-export"></i>--}}
    {{--                    Eksport--}}
    {{--                  </a>--}}
    {{--                  <button type="button" id="btnTambah" class="btn btn-primary modal-loader" data-toggle="modal"--}}
    {{--                          data-target="#modal-form" data-url="{{ route('hitung-cepat.create') }}" title="TAMBAH DATA HITUNG SUARA">--}}
    {{--                    <i class="bx bx-plus-circle"></i>--}}
    {{--                    Tambah--}}
    {{--                  </button>--}}
    {{--                </li>--}}
    {{--              </ul>--}}
    {{--            </div>--}}
    {{--          </div>--}}
    {{--          <div class="card-content">--}}
    {{--            <div class="card-body m-0">--}}
    {{--              <div class="table-responsive">--}}
    {{--                <table id="table-hitungcepat" class="table table-hover table-responsive">--}}
    {{--                  <thead class="thead-light">--}}
    {{--                  <tr class="text-center">--}}
    {{--                    <th width="3%">No</th>--}}
    {{--                    <th>Kecamatan</th>--}}
    {{--                    <th>Kelurahan</th>--}}
    {{--                    <th>TPS</th>--}}
    {{--                    <th>Suara Calon 1</th>--}}
    {{--                    <th>Suara Calon 2</th>--}}
    {{--                    <th>Suara Tidak Sah</th>--}}
    {{--                    <th width="3%">Aksi</th>--}}
    {{--                  </tr>--}}
    {{--                  </thead>--}}
    {{--                </table>--}}
    {{--                            </div>--}}
    {{--            </div>--}}
    {{--          </div>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--    </div>--}}
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
  {{--  <script src="{{asset('app-assets/js/scripts/pages/app-invoice.js')}}"></script>--}}
  <script>
    $(function () {
      if ($(".invoice-data-table").length) {
        let dataListView = $(".invoice-data-table").DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: '{!! route('hitungsuara.list') !!}'
          },
          columns: [
            // {data: '', name: '', searchable: false,orderable: false},
            // {data: '', name: '', searchable: false,orderable: false},
            {data: 'id', name: 'id'},
            // {data: 'kecamatan', name: 'kecamatan'},
            {data: 'nama_kecamatan', name: 'indonesia_districts.name'},
            // {data: 'desa', name: 'desa'},
            {data: 'nama_desa', name: 'indonesia_villages.name'},
            {data: 'no_tps', name: 'no_tps'},
            // {data: 'nama_calon1', name: 'nama_calon1'},
            // {data: 'nama_calon2', name: 'nama_calon2'},
            {data: 'suara1', name: 'suara1'},
            {data: 'suara2', name: 'suara2'},
            {data: 'suara_tidak_sah', name: 'suara_tidak_sah'},
            {data: 'action', name: 'action', searchable: false, orderable: false}
          ],
          columnDefs: [
            {
              targets: 0,
              className: "control"
            },
            {
              orderable: true,
              targets: 0,
              checkboxes: {selectRow: true}
            },
            {
              targets: [0, 1],
              orderable: false
            },
          ],
          order: [1, 'asc'],
          dom:
            '<"top d-flex flex-wrap"<"action-filters flex-grow-1"f><"actions action-btns d-flex align-items-center">><"clear">rt<"bottom"p>',
          language: {
            search: "",
            searchPlaceholder: "Cari Data.."
          },
          select: {
            style: "multi",
            selector: "td:first-child",
            items: "row"
          },
          responsive: {
            details: {
              type: "column",
              target: 0
            }
          }
        });
      }
      // To append actions dropdown inside action-btn div
      var invoiceFilterAction = $(".invoice-filter-action");
      var invoiceOptions = $(".invoice-options");
      $(".action-btns").append(invoiceFilterAction, invoiceOptions);

      // add class in row if checkbox checked
      $(".dt-checkboxes-cell")
        .find("input")
        .on("change", function () {
          let $this = $(this);
          if ($this.is(":checked")) {
            $this.closest("tr").addClass("selected-row-bg");
          } else {
            $this.closest("tr").removeClass("selected-row-bg");
          }
        });
      // Select all checkbox
      $(document).on("change", ".dt-checkboxes-select-all input", function () {
        if ($(this).is(":checked")) {
          $(".dt-checkboxes-cell")
            .find("input")
            .prop("checked", this.checked)
            .closest("tr")
            .addClass("selected-row-bg");
        } else {
          $(".dt-checkboxes-cell")
            .find("input")
            .prop("checked", "")
            .closest("tr")
            .removeClass("selected-row-bg");
        }
      });

      // ********Invoice Edit***********//
      // --------------------------------
      // form repeater jquery
      if ($(".invoice-item-repeater").length) {
        $(".invoice-item-repeater").repeater({
          show: function () {
            $(this).slideDown();
          },
          hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
          }
        });
      }
      // dropdown form's prevent parent action
      $(document).on("click", ".invoice-tax", function (e) {
        e.stopPropagation();
      });
      $(document).on("click", ".invoice-apply-btn", function () {
        var $this = $(this);
        var discount = $this
          .closest(".dropdown-menu")
          .find("#discount")
          .val();
        var tax1 = $this
          .closest(".dropdown-menu")
          .find("#Tax1 option:selected")
          .text();
        var tax2 = $this
          .closest(".dropdown-menu")
          .find("#Tax2 option:selected")
          .text();
        $this
          .parents()
          .eq(4)
          .find(".discount-value")
          .html(discount + "%");
        $this
          .parents()
          .eq(4)
          .find(".tax1")
          .html(tax1);
        $this
          .parents()
          .eq(4)
          .find(".tax2")
          .html(tax2);
      });
      // // on product change also change product description
      $(document).on("change", ".invoice-item-select", function (e) {
        var selectOption = this.options[e.target.selectedIndex].text;
        // switch case for product select change also change product description
        switch (selectOption) {
          case "Frest Admin Template":
            $(e.target)
              .closest(".invoice-item-filed")
              .find(".invoice-item-desc")
              .val("The most developer friendly & highly customisable HTML5 Admin");
            break;
          case "Stack Admin Template":
            $(e.target)
              .closest(".invoice-item-filed")
              .find(".invoice-item-desc")
              .val("Ultimate Bootstrap 4 Admin Template for Next Generation Applications.");
            break;
          case "Robust Admin Template":
            $(e.target)
              .closest(".invoice-item-filed")
              .find(".invoice-item-desc")
              .val(
                "Robust admin is super flexible, powerful, clean & modern responsive bootstrap admin template with unlimited possibilities"
              );
            break;
          case "Apex Admin Template":
            $(e.target)
              .closest(".invoice-item-filed")
              .find(".invoice-item-desc")
              .val("Developer friendly and highly customizable Angular 7+ jQuery Free Bootstrap 4 gradient ui admin template. ");
            break;
          case "Modern Admin Template":
            $(e.target)
              .closest(".invoice-item-filed")
              .find(".invoice-item-desc")
              .val("The most complete & feature packed bootstrap 4 admin template of 2019!");
            break;
        }
      });
      // print button
      if ($(".invoice-print").length > 0) {
        $(".invoice-print").on("click", function () {
          window.print();
        })
      }
      {{--let tabelHitung = $('#table-hitungcepat').DataTable({--}}
      {{--  // dom: 'Bfrtip',--}}
      {{--  processing: true,--}}
      {{--  serverSide: true,--}}
      {{--  ajax: {--}}
      {{--    url: '{!! route('hitungsuara.list') !!}'--}}
      {{--  },--}}
      {{--  columns: [--}}
      {{--    {data: 'id', name: 'id'},--}}
      {{--    // {data: 'kecamatan', name: 'kecamatan'},--}}
      {{--    {data: 'nama_kecamatan', name: 'indonesia_districts.name'},--}}
      {{--    // {data: 'desa', name: 'desa'},--}}
      {{--    {data: 'nama_desa', name: 'indonesia_villages.name'},--}}
      {{--    {data: 'no_tps', name: 'no_tps'},--}}
      {{--    // {data: 'nama_calon1', name: 'nama_calon1'},--}}
      {{--    // {data: 'nama_calon2', name: 'nama_calon2'},--}}
      {{--    {data: 'suara1', name: 'suara1'},--}}
      {{--    {data: 'suara2', name: 'suara2'},--}}
      {{--    {data: 'suara_tidak_sah', name: 'suara_tidak_sah'},--}}
      {{--    {data: 'action', name: 'action', searchable: false, orderable: false}--}}
      {{--  ],--}}
      {{--});--}}

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
