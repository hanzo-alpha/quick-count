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
  {{--  <style>--}}
  {{--    .card-body {--}}
  {{--      padding: 1.5rem;--}}
  {{--      flex: 1 1 auto;--}}
  {{--    }--}}
  {{--    .mb-3, .my-3 {--}}
  {{--      margin-bottom: 1rem !important;--}}
  {{--    }--}}
  {{--    .card-title {--}}
  {{--      margin-bottom: 1.25rem;--}}
  {{--    }--}}
  {{--    h3, .h3 {--}}
  {{--      font-size: 1.0625rem;--}}
  {{--    }--}}
  {{--    .card-candidate {--}}
  {{--    }--}}
  {{--    .card-candidate h1 {--}}
  {{--      font-size: 140px;;--}}
  {{--    }--}}
  {{--    .display-2 {--}}
  {{--      font-size: 2.75rem;--}}
  {{--      font-weight: 600;--}}
  {{--      line-height: 1.5;--}}
  {{--    }--}}
  {{--    .p-4 {--}}
  {{--      padding: 1.5rem !important;--}}
  {{--    }--}}
  {{--    .mb-0, .my-0 {--}}
  {{--      margin-bottom: 0 !important;--}}
  {{--    }--}}
  {{--    h4, .h4 {--}}
  {{--      font-size: .9375rem;--}}
  {{--    }--}}
  {{--  </style>--}}
@endsection

@section('content')
  <!-- Widgets Statistics start -->
  <section id="dashboard-analytics">
  @livewire('pilkada.hitung-cepat',['hitung' => $hitung])
  <!-- Website Analytics Starts-->
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Statistik Perhitungan Suara</h4>
            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
          </div>
          <div class="card-content">
            <div class="card-body pb-1">
              <div id="chart" style="height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Rekap Suara Per Kecamatan</h4>
            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
          </div>
          <div class="card-content">
            <div class="card-body pb-1">
              <div class="d-flex justify-content-around align-items-center flex-wrap">
                @foreach($kecamatan as $kec)
                  @php
                    $totalDpt = config('global.total_dpt');
                     $suara1 = $kec->hitung()->get()->sum('suara1');
                     $suara2 = $kec->hitung()->get()->sum('suara2');
                     //$persentase1 = $suara1 > 0 ? ($suara1 / $totalDpt) * 100 : 0;
                     //$persentase2 = ($suara2 / config('global.total_dpt') * 100);
                  @endphp
                  <div class="user-analytics">
                    <i class="bx bx-user-voice mr-25 align-middle"></i>
                    <span class="align-middle text-muted">{{ $kec->name }}</span>
                    <div class="d-flex justify-content-center">
                      <h3 class="mt-1 ml-50 text-warning">{{ number_format($suara1,0,',','.') }}</h3>
                    </div>
                  </div>
                @endforeach
              </div>
              <div id="kecamatan-chart" style="height: 500px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- Widgets Statistics End -->
@endsection

@section('vendor-scripts')
  <script src="{{asset('vendors/js/extensions/dragula.min.js')}}"></script>
  <script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
  <!-- Charting library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
  <!-- Chartisan -->
  <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
@endsection

@section('page-scripts')
  <script src="{{asset('js/scripts/footer.js')}}"></script>
  <script>
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('statistik_chart')",
      hooks: new ChartisanHooks()
        .colors(['rgba(236,201,75,0.69)', 'rgba(66,153,225,0.76)', 'rgba(75, 192, 192, 0.2)'])
        .responsive()
        .beginAtZero()
        .datasets([
          {type: 'bar'}
        ])
    });

    const kecChart = new Chartisan({
      el: '#kecamatan-chart',
      url: "@chart('rekap_kecamatan_chart')",
      hooks: new ChartisanHooks()
        .colors(['rgba(236,201,75,0.69)', 'rgba(66,153,225,0.76)', 'rgba(75, 192, 192, 0.2)'])
        .responsive()
        .legend({position: 'bottom'})
        .beginAtZero()
        .datasets([
          {type: 'bar'}
        ])
    });

    $(document).ready(function () {
      updateChart();
    });

    function updateChart() {
      setInterval(function () {
        chart.update({background: true});
        kecChart.update({background: true});
      }, 5000);
    }

    /*const piechart = new Chartisan({
      el: '#pie-chart',
      url: "@chart('statistik_chart')",
      hooks: new ChartisanHooks()
        .legend({ position: 'bottom' })
        .colors(['rgba(236,201,75,0.69)', 'rgba(66,153,225,0.76)'])
        .datasets('pie')
    })
    piechart.update({background: true});*/
  </script>
@endsection

