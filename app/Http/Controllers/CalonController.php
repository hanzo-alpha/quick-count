<?php

  namespace App\Http\Controllers;

  use App\Models\Calon;
  use App\Models\RefJenisCalon;
  use App\Models\Tps;
  use App\Models\User;
  use Carbon\Carbon;
  use DB;
  use Exception;
  use Hash;
  use Illuminate\Contracts\Foundation\Application;
  use Illuminate\Contracts\View\Factory;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Illuminate\Http\Response;
  use Illuminate\View\View;
  use Indonesia;
  use Yajra\DataTables\DataTables;

  class CalonController extends Controller
  {
    public array $data;
    public array $result;
    /**
     * @var Calon
     */
    protected Calon $calon;

    /**
     * Create a new controller instance.
     *
     * @param  Calon  $calon
     */
    public function __construct(Calon $calon)
    {
      $this->calon = $calon;
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
      $tgl = Carbon::now()->format('l, d F Y H:i');
      return view('pages.calon.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
//      return view('pages.calon.create');
      return view('pages.calon.partial._form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
      $request->validate([
        'jenis_calon' => 'required',
        'nama_calon_1' => 'required',
        'nama_calon_2' => 'required',
      ]);

      $param = $request->all();

      $calon = new Calon();
      $calon->jenis_calon = $param['jenis_calon'];
      $calon->nama_calon_1 =  strtoupper($param['nama_calon_1']);
      $calon->nama_calon_2 = strtoupper($param['nama_calon_2']);
      $calon->status = 1;

      if ($calon->save()) {
        flash('Data Calon berhasil disimpan')->success();
        return back();
      }
      flash('Data Calon gagal disimpan')->success();
      return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View|null
     */
    public function show(int $id)
    {
      //
      return view('',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit(int $id)
    {
      $id = $id ?? 0;
      $model = Calon::find($id);
      $jenisCalon = RefJenisCalon::find($model->jenis_calon);
      return view('pages.calon.partial._form-edit',compact('id','model','jenisCalon'));
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
        'prov_id' => 'required',
        'kota_id' => 'required',
        'kec_id' => 'required',
        'kel_id' => 'required',
        'nama_tps' => 'required',
        'email' => 'required',
        'password' => 'required',
      ]);

      $param = $request->all();

      $user = User::find($param['email']);
      $user->email = $param['email'];
      $user->name = strtolower(trim(Indonesia::findVillage($param['kel_id'])->name));
      $user->password = Hash::make($param['password']);
      $user->is_superadmin = 0;

      if ($user->save()) {
        $userSave = 1;
      } else {
        $userSave = 0;
      }

      $tps = Tps::find($id);
      $tps->prov_id = $param['prov_id'];
      $tps->kota_id = $param['kota_id'];
      $tps->kec_id = $param['kec_id'];
      $tps->kel_id = $param['kel_id'];
      $tps->user_id = $user->id;
      $tps->nama_tps = strtoupper($param['nama_tps']);
      $tps->status = 1;

      if ($userSave === 1 && $tps->save()) {
        flash('Data TPS berhasil disimpan')->success();
        return back();
      }
      flash('Data TPS gagal disimpan')->success();
      return back()->withInput();
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
        $tps = Tps::find($id);
        if ($tps->delete()) {
          flash('Data tps berhasil dihapus', 'success');
          return back();
        }
        flash('Data tps berhasil dihapus', 'error');
        return back();
      }
      flash('ID Tidak ditemukan', 'error');
      return back();
    }

    public function getSelectJenisCalon(Request $request)
    {

      if ($request->ajax()) {
        $param = $request->except('type');
        $q = $request->has('q') ? $param['q'] : "";
        $jenis = RefJenisCalon::query()->where('jenis_calon','LIKE','%'.$q.'%')->get();
        foreach ($jenis as $item) {
          $this->result['results'][] = [
            'id' => $item->id,
            'text' => $item->jenis_calon,
          ];
        }
      }
      return response()->json($this->result);
    }

    public function getCalonData()
    {
      $query = DB::table('calon')
        ->select(['calon.id', 'ref_jenis_calon.jenis_calon', 'calon.nama_calon_1', 'calon.nama_calon_2', 'calon.status'])
        ->join('ref_jenis_calon', 'ref_jenis_calon.id','=','calon.jenis_calon')
        ->orderBy('calon.id', 'asc')
      ;

      return Datatables::of($query)
        ->addColumn('action', function ($calon) {
          $input['url'] = route('data-suara-calon.create',['id' => $calon->id]);
          $input['role'] = 'input_suara_calon';
          $edit['url'] = route('data-calon.edit', $calon->id);
          $edit['role'] = 'edit_data_calon';
          $delete['url'] = route('data-calon.destroy', $calon->id);
          $delete['role'] = 'hapus_calon';
          $format = 'd';

          return view('pages.calon.buttons', compact('input','edit', 'delete', 'format'));

        })
        ->editColumn('status', function ($calon) {
          if ($calon->status === 1) {
            $label = '<div class="badge badge-pill d-inline-flex align-items-center badge-glow badge-light-success mr-1 mb-1">Aktif</div>';
          } else {
            $label = '<div class="badge badge-pill d-inline-flex align-items-center badge-glow badge-light-danger mr-1 mb-1">Tidak Aktif</div>';
          }
          return $label;
        })
//            ->setRowClass('align-items-center')
        ->rawColumns(['status'])
        ->make(true);
    }
  }
