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

@endsection

@section('content')
    <!-- Widgets Statistics start -->
    <section id="dashboard-analytics">
    @livewire('pilkada.hitung-cepat',['refreshInSeconds' => 60])
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
                            <div style="height: 32rem;">
                                <livewire:livewire-column-chart
                                    key="{{ $columnChartModel->reactiveKey() }}"
                                    :column-chart-model="$columnChartModel"
                                />
                            </div>
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
                                @foreach($suaraPerKecamatan as $name => $kec)
                                    @php
                                        $totalDpt = config('global.total_dpt');
                                        $suara1 = $kec->sum('suara1');
                                        $suara2 = $kec->sum('suara2');
                                        $suaraTidakSah = $kec->sum('suara_tidak_sah');
                                        $totalSuaraSah = ($suara1 + $suara2) - $suaraTidakSah;
                                    @endphp
                                    <div class="user-analytics">
                                        <i class="bx bx-building mr-25 align-middle"></i>
                                        <span class="align-middle text-muted">{{ $name }}</span>
                                        <div class="d-flex justify-content-center">
                                            <h3 class="mt-1 ml-50 text-warning">{{ number_format($totalSuaraSah,0,',','.') }}</h3>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <h3 class="mt-1 ml-50 text-danger">{{ number_format($suaraTidakSah,0,',','.') }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div style="height: 500px;">
                                {!! $kecChart->container() !!}
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
    <script src="{{asset('vendors/js/extensions/dragula.min.js')}}"></script>
    <script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
@endsection

@section('page-scripts')
    {!! $kecChart->script() !!}
    @livewireChartsScripts
    <script src="{{asset('js/scripts/footer.js')}}"></script>
    <script>

    </script>
@endsection
