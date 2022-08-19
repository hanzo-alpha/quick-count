<footer class="footer footer-light @if(isset($configData['footerType'])){{$configData['footerClass']}}@endif">
  <p class="clearfix mb-0">
    <span class="float-left d-inline-block">{{today()->year}} &copy; PILKADA KABUPATEN SOPPENG</span>
    @auth
      <span class="float-right d-sm-inline-block d-none">
        <a class="text-uppercase" href="{{ route('home')  }}" target="_blank">Dashboard</a>
      </span>
    @endauth
    @guest
      <span class="float-right d-sm-inline-block d-none">
      <i class="bx bx-log-in font-small-3"></i>
      <a class="text-uppercase" href="{{ route('login') }}" target="_blank">ADMIN</a>
    </span>
    @endguest
    @if($configData['isScrollTop'] === true)
      <button class="btn btn-primary btn-icon scroll-top" type="button">
        <i class="bx bx-up-arrow-alt"></i>
      </button>
    @endif
  </p>
</footer>
