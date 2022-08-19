<?php

  declare(strict_types=1);

  namespace App\Charts;

  use App\Models\HitungCepat;
  use App\Models\Kecamatan;
  use Chartisan\PHP\Chartisan;
  //use ConsoleTVs\Charts\BaseChart;
  use Illuminate\Http\Request;

  class RekapKecamatanChart extends BaseChart
  {
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
      $label = [];
      $suara1 = [];
      $suara2 = [];

      $kecamatan = Kecamatan::where('city_id', 7312)->select(['id', 'name'])->get();

      foreach ($kecamatan as $item) {
        $suaraKecamatan = HitungCepat::where('kecamatan', $item->id)->get();
        $totalSuara1 = $suaraKecamatan->sum('suara1');
        $totalSuara2 = $suaraKecamatan->sum('suara2');
        $label[] = $item->name;
        $suara1[] = $totalSuara1;
        $suara2[] = $totalSuara2;
      }

      return Chartisan::build()
        ->labels($label)
        ->dataset('Persentase Suara Paslon ', $suara1)
        ->dataset('Persentase Suara Kolom Kosong', $suara2);
    }
  }
