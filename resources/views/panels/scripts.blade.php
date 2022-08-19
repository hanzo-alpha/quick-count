<!-- BEGIN: Vendor JS-->
<script>
  let assetBaseUrl = "{{ asset('') }}";
</script>
<script src="{{asset('vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('fonts/LivIconsEvo/js/LivIconsEvo.tools.js')}}"></script>
<script src="{{asset('fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
<script src="{{asset('fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
@yield('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
@if($configData['mainLayoutType'] === 'vertical-menu')
  <script src="{{asset('js/scripts/configs/vertical-menu-light.js')}}"></script>
@else
  <script src="{{asset('js/scripts/configs/horizontal-menu.js')}}"></script>
@endif
<script src="{{asset('js/core/app-menu.js')}}"></script>
<script src="{{asset('js/core/app.js')}}"></script>
<script src="{{asset('js/scripts/customizer.js')}}"></script>
<script src="{{asset('js/scripts/components.js')}}"></script>
<script src="{{asset('js/scripts/footer.js')}}"></script>
<script src="{{asset('js/scripts/extensions/toastr.js')}}"></script>
@livewireScripts
<script>
  $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
  $('#flash-overlay-modal').modal();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
@yield('page-scripts')

<!-- BEGIN: Custom Scripts -->
@if(request()->routeIs('data-suara-calon.index'))
  @include('pages.suara-calon.partial.scripts')
@elseif(request()->routeIs('data-tps.index'))
  @include('pages.tps.partial.scripts')
@elseif(request()->routeIs('hitung-cepat.index'))
  @include('pages.hitung-cepat.partial.scripts')
@elseif(request()->routeIs('data-calon.index'))
  @include('pages.calon.partial.scripts')
@endif
<!-- END: Custom Scripts -->

<!-- END: Page JS-->

