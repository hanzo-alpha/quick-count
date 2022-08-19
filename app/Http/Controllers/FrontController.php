<?php

namespace App\Http\Controllers;

use App\Charts\RekapKecamatanChart;
use App\Models\HitungCepat;
use App\Models\Kecamatan;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use JetBrains\PhpStorm\ArrayShape;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    #[ArrayShape(['suara1' => 'int|mixed', 'suara2' => 'int|mixed', 'namaCalon1' => 'string', 'namaCalon2' => 'string'])]
    public function statistikChart(): array
    {
        $chart = collect();
        $suara1 = 0;
        $suara2 = 0;
        $namaCalon1 = 'Suara Pasangan Calon';
        $namaCalon2 = 'Suara Kolom Kosong';
        $hitung = HitungCepat::select(['nama_calon1', 'nama_calon2', 'suara1', 'suara2', 'suara_tidak_sah'])->get();

        foreach ($hitung as $item) {
            $suara1 += $item->suara1;
            $suara2 += $item->suara2;

            $chart->put('suara1', $item->suara1);
            $chart->put('suara2', $item->suara2);
        }

        return [
            'suara1' => $suara1,
            'suara2' => $suara2,
            'namaCalon1' => $namaCalon1,
            'namaCalon2' => $namaCalon2,
        ];
    }

    public function rekapKecamatanChart()
    {
        $label = [];
        $suara1 = [];
        $suara2 = [];

        $kecamatan = Kecamatan::where('city_code', 7312)->select(['id', 'name'])->get();

        foreach ($kecamatan as $item) {
            $suaraKecamatan = HitungCepat::where('kecamatan', $item->id)->get();
            $totalSuara1 = $suaraKecamatan->sum('suara1');
            $totalSuara2 = $suaraKecamatan->sum('suara2');
            $label[] = $item->name;
            $suara1[] = $totalSuara1;
            $suara2[] = $totalSuara2;
        }

        $kecChart = new RekapKecamatanChart;
        $kecChart->title('Rekap Kecamatan');
        $kecChart->labels($label);
        $kecChart->dataset('Persentase Suara Paslon', 'bar', [$suara1])->color('#f6ad55');
        $kecChart->dataset('Persentase Suara Kolom Kosong', 'bar', [$suara2])->color('#fc8181');
        $kecChart->barWidth(10);
        $kecChart->displayLegend(true);
        $kecChart->displayAxes(true);
        $kecChart->options([
            'tooltip' => [
                'show' => true // or false, depending on what you want.
            ]
        ]);

        return $kecChart;

//        return [
//            'labels' => $label,
//            'suara1' => $suara1,
//            'suara2' => $suara2,
//        ];
    }

    public function columnChartModel(): ColumnChartModel
    {
        $colors = [
            'suara1' => '#f6ad55',
            'suara2' => '#fc8181',
            'suaraTdkSah' => '#90cdf4',
        ];

        $namaCalon = [
            'namaCalon1' => 'Suara Pasangan Calon',
            'namaCalon2' => 'Suara Kolom Kosong',
            'namaTidakSah' => 'Suara Tidak Sah',
        ];
        $hitung = HitungCepat::select(['kabupaten', 'nama_calon1', 'nama_calon2', 'suara1', 'suara2', 'suara_tidak_sah'])->get();

        return $hitung->groupBy('kabupaten')->reduce(function ($columnChartModel, $data) use ($colors, $namaCalon) {
            $totalSuara1 = $data->sum('suara1');
            $totalSuara2 = $data->sum('suara2');
            $totalSuaraTidakSah = $data->sum('suara_tidak_sah');

            $columnChartModel->addColumn($namaCalon['namaCalon1'], $totalSuara1, $colors['suara1']);
            $columnChartModel->addColumn($namaCalon['namaCalon2'], $totalSuara2, $colors['suara2']);
            $columnChartModel->addColumn($namaCalon['namaTidakSah'], $totalSuaraTidakSah, $colors['suaraTdkSah']);

            return $columnChartModel;

        }, LivewireCharts::columnChartModel()
            ->setTitle('Jumlah Suara')
            ->setAnimated(true)
//            ->withOnColumnClickEventName('onColumnClick')
            ->setLegendVisibility(true)
            ->setDataLabelsEnabled(true)
            //->setOpacity(0.25)
//            ->setColors(['#b01a1b', '#d41b2c'])
            ->setColumnWidth(30)
            ->withGrid()
        );
    }

    public function rekapColumnChartModel(): ColumnChartModel
    {
        $colors = [
            'suara1' => '#f6ad55',
            'suara2' => '#fc8181',
            'suaraTdkSah' => '#90cdf4',
        ];

        $namaCalon = [
            'namaCalon1' => 'Suara Pasangan Calon',
            'namaCalon2' => 'Suara Kolom Kosong',
            'namaTidakSah' => 'Suara Tidak Sah',
        ];
//        $label = [];
//        $suara1 = [];
//        $suara2 = [];
//
//        $kecamatan = Kecamatan::where('city_code', 7312)->select(['id', 'name'])->get();
//
//        foreach ($kecamatan as $item) {
//            $suaraKecamatan = HitungCepat::where('kecamatan', $item->id)->get();
//            $totalSuara1 = $suaraKecamatan->sum('suara1');
//            $totalSuara2 = $suaraKecamatan->sum('suara2');
//            $label[] = $item->name;
//            $suara1[] = $totalSuara1;
//            $suara2[] = $totalSuara2;
//        }

        $hitung = HitungCepat::select(['kecamatan', 'nama_calon1', 'nama_calon2', 'suara1', 'suara2', 'suara_tidak_sah'])->with(['kec'])->get();

        return $hitung->groupBy('kecamatan')->reduce(function ($columnChartModel, $data) use ($colors, $namaCalon, $hitung) {
            $label = [];
            $suara1 = [];
            $suara2 = [];
            $totalSuara1 = $data->sum('suara1');
            $totalSuara2 = $data->sum('suara2');
            $totalSuaraTidakSah = $data->sum('suara_tidak_sah');

//            $kecamatan = Kecamatan::where('city_code', 7312)->select(['id', 'name'])->get();

            foreach ($data as $item) {
                $suaraKecamatan = HitungCepat::where('kecamatan', $item->id)->get();
                $totalSuara1 = $item->sum('suara1');
                $totalSuara2 = $item->sum('suara2');
                $label[] = $item->name;
                $suara1[] = $totalSuara1;
                $suara2[] = $totalSuara2;
//                $columnChartModel->addColumn($item->kec->name, $totalSuara2, $colors['suara1']);
//                $columnChartModel->addSeriesColumn($item->kec->name,$item->kec->name, $totalSuara1, $colors['suara1']);
            }
            $columnChartModel->addColumn($label, $suara1, $colors['suara2']);
//            $columnChartModel->addColumn($label, $suara1, $colors['suara1']);
//            $columnChartModel->addColumn($label, $suara2, $colors['suara2']);

//            $columnChartModel->addColumn($namaCalon['namaCalon1'], $data->sum('suara1'), $colors['suara1']);
//            $columnChartModel->addSeriesColumn($data->kec?->name,$namaCalon['namaCalon1'], $data->sum('suara1'), $colors['suara1']);
//            $columnChartModel->addColumn($namaCalon['namaCalon2'], $totalSuara2, $colors['suara2']);
//            $columnChartModel->addSeriesColumn($namaCalon['namaCalon2'],$namaCalon['namaCalon2'], $totalSuara2, $colors['suara2']);
//            $columnChartModel->addColumn($namaCalon['namaTidakSah'], $totalSuaraTidakSah, $colors['suaraTdkSah']);
//            $columnChartModel->addSeriesColumn($namaCalon['namaTidakSah'],$namaCalon['namaTidakSah'], $totalSuaraTidakSah, $colors['suaraTdkSah']);

            return $columnChartModel;

        }, LivewireCharts::columnChartModel()
            ->setTitle('Jumlah Suara')
            ->setAnimated(true)
//            ->withOnColumnClickEventName('onColumnClick')
            ->setLegendVisibility(true)
            ->setDataLabelsEnabled(true)
            //->setOpacity(0.25)
//            ->setColors(['#b01a1b', '#d41b2c'])
            ->setColumnWidth(30)
//            ->multiColumn()
            ->withGrid()
        );
    }

    public function index()
    {
        //Pageheader set true for breadcrumbs
        $pageConfigs = [
            'theme' => 'dark',
            'navbarColor' => 'bg-primary',
            'navbarType' => 'static',
            'pageHeader' => false,
            'mainLayoutType' => 'horizontal-menu',
            'isContentSidebar' => false,
            'isScrollTop' => false,
        ];

        $totalDpt = config('global.total_dpt', 175415);

        $suaraPerKecamatan = HitungCepat::with('kec')->get()->groupBy(function ($item) {
            return $item->kec->name;
        });

        $columnChartModel = $this->columnChartModel();
        $rekapColumnChartModel = $this->rekapColumnChartModel();
        $kecChart = $this->rekapKecamatanChart();

        return view('pages.front-dashboard', [
            'pageConfigs' => $pageConfigs,
            'totalDpt' => $totalDpt,
            'columnChartModel' => $columnChartModel,
            'rekapColumnChartModel' => $rekapColumnChartModel,
            'kecChart' => $kecChart,
            'suaraPerKecamatan' => $suaraPerKecamatan,
        ]);
    }
}
