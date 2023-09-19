<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;
use Indonesia;
use Laravolt\Indonesia\IndonesiaService;

class WilayahController extends Controller
{

    public array $data;
    public array $result;
    public int $kotaId = 7312;
    public int $provId = 73;
    public IndonesiaService $wilayah;

    /**
     * Create a new controller instance.
     *
     * @param  IndonesiaService  $wilayah
     */
    public function __construct(IndonesiaService $wilayah)
    {
        $this->wilayah = $wilayah;
        $this->data = [];
        $this->result = [
            'results' => [],
        ];
        $this->middleware('auth');
    }

    public function getSelectProvinsi(Request $request)
    {

        if ($request->ajax()) {
            $param = $request->except('type');
            $prov = Indonesia::search($param['q'])->paginateProvinces();
            foreach ($prov as $item) {
                $this->result['results'][] = [
                    'id' => $item->id,
                    'text' => $item->name,
                ];
            }
        }
        return response()->json($this->result);
    }

    public function getSelectKota(Request $request)
    {

        if ($request->ajax()) {
            $param = $request->except('type');
            $q = $request->has('q') ? $param['q'] : "";
            $kota = Indonesia::findProvince($param['i'] ?? $this->provId, ['cities']);
            $city = $kota->cities()->where('name', 'LIKE', '%' . $q . '%')->get();
            foreach ($city as $item) {
                $this->result['results'][] = [
                    'id' => $item->id,
                    'text' => $item->name,
                    'name' => $kota->name,
                ];
            }
        }
        return response()->json($this->result);
    }

    public function getSelectKecamatan(Request $request)
    {
        if ($request->ajax()) {
            $param = $request->except('type');
            $q = $request->has('q') ? $param['q'] : "";
            // $kota = Indonesia::findCity($param['i'] ?? $this->kotaId, ['districts']);
            $kota = Kota::where('code', $param['i'] ?? $this->kotaId)->with(['districts'])->first();
            $district = $kota->districts()->where('indonesia_districts.name', 'LIKE', '%' . $q . '%')->get();
            foreach ($district as $item) {
                $this->result['results'][] = [
                    'id' => $item->id,
                    'text' => $item->name,
                    'name' => $kota->name,
                ];
            }
        }
        return response()->json($this->result);
    }

    public function getSelectDesa(Request $request)
    {
        if ($request->ajax()) {
            $param = $request->except('type');
            $q = $request->has('q') ? $param['q'] : "";

            $kota = Indonesia::findDistrict($param['i'], ['villages']);
            $desa = $kota->villages()->where('name', 'LIKE', '%' . $q . '%')->get();
            foreach ($desa as $item) {
                $this->result['results'][] = [
                    'id' => $item->id,
                    'text' => $item->name,
                    'name' => $kota->name,
                ];
            }
        }
        return response()->json($this->result);
    }
}
