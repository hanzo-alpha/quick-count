<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Laravolt\Indonesia\IndonesiaService;
use Yajra\Datatables\Datatables;
use Indonesia;
use Illuminate\Http\Request;

class Tps extends Component
{
    public $tps, $wilayah, $data, $kota_id;
    public $prov, $kota,$kec,$desa, $namaTps, $email, $password;


    public function render()
    {
        $this->tps = \App\Models\Tps::all();
        return view('livewire.tps');
    }

    private function resetInputFields(){
        $this->namaTps = '';
        $this->password = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        User::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }

    public function getTpsData(Request $request)
    {
        $query = \DB::table('tps')
            ->select(['tps.id','tps.prov_id','tps.kota_id','tps.kec_id','tps.kel_id','tps.nama_tps',
                'tps.jumlah_tps','tps.status'])
            ->join('indonesia_provinces', 'tps.id','=','indonesia_provinces.id')
            ->join('indonesia_cities', 'tps.kota_id','=','indonesia_cities.province_id')
            ->join('indonesia_districts', 'tps.kec_id','=','indonesia_districts.city_id')
            ->join('indonesia_villages', 'tps.kel_id','=','indonesia_villages.district_id')
        ;

        return Datatables::of($query)
            ->addColumn('action', function ($tps){
                $edit['url'] = route('data-tps.edit', $tps->id);
                $edit['role'] = 'edit_data_tps';
                $delete['url'] = route('data-tps.destroy', $tps->id);
                $delete['role'] = 'hapus_mesin';

                return view('pages.mesin.buttons', compact('edit', 'delete'));

            })
            ->editColumn('prov_id', function ($tps){
                return \Indonesia::findProvince($tps->prov_id)->name();
            })
            ->editColumn('kota_id', function ($tps){
                return \Indonesia::findCity($tps->kota_id)->name();
            })
            ->editColumn('kec_id', function ($tps){
                return \Indonesia::findDistrict($tps->kec_id)->name();
            })
            ->editColumn('kel_id', function ($tps){
                return \Indonesia::findVillage($tps->kel_id)->name();
            })
            ->editColumn('status', function ($tps){
                if($tps->status === 1) {
                    $label = '<i class="bx bxs-square-rounded text-success"></i>';
                }else{
                    $label = '<i class="bx bxs-square-rounded text-danger"></i>';
                }
                return $label;
            })
//            ->setRowClass('text-center')
            ->rawColumns(['action','status'])
            ->make(true);
    }

    public function getSelectProvinsi(Request $request) {
        $result = [
            'results' => [],
        ];
        if($request->ajax()){
            $param = $request->except('type');
            $prov = Indonesia::search($param['q'])->paginateProvinces();
//            $city = $kota->cities()->where('name','LIKE','%'.$param['q'].'%')->get();
            foreach ($prov as $item) {
                $result['results'][] = [
                    'id' => $item->id,
                    'text' => $item->name
                ];
            }
        }
        return response()->json($result);
    }

    public function getSelectKota(Request $request) {
        $result = [
            'results' => [],
        ];
        if($request->ajax()){
            $param = $request->except('type');
            $q = $request->has('q') ? $param['q'] : "";
            $kota = Indonesia::findProvince($param['i'],['cities']);
            $city = $kota->cities()->where('name','LIKE','%'.$q.'%')->get();
            foreach ($city as $item) {
                $result['results'][] = [
                    'id' => $item->id,
                    'text' => $item->name,
                    'name' => $kota->name,
                ];
            }
        }
        return response()->json($result);
    }

    public function getSelectKecamatan(Request $request) {
        $result = [
            'results' => [],
        ];
        if($request->ajax()){
            $param = $request->except('type');
            $q = $request->has('q') ? $param['q'] : "";
            $kota = Indonesia::findCity($param['i'],['districts']);
            $district = $kota->districts()->where('indonesia_districts.name','LIKE','%'.$q.'%')->get();
            foreach ($district as $item) {
                $result['results'][] = [
                    'id' => $item->id,
                    'text' => $item->name,
                    'name' => $kota->name,
                ];
            }
        }
        return response()->json($result);
    }
    public function getSelectDesa(Request $request) {
        $result = [
            'results' => [],
        ];
        if($request->ajax()){
            $param = $request->except('type');
            $q = $request->has('q') ? $param['q'] : "";

            $kota = Indonesia::findDistrict($param['i'],['villages']);
            $desa = $kota->villages()->where('name','LIKE','%'.$q.'%')->get();
            //$desa = $kota->villages()->where('indonesia_villages.name','LIKE','%'.$param['q'].'%')->get();
            foreach ($desa as $item) {
                $result['results'][] = [
                    'id' => $item->id,
                    'text' => $item->name,
                    'name' => $kota->name,
                ];
            }
        }
        return response()->json($result);
    }
}
