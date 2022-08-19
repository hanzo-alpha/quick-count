{{-- vertical-menu --}}
@if($configData['mainLayoutType'] === 'vertical-menu')
    <div class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif menu-accordion menu-shadow"
         data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div class="brand-logo">
                            <img src="{{asset('images/logo/logo.png')}}" class="logo" alt="">
                        </div>
                        <h2 class="brand-text mb-0">
                            @if(!empty($configData['templateTitle']) && isset($configData['templateTitle']))
                                {{$configData['templateTitle']}}
                            @else
                                Quick Count
                            @endif
                        </h2>
                    </a>
                </li>
                {{--          <li class="nav-item nav-toggle">--}}
                {{--          <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">--}}
                {{--            <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>--}}
                {{--            <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i>--}}
                {{--          </a>--}}
                {{--          </li>--}}
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
                @if(!empty($menuData[0]) && isset($menuData[0]))
                    @foreach ($menuData[0]->menu as $menu)
                        @if(isset($menu->navheader))
                            <li class="navigation-header"><span>{{$menu->navheader}}</span></li>
                        @else
                            <li class="nav-item {{(request()->is($menu->url.'*')) ? 'active' : '' }}">
                                <a href="@if(isset($menu->url)){{asset($menu->url)}} @endif" @if(isset($menu->newTab)){{"target=_blank"}}@endif>
                                    @if(isset($menu->icon))
                                        <i class="menu-livicon" data-icon="{{$menu->icon}}"></i>
                                    @endif
                                    @if(isset($menu->name))
                                        <span class="menu-title">{{ __('locale.'.$menu->name)}}</span>
                                    @endif
                                    @if(isset($menu->tag))
                                        <span class="{{$menu->tagcustom}}">{{$menu->tag}}</span>
                                    @endif
                                </a>
                                @if(isset($menu->submenu))
                                    @include('panels.sidebar-submenu',['menu' => $menu->submenu])
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif
