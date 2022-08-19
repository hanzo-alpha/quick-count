<?php

  declare(strict_types=1);

  namespace App\Charts;

  use App\Models\HitungCepat;
  use Chartisan\PHP\Chartisan;
  use ConsoleTVs\Charts\BaseChart;
  use Illuminate\Http\Request;

  class StatistikChart extends BaseChart
  {
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    //public ?string $name = 'custom_chart_name';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    //public ?string $routeName = 'chart_route_name';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    //public ?string $prefix = 'some_prefix';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
//    public ?array $middlewares = ['auth','guest'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     *
     * @param  Request  $request
     * @return Chartisan
     */
    public function handler(Request $request): Chartisan
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

        $chart->put('suara1',$item->suara1);
        $chart->put('suara2',$item->suara2);
      }

      return Chartisan::build()
        ->labels(['Jumlah Suara'])
        ->dataset($namaCalon1, [$suara1])
        ->dataset($namaCalon2, [$suara2]);
    }
  }
