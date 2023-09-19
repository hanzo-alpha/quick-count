{{-- navbar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
     data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    @if (request()->is('sk-layout-1-column'))
                        <ul class="nav navbar-nav nav-back">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link nav-menu-main hidden-xs font-small-3 d-flex align-items-center"
                                   href="{{asset('sk-layout-2-columns')}}">
                                    <i class="bx bx-left-arrow-alt"></i>Back
                                </a>
                            </li>
                        </ul>
                    @else
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                    <i class="ficon bx bx-menu"></i>
                                </a>
                            </li>
                        </ul>
                    @endif

                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Lihat Front" target="_blank">
                                <i class="ficon bx bx-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <livewire:bahasa/>
                    {{--          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>--}}
                    {{--          <livewire:search/>--}}
                    {{--          <livewire:notification/>--}}
                    <livewire:user/>

                </ul>
            </div>
        </div>
    </div>
</nav>
