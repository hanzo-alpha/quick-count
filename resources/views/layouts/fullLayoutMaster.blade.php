<!DOCTYPE html>
<!--
Template Name: Frest HTML Admin Template
Author: :Pixinvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/pixinvent_portfolio
Renew Support: https://1.envato.market/pixinvent_portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
{{-- pageConfigs variable pass to Helper's updatePageConfig function to update page configuration  --}}
@isset($pageConfigs)
  {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
// confiData variable layoutClasses array in Helper.php file.
  $configData = Helper::applClasses()
@endphp

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('global.app_title') }}</title>
    <link rel="apple-touch-icon" href="{{asset('images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/ico/favicon.ico')}}">

    {{-- Include core + vendor Styles --}}
    @include('panels.styles')
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column navbar-sticky bg-full-screen-image {{$configData['bodyCustomClass']}} footer-static
  @if($configData['theme'] === 'dark'){{'dark-layout'}} @elseif($configData['theme'] === 'semi-dark'){{'semi-dark-layout'}} @else
  {{'light-layout'}} @endif" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    <!-- BEGIN: Header-->
    @include('panels.navbar')
    <!-- END: Header-->
  @endauth
  <!-- BEGIN: Content-->
  <div class="app-content content">
    {{-- Application page structure --}}
    @if($configData['isContentSidebar'] === true)
      <div class="content-area-wrapper">
        <div class="sidebar-left">
          <div class="sidebar">
            @yield('sidebar-content')
          </div>
        </div>
        <div class="content-right">
            <div class="content-overlay"></div>
          <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    @else
      {{-- others page structures --}}
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          @if($configData['pageHeader']=== true && isset($breadcrumbs))
            @include('panels.breadcrumbs')
          @endif
        </div>
        <div class="content-body">
          @yield('content')
        </div>
      </div>
    @endif
    </div>
    <!-- END: Content-->

    {{-- scripts --}}
    @include('panels.scripts')

  </body>
  <!-- END: Body-->
</html>
