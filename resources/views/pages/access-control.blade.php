@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Dashboard')
{{-- vendor css --}}
@section('vendor-styles')
  {{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">--}}
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/dragula.min.css')}}">
  {{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">--}}
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">

@endsection
@section('page-styles')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
  <style>
    .card-body {
      padding: 1.5rem;
      flex: 1 1 auto;
    }

    .mb-3, .my-3 {
      margin-bottom: 1rem !important;
    }

    .card-title {
      margin-bottom: 1.25rem;
    }

    h3, .h3 {
      font-size: 1.0625rem;
    }

    .card-candidate {
    }

    .card-candidate h1 {
      font-size: 140px;;
    }

    .card-candidate {
    }

    .display-2 {
      font-size: 2.75rem;
      font-weight: 600;
      line-height: 1.5;
    }

    .p-4 {
      padding: 1.5rem !important;
    }

    .mb-0, .my-0 {
      margin-bottom: 0 !important;
    }

    h4, .h4 {
      font-size: .9375rem;
    }
  </style>
@endsection

@section('content')
  <!-- Widgets Statistics start -->
  <section id="dashboard-analytics">
    <div class="row">
      <div class="col-12 mt-1 md-2">
        <div class="alert bg-rgba-info mb-2" role="alert">
          <div class="d-flex align-items-center">
            <i class="bx bx-user"></i>
            <span>
                  Selamat Datang, <span class="text-danger">{{ Auth::user()->name }}</span>
                </span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mt-1 mb-2">
        <h5>Statistik Perolehan Suara Pilkada</h5>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-4 col-md-7 col-sm-9">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
                <i class="bx bxs-user font-medium-5"></i>
              </div>
              <p class="text-muted mb-0 line-ellipsis">Total Suara Paslon Kiri</p>
              <h2 class="mb-0">{{ number_format(50000,0,',','.') }}</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-7 col-sm-9">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                <i class="bx bx-user font-medium-5"></i>
              </div>
              <p class="text-muted mb-0 line-ellipsis">Total Suara Paslon Kanan</p>
              <h2 class="mb-0">{{ number_format(20000,0,',','.') }}</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-7 col-sm-9">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
                <i class="bx bx-box font-medium-5"></i>
              </div>
              <p class="text-muted mb-0 line-ellipsis">Total DPT</p>
              <h2 class="mb-0">{{ number_format(100000,0,',','.') }}</h2>
            </div>
          </div>
        </div>
      </div>
      {{--            <div class="col-xl-3 col-md-4 col-sm-6">--}}
      {{--                <div class="card text-center">--}}
      {{--                    <div class="card-content">--}}
      {{--                        <div class="card-body">--}}
      {{--                            <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">--}}
      {{--                                <i class="bx bx-check-circle font-medium-5"></i>--}}
      {{--                            </div>--}}
      {{--                            <p class="text-muted mb-0 line-ellipsis">Absen Hari Ini</p>--}}
      {{--                            <h2 class="mb-0">29</h2>--}}
      {{--                        </div>--}}
      {{--                    </div>--}}
      {{--                </div>--}}
      {{--            </div>--}}
      {{--            <div class="col-xl-3 col-md-4 col-sm-6">--}}
      {{--                <div class="card text-center">--}}
      {{--                    <div class="card-content">--}}
      {{--                        <div class="card-body">--}}
      {{--                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">--}}
      {{--                                <i class="bx bx-calendar-minus font-medium-5"></i>--}}
      {{--                            </div>--}}
      {{--                            <p class="text-muted mb-0 line-ellipsis">Telat Absen</p>--}}
      {{--                            <h2 class="mb-0">72</h2>--}}
      {{--                        </div>--}}
      {{--                    </div>--}}
      {{--                </div>--}}
      {{--            </div>--}}
    </div>
    <!-- Website Analytics Starts-->
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
          {{--                    <div class="card-header d-flex justify-content-between align-items-center">--}}
          {{--                        <h4 class="card-title">Statistik Pilkada</h4>--}}
          {{--                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>--}}
          {{--                    </div>--}}
          <div class="card-content">
            <div class="card-body pb-1">
              <div class="d-flex justify-content-around align-items-center flex-wrap">
                <div class="user-analytics">
                  <i class="bx bx-user mr-25 align-middle"></i>
                  <span class="align-middle text-muted">Paslon Kiri</span>
                  <div class="d-flex">
                    <div id="radial-success-chart"></div>
                    <h3 class="mt-1 ml-50">61K</h3>
                  </div>
                </div>
                <div class="sessions-analytics">
                  <i class="bx bxs-user align-middle mr-25"></i>
                  <span class="align-middle text-muted">Paslon Kanan</span>
                  <div class="d-flex">
                    <div id="radial-warning-chart"></div>
                    <h3 class="mt-1 ml-50">92K</h3>
                  </div>
                </div>
                <div class="bounce-rate-analytics">
                  <i class="bx bx-analyse align-middle mr-25"></i>
                  <span class="align-middle text-muted">Netral</span>
                  <div class="d-flex">
                    <div id="radial-danger-chart"></div>
                    <h3 class="mt-1 ml-50">72.6%</h3>
                  </div>
                </div>
              </div>
            {{--                            <div id="analytics-bar-chart"></div>--}}
            <!-- Chart's container -->
              <div id="chart" style="height: 500px;"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <h3 class="card-title mb-3 text-center">RINGKASAN HASIL SURVEI DUKUNGAN</h3>
              <div class="row">
                <div class="col-md-3 bg-primary text-center">
                  <div class="card-candidate p-4">
                    <h4 class="text-white">CALON KEPALA DAERAH</h4>
                    <h3 class="text-white">NOMOR URUT</h3>
                    <h1 class="mb-0 text-white">2</h1>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="row text-center">
                    <div class="col-md-4 p-4 border">
                      <small>HASIL SURVEI SEMENTARA</small>
                      <h1 class="display-2">1</h1>
                      <h4 class="mb-0">PERINGKAT</h4>
                    </div>
                    <div class="col-md-4 p-4 border">
                      <small>JUMLAH SUARA DUKUNGAN</small>
                      <h1 class="display-2">2147</h1>
                      <h4 class="mb-0">DUKUNGAN</h4>
                    </div>
                    <div class="col-md-4 p-4 border">
                      <small>PERSENTASE KEMENANGAN</small>
                      <h1 class="display-2">64%</h1>
                      <h4 class="mb-0">PREDIKSI</h4>
                    </div>
                    <div class="col-md-4 p-4 border">
                      <small>KEUNGGULAN PADA KECAMATAN</small>
                      <h1 class="display-2">7</h1>
                      <h4 class="mb-0">KECAMATAN</h4>
                    </div>
                    <div class="col-md-4 p-4 border">
                      <small>KEUNGGULAN PADA KELURAHAN</small>
                      <h1 class="display-2">17</h1>
                      <h4 class="mb-0">KELURAHAN</h4>
                    </div>
                    <div class="col-md-4 p-4 border">
                      <small>KEUNGGULAN PADA TPS</small>
                      <h1 class="display-2">57</h1>
                      <h4 class="mb-0">TPS</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Widgets Statistics End -->
@endsection

@section('vendor-scripts')
  {{--<script src="{{asset('vendors/js/pickers/daterange/moment.min.js')}}"></script>--}}
  {{--<script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>--}}
  {{--<script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>--}}
  <script src="{{asset('vendors/js/extensions/dragula.min.js')}}"></script>
  <script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
  <!-- Charting library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
  <!-- Chartisan -->
  <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
@endsection

@section('page-scripts')
  <script src="{{asset('js/scripts/footer.js')}}"></script>
  {{--<script src="{{asset('js/scripts/pages/dashboard-analytics.js')}}"></script>--}}
  <script>
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('statistik_chart')",
      // You can also pass the data manually instead of the url:
      // data: { ... }
      hooks: new ChartisanHooks()
        .colors(['rgba(236,201,75,0.69)', 'rgba(66,153,225,0.76)', 'rgba(75, 192, 192, 0.2)'])
        //.colors(['rgba(255, 206, 86, 0.2)', 'rgba(54, 162, 235, 0.2)'])
        //.borderColors(['rgba(255, 206, 86, 1)','rgba(54, 162, 235, 1)'])
        .responsive()
        .beginAtZero()
      // .legend({ position: 'bottom' })
      // .title('This is a sample chart using chartisan!')
      // .datasets([{ type: 'line', fill: false }, 'bar']),
    })
    chart.update({background: true});
  </script>
@endsection

