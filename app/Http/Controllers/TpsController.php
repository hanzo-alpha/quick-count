<?php

namespace App\Http\Controllers;

use App\Http\Requests\TpsRequest;
use App\Models\Calon;
use App\Models\Mesin;
use App\Models\Tps;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Laravolt\Indonesia\IndonesiaService;
use Yajra\Datatables\Datatables;
use Indonesia;

class TpsController extends Controller
{
    protected Tps $tps;
    public IndonesiaService $wilayah;
    public array $data;
    public array $result;

    /**
     * Create a new controller instance.
     *
     * @param  IndonesiaService  $wilayah
     * @param  Tps  $tps
     */
    public function __construct(IndonesiaService $wilayah, Tps $tps)
    {
        $this->wilayah = $wilayah;
        $this->tps = $tps;
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
        return view('pages.tps.index');
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
        $tps = collect();
        if ($request->has('id')) {
            $tps = Tps::find($id);
            $id = $tps->id;
        }

        return view('pages.tps.partial._form-add', compact('id', 'tps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TpsRequest  $request
     * @return RedirectResponse
     */
    public function store(TpsRequest $request): RedirectResponse
    {
        $param = $request->validated();

//      $user = new User();
//      $user->email = $param['email'];
//      $user->name = strtolower(trim(Indonesia::findVillage($param['kel_id'])->name));
//      $user->password = \Hash::make($param['password']);
//      $user->is_superadmin = 0;
//
//      if ($user->save()) {
//        $userSave = 1;
//      } else {
//        $userSave = 0;
//      }

        $tpsid = Tps::max('id') + 1;

        $tps = new Tps();
        $tps->prov_id = $param['provinsi'];
        $tps->kota_id = $param['kota'];
        $tps->kec_id = $param['kecamatan'];
        $tps->kel_id = $param['desa'];
        $tps->user_id = 0;
        $tps->nama_tps = 'TPS '.$tpsid;
        $tps->jumlah_tps = strtoupper($param['jumlah_tps']);
        $tps->status = 1;

        if ($tps->save()) {
            flash('Data TPS berhasil disimpan')->success();
            return back();
        }

        flash('Data TPS gagal disimpan')->success();
        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id): ?Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View|null
     */
    public function edit(int $id)
    {
        $id = $id ?? 0;
        $tps = Tps::find($id);
        $calon = Calon::find($id);
        return view('pages.tps.partial._form-edit', compact('id'));
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
            'jumlah_tps' => 'required|integer',
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
        $tps->nama_tps = strtoupper('TPS_').$param['jumlah_tps'];
        $tps->jumlah_tps = strtoupper($param['jumlah_tps']);
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
    public function destroy($id): RedirectResponse
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


    public function getTpsData(Request $request)
    {
        $query = Tps::query()
            ->with(['provinsi', 'kota', 'kecamatan', 'desa']);

        return Datatables::of($query)
//            ->addIndexColumn('id')
            ->addColumn('action', function ($tps) {
                $edit['url'] = route('data-tps.edit', $tps->id);
                $edit['role'] = 'edit_data_tps';
                $delete['url'] = route('data-tps.destroy', $tps->id);
                $delete['role'] = 'hapus_tps';
                $format = 'd';

                return view('pages.tps.buttons', compact('edit', 'delete', 'format'));
            })
            ->editColumn('prov_id', function ($tps) {
                return $tps->provinsi->name;
            })
            ->editColumn('kota_id', function ($tps) {
                return $tps->kota->name;
            })
            ->editColumn('kec_id', function ($tps) {
                return $tps->kecamatan->name;
            })
            ->editColumn('kel_id', function ($tps) {
                return $tps->desa->name;
            })
//            ->editColumn('status', function ($tps) {
//                if ($tps->status === 1) {
//                    $label = '<div class="badge badge-pill d-inline-flex align-items-center badge-glow badge-light-success mr-1 mb-1">Aktif</div>';
//                } else {
//                    $label = '<div class="badge badge-pill d-inline-flex align-items-center badge-glow badge-light-danger mr-1 mb-1">Tidak Aktif</div>';
//                }
//                return $label;
//            })
            ->setRowClass('align-middle text-center')
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

}
