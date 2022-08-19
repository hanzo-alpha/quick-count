<?php

namespace App\Http\Controllers;

use App\Models\HitungCepat;
use App\Models\Kecamatan;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
//        $breadcrumbs = [
//            ['link' => "/", 'name' => "Home"], ['link' => "#", 'name' => "Starter Kit"], ['name' => "1 Column"],
//            ['link' => "/", 'name' => "Home"],
//        ];
    //Pageheader set true for breadcrumbs
//        $pageConfigs = ['pageHeader' => true];
//
//        return view('pages.front-dashboard',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    $hitung = HitungCepat::all();
    $kecamatan = Kecamatan::where('city_code', 7312)->select(['id', 'name'])->get();

    $persentase1 = [];
    $persentase2 = [];

    foreach ($kecamatan as $item) {
      $suaraKecamatan = HitungCepat::where('kecamatan', $item->id)->get();
      $totalSuara1 = $suaraKecamatan->sum('suara1');
      $totalSuara2 = $suaraKecamatan->sum('suara2');
      $totalDpt = config('global.total_dpt') ?: 175415;

      $persentase1[] = ($totalSuara1 / $totalDpt) * 100;
      $persentase2[] = ($totalSuara2 / $totalDpt) * 100;
    }

    return view('pages.dashboard', compact('hitung', 'persentase1', 'persentase2', 'kecamatan'));
  }
}
