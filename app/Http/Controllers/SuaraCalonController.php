<?php

  namespace App\Http\Controllers;

  use App\Models\Calon;
  use App\Models\RefJenisCalon;
  use App\Models\SuaraCalon;
  use App\Models\Tps;
  use DB;
  use Exception;
  use Illuminate\Contracts\Foundation\Application;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Illuminate\Http\Response;
  use Illuminate\View\View;
  use Indonesia;
  use Yajra\Datatables\Datatables;

  class SuaraCalonController extends Controller
  {
    protected SuaraCalon $suaraCalon;
    public array $data;
    public array $result;

    /**
     * Create a new controller instance.
     *
     * @param  SuaraCalon  $suaraCalon
     */
    public function __construct(SuaraCalon $suaraCalon)
    {
      $this->suaraCalon = $suaraCalon;
      $this->data = [];
      $this->result = [
        'results' => [],
      ];
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
      return view('pages.suara-calon.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
      $id = null;
      if($request->has('id')){
        $calon = Calon::find($request->get('id'));
        $id = $calon->id;
      }
      $calon = Calon::all();
      $jenisCalon = RefJenisCalon::pluck('jenis_calon','id');
      $tps = Tps::all();
//      $tps = Tps::pluck('nama_tps','id');
      return view('pages.suara-calon.partial._form-add' ,compact('id','jenisCalon','tps','calon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
//      $request->validate([
//        'paslon' => 'required',
//        'tps' => 'required',
//        'jumlah_suara' => 'required',
//      ]);

      $param = $request->all();

      $suaraCalon = new SuaraCalon();
      $suaraCalon->tps_id = $param['tps'];
      $suaraCalon->calon_id =  $param['paslon'];
      $suaraCalon->jumlah_suara = (int) $param['jumlah_suara'];
      $suaraCalon->total_suara = 0;
      $suaraCalon->persentase_suara = (float) 0;

      if ($suaraCalon->save()) {
        flash('Data Suara Calon berhasil disimpan')->success();
        return redirect()->route('data-suara-calon.index');
      }
      flash('Data Suara Calon gagal disimpan')->success();
      return redirect()->route('data-suara-calon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show(int $id): void
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit(Request $request, int $id)
    {
      $calonId = $request->has('calon_id') ? $request->get('calon_id') : null;
      $model = $this->suaraCalon::find($id);
      $calon = Calon::find($calonId);
      $tps = Tps::find($model->tps_id);

      $namaKec = Indonesia::findDistrict($tps->kec_id)->name;
      $namaKel = Indonesia::findVillage($tps->kel_id)->name;
      $namaKecKel = $namaKec .'/'.$namaKel;

      return view('pages.suara-calon.partial._form-edit',compact('id','tps','model','calon','namaKecKel'));
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
        'tps' => 'required',
        'paslon' => 'required',
        'jumlah_suara' => 'required',
      ]);

      $param = $request->all();

      $suaraCalon = $this->suaraCalon::find($id);
      $suaraCalon->tps_id = $param['tps'];
      $suaraCalon->calon_id = $param['paslon'];
      $suaraCalon->jumlah_suara = $param['jumlah_suara'];
      $suaraCalon->total_suara = 0;
      $suaraCalon->persentase_suara = 0;

      if ($suaraCalon->save()) {
        flash('Data Suara Calon berhasil diubah')->success();
        return back();
      }
      flash('Data Suara Calon gagal diubah')->success();
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
      if ($id) {
        $suaraCalon = $this->suaraCalon::find($id);
        if ($suaraCalon->delete()) {
          flash('Data Suara Calon berhasil dihapus', 'success');
          return back();
        }
        flash('Data Suara Calon berhasil dihapus', 'error');
        return back();
      }
      flash('ID Tidak ditemukan', 'error');
      return back();
    }

    public function getSuaraCalonData()
    {
      $query = DB::table('suara_calon')
        ->select([
          'suara_calon.id',
          'suara_calon.jumlah_suara',
//          'suara_calon.total_suara',
//          'suara_calon.persentase_suara',
          'tps.id as id_tps',
          'tps.kec_id',
          'tps.kel_id',
          'tps.nama_tps',
          'indonesia_districts.name as kecamatan',
          'indonesia_villages.name as kelurahan',
          'calon.id as id_calon',
          'calon.nama_calon_1',
          'calon.nama_calon_2',
          'ref_jenis_calon.id as jeniscalon_id',
          'ref_jenis_calon.jenis_calon',
        ])
        ->leftJoin('tps', 'tps.id','=','suara_calon.tps_id')
        ->leftJoin('calon', 'calon.id','=','suara_calon.calon_id')
        ->leftjoin('indonesia_districts', 'indonesia_districts.id','=','tps.kec_id')
        ->leftjoin('indonesia_villages', 'indonesia_villages.id','=','tps.kel_id')
        ->leftJoin('ref_jenis_calon', 'ref_jenis_calon.id','=','calon.id')
        ->orderBy('suara_calon.id', 'asc')
      ;

      return Datatables::of($query)
//        ->setIndexColumn('suara_calon.id')
//        ->editColumn('kec_id', function($suaracalon){
//          return \Indonesia::findDistrict($suaracalon->kec_id)->name;
//        })
//        ->editColumn('kel_id', function ($tps) {
//          return \Indonesia::findVillage($tps->kel_id)->name;
//        })
        ->addColumn('action', function ($calon) {
          $edit['url'] = route('data-suara-calon.edit', [$calon->id,'calon_id' => $calon->id_calon]);
          $edit['role'] = 'edit_data_suara_calon';
          $delete['url'] = route('data-suara-calon.destroy', $calon->id);
          $delete['role'] = 'hapus_suara_calon';
          $format = 'd';

          return view('pages.suara-calon.buttons', compact('edit', 'delete', 'format'));

        })
//        ->editColumn('status', function ($calon) {
//          if ($calon->status === 1) {
//            $label = '<div class="badge badge-pill d-inline-flex align-items-center badge-glow badge-light-success mr-1 mb-1">Aktif</div>';
//          } else {
//            $label = '<div class="badge badge-pill d-inline-flex align-items-center badge-glow badge-light-danger mr-1 mb-1">Tidak Aktif</div>';
//          }
//          return $label;
//        })
//        ->rawColumns(['action'])
        ->make(true);
    }

    public function getSelectPaslon(Request $request)
    {

      if ($request->ajax()) {
        $param = $request->except('type');
        $q = $request->has('q') ? $param['q'] : "";

        $calon = Calon::query()
          ->where('nama_calon_1','LIKE','%'.$q.'%')
          ->orWhere('nama_calon_2','LIKE','%'.$q.'%')
          ->get();

        foreach ($calon as $item) {
          $this->result['results'][] = [
            'id' => $item->id,
            'text' => $item->nama_calon_1.' / '.$item->nama_calon_2,
            'info' => RefJenisCalon::getJenisCalonName($item->jenis_calon),
          ];
        }
      }
      return response()->json($this->result);
    }

    public function getSelectTps(Request $request)
    {

      if ($request->ajax()) {
        $param = $request->except('type');
        $q = $request->has('q') ? $param['q'] : "";

        $tps = Tps::query()
          ->where('nama_tps','LIKE','%'.$q.'%')
          ->get();

        foreach ($tps as $item) {
          $this->result['results'][] = [
            'id' => $item->id,
            'text' => $item->nama_tps,
            'info' => Indonesia::findDistrict($item->kec_id)->name . ' / ' . Indonesia::findVillage($item->kel_id)->name,
          ];
        }
      }
      return response()->json($this->result);
    }
  }
