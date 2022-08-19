<?php

  namespace App\Http\Controllers;

  use App\Models\HitungCepat;
  use App\Models\Kecamatan;

  class FrontController extends Controller
  {
    public function __construct()
    {
      $this->middleware('guest');
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

      $hitung = HitungCepat::select(['kecamatan', 'desa', 'nama_calon1', 'nama_calon2', 'suara1', 'suara2', 'no_tps', 'suara_tidak_sah'])->get();
      $kecamatan = Kecamatan::with(['hitung'])->where('city_code', '7312')->select(['id', 'name'])->get();

      return view('pages.front-dashboard', [
        'pageConfigs' => $pageConfigs,
        'hitung' => $hitung,
        'kecamatan' => $kecamatan,
        'totalDpt' => $totalDpt,
      ]);
    }
  }
