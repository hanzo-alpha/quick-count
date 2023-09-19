@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Dashboard')
{{-- vendor css --}}
@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/dragula.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">

@endsection
@section('page-styles')
    {{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">--}}
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
        <div class="row p-1">
            <div class="col-md-12 col-sm-12">
                <div class="d-flex flex-wrap align-items-start justify-content-between">
                    <div>
                        <h1>DASHBOARD QUICK COUNT</h1>
                    </div>
                    <div>
                        @auth()
                            <a href="{{ route('home') }}" class="btn btn-primary">Dashboard</a>
                        @endauth
                        @guest()
                            <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <!-- Website Analytics Starts-->
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Statistik Perhitungan Suara</h4>
                        {{--            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>--}}
                    </div>
                    <div class="card-content">
                        <div class="card-body pb-1">
                            {{--                            <div id="chart" style="height: 600px"></div>--}}
                            <div style="height: 50.5rem;">
{{--                                @livewire('livewire-column-chart', ['column-chart-model'=>$columnChartModel,'key' => $columnChartModel->reactiveKey()])--}}
                                <livewire:livewire-column-chart
                                    key="{{ $columnChartModel->reactiveKey() }}"
                                    :column-chart-model="$columnChartModel"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                @livewire('pilkada.hitung-cepat',['refreshInSeconds' => 60])
            </div>
        </div>
        <div class="row">
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
                                        $persentase1 = 0;
                                        $persentase2 = 0;
                                    @endphp
                                    <div class="user-analytics">
                                        <i class="bx bx-user-voice mr-25 align-middle"></i>
                                        <span class="align-middle text-muted">Kec. {{ $name }}</span>
                                        <div class="d-flex justify-content-center">
                                            <h3 class="mt-1 ml-50 text-warning">
                                                {{ number_format($suara1,0,',','.') }} /
                                                <span class="text-primary">
                                                    {{ number_format($suara2,0,',','.')}}
                                                </span>
                                            </h3>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <h3 class="mt-1 ml-50 text-warning">
                                                {{ number_format($persentase1,2,',','.') }} % /
                                                <span class="text-primary">
                                                  {{ number_format($persentase2,2,',','.')}} %
                                                </span>
                                            </h3>
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
