<?php

namespace App\Http\Controllers;

use App\Exports\HitungCepatExport;
use App\Models\Calon;
use App\Models\HitungCepat;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use DB;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Indonesia;
use Yajra\DataTables\DataTables;

class HitungController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Application|Factory|Response|View
   */
  public function index()
  {
    return view('pages.hitung-cepat.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @param  Request  $request
   * @return Application|Factory|Response|View
   */
  public function create(Request $request)
  {
    $calon = Calon::all()->toArray();

    return view('pages.hitung-cepat.partial._form-add', compact('calon'));
  }

  /**w
   * Store a newly created resource in storage.
   *
   * @param  Request  $request
   * @return RedirectResponse
   */
  public function store(Request $request)
  {
    $request->validate([
      'kecamatan' => 'required',
      'desa' => 'required',
      'tps' => 'required',
      'nama_calon1' => 'required',
      'suara1' => 'required',
      'nama_calon2' => 'required',
      'suara2' => 'required',
    ]);

    $param = $request->all();

    if ($this->checkTps($param)) {
      flash('Data TPS sudah terdaftar')->error();
      return back();
    }

    $hitung = new HitungCepat();
    $hitung->kecamatan = $param['kecamatan'];
    $hitung->desa = $param['desa'];
    $hitung->calon1_id = $param['calon1_id'];
    $hitung->calon2_id = $param['calon2_id'];
    $hitung->nama_calon1 = $param['nama_calon1'];
    $hitung->nama_calon2 = $param['nama_calon2'];
    $hitung->suara1 = $param['suara1'] ?? 0;
    $hitung->suara2 = $param['suara2'] ?? 0;
    $hitung->suara_tidak_sah = $param['suara_tidak_sah'] ?? 0;
    $hitung->no_tps = $param['tps'];
    $hitung->status = 1;

    if ($hitung->save()) {
      flash('Data Suara Calon berhasil disimpan')->success();
      return redirect()->route('hitung-cepat.index');
    }
    flash('Data Suara Calon gagal disimpan')->success();
    return redirect()->route('hitung-cepat.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Application|Factory|Response|View
   */
  public function edit(int $id)
  {
    $calon = Calon::all()->toArray();
    $model = HitungCepat::find($id);
    $kota = Indonesia::findCity(7312, ['districts', 'villages']);
//      $kecamatan = $kota->districts()->pluck('name as nama_kecamatan', 'id as kecid');
    $kecamatan = Kecamatan::where('city_id', 7312)->pluck('name', 'id');
    $desa = Kelurahan::whereIn('district_id', $kota->districts()->select('id')->get())->pluck('name', 'id');

    return view('pages.hitung-cepat.partial._form-edit', compact('id', 'model', 'calon', 'kecamatan', 'desa'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  Request  $request
   * @param  int  $id
   * @return RedirectResponse
   */
  public function update(Request $request, int $id): RedirectResponse
  {
    $request->validate([
      'kecamatan' => 'required',
      'desa' => 'required',
      'tps' => 'required',
      'suara1' => 'required',
      'suara2' => 'required',
    ]);

    $param = $request->all();

    $checkTps = $this->checkTps($param);

    if ($checkTps) {
      $hitung = HitungCepat::find($id);
      $hitung->kecamatan = $param['kecamatan'];
      $hitung->desa = $param['desa'];
      $hitung->calon1_id = $param['calon1_id'];
      $hitung->calon2_id = $param['calon2_id'];
      $hitung->nama_calon1 = $param['nama_calon1'];
      $hitung->nama_calon2 = $param['nama_calon2'];
      $hitung->suara1 = $param['suara1'];
      $hitung->suara2 = $param['suara2'];
      $hitung->suara_tidak_sah = $param['suara_tidak_sah'];
      $hitung->no_tps = $param['tps'];

      if ($hitung->save()) {
        flash('Data Suara Calon berhasil disimpan')->success();
        return redirect()->route('hitung-cepat.index');
      }
      flash('Data Suara Calon gagal disimpan')->error();
      return redirect()->route('hitung-cepat.index');
    }

    flash('Tidak bisa mengubah TPS yang berbeda')->error();
    return redirect()->route('hitung-cepat.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return RedirectResponse|void
   * @throws Exception
   */
  public function destroy(int $id): ?RedirectResponse
  {
    if ($id) {
      $hitung = HitungCepat::find($id);
      if ($hitung->delete()) {
        flash('Data Suara Calon berhasil disimpan')->success();
        return redirect()->route('hitung-cepat.index');
      }
      flash('Data Suara Calon gagal disimpan')->success();
      return redirect()->route('hitung-cepat.index');
    }
    return abort(404);
  }

  public function getHitungSuaraData()
  {
//    $query = DB::table('hitung_suara')
//      ->select([
//        'hitung_suara.id',
//        'hitung_suara.kecamatan',
//        'indonesia_districts.code as id_kecamatan',
//        'indonesia_districts.name as nama_kecamatan',
//        'indonesia_villages.code as id_desa',
//        'indonesia_villages.name as nama_desa',
//        'hitung_suara.desa',
//        'hitung_suara.no_tps',
//        'hitung_suara.nama_calon1',
//        'hitung_suara.nama_calon2',
//        'hitung_suara.suara1',
//        'hitung_suara.suara2',
//        'hitung_suara.suara_tidak_sah',
//      ])
//      ->leftJoin('indonesia_districts', 'indonesia_districts.code', '=', 'hitung_suara.kecamatan')
//      ->leftJoin('indonesia_villages', 'indonesia_villages.code', '=', 'hitung_suara.desa')
//      ->where('indonesia_districts.city_code', '7312')
//      ->orderBy('hitung_suara.id', 'asc');
//
    $query = HitungCepat::query()
      ->with(['kecamatan', 'desa'])
      ->whereHas('kecamatan', function ($q) {
        $q->where('city_code', '7312');
      })
      ->orderBy('id')
    ;


//        ->whereHas('kecamatan', function ($q){
//          $q->where('city_code', '7312');
//        })
//      ;

    return Datatables::of($query)
      ->editColumn('suara1', function ($hitung) {
        return number_format($hitung->suara1, 0, ',', '.');
      })
      ->editColumn('suara2', function ($hitung) {
        return number_format($hitung->suara2, 0, ',', '.');
      })
      ->addColumn('action', function ($hitung) {
        $edit['url'] = route('hitung-cepat.edit', $hitung->id);
        $edit['role'] = 'edit_data_hitung_cepat';
        $delete['url'] = route('hitung-cepat.destroy', $hitung->id);
        $delete['role'] = 'hapus_hitung_cepat';
        $format = 'd';

        return view('pages.hitung-cepat.buttons', compact('edit', 'delete', 'format'));
      })
      ->rawColumns(['suara1', 'suara2'])
      ->setRowClass('text-center')
      ->make(true);
  }

  private function checkTps($param): bool
  {
    return HitungCepat::where('kecamatan', $param['kecamatan'])->where('desa', $param['desa'])
      ->where('no_tps', $param['tps'])->exists();
  }

  public function export(): HitungCepatExport
  {
    return new HitungCepatExport();
  }
}
