<div>
  {{-- The whole world belongs to you --}}
  <li class="dropdown dropdown-user nav-item">
    <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
      <div class="user-nav d-sm-flex d-none">
        <span class="user-name">{{ auth()->user()->name }}</span>
        <span class="user-status text-muted">{{ auth()->user()->is_superadmin === 0 ? 'Operator' : 'Administrator' }}</span>
      </div>
      @if(auth()->user()->is_superadmin === 0)
        <div class="avatar bg-secondary bg-lighten-2">
          <span class="avatar-content">{{ substr(auth()->user()->name,0,1) }}</span>
          <span class="avatar-status-online"></span>
        </div>
      @else
        <span><img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40"></span>
      @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right pb-0">
      <a class="dropdown-item" href="#">
        <i class="bx bx-user mr-50"></i> Profil
      </a>
      <a class="dropdown-item" href="#">
        <i class="bx bx-cog mr-50"></i> Pengaturan
      </a>
      {{--              <a class="dropdown-item" href="#">--}}
      {{--                <i class="bx bx-check-square mr-50"></i> Task</a>--}}
      {{--                <a class="dropdown-item" href="#"><i class="bx bx-message mr-50"></i> Chats--}}
      {{--              </a>--}}
      <div class="dropdown-divider mb-0"></div>
      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <i class="bx bx-power-off mr-50"></i> Logout</a>
    </div>
  </li>
</div>
