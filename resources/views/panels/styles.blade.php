{{-- style blade file --}}
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

<!-- BEGIN: Vendor CSS-->
@if($configData['direction'] === 'ltr')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors.min.css')}}">
@else
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/vendors-rtl.min.css')}}">
@endif
@yield('vendor-styles')
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/components.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/themes/dark-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/themes/semi-dark-layout.css')}}">
@if($configData['direction'] === 'rtl')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom-rtl.css')}}">
@endif
<!-- END: Theme CSS-->

<!-- BEGIN: Page CSS-->
@if($configData['mainLayoutType'] === 'horizontal-menu')
  <link rel="stylesheet" type="text/css" href="{{asset('css/core/menu/menu-types/horizontal-menu.css')}}">
@else
  <link rel="stylesheet" type="text/css" href="{{asset('css/core/menu/menu-types/vertical-menu.css')}}">
@endif
@yield('page-styles')
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
@if($configData['direction'] === 'ltr')
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
@else
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
@endif
{{--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />--}}
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/datatables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap.min.css')}}">
<!-- END: Custom CSS-->

<!-- BEGIN: Plugin CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/extensions/sweetalert2.min.css') }}">

{{--<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/extensions/toastr.css')}}">--}}
<!-- END: Plugin CSS-->


