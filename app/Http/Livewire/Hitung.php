<?php

  namespace App\Http\Livewire;

  use App\Models\Calon;
  use App\Models\HitungCepat;
  use Indonesia;
  use Livewire\Component;

  class Hitung extends Component
  {
    public $calon;
    public $kec;
    protected $request;
    public int $kotaId = 7312;
    public int $provId = 73;


    public $kecamatan;
    public $desa;
    public $tps;
    public $nama_calon1;
    public $nama_calon2;
    public $suara1;
    public $suara2;
    public $suara_tidak_sah;

    public $foo = false;

    protected array $rules = [
//      'foo' => 'required|min:6',
      'kecamatan' => 'required',
      'desa' => 'required',
      'tps' => 'required',
      'nama_calon1' => 'required',
      'suara1' => 'required',
      'nama_calon2' => 'required',
      'suara2' => 'required',
    ];

    public function mount(Calon $calon)
    {
      $this->calon = $calon->all()->toArray();
      $kota = Indonesia::findCity($this->kotaId, ['districts']);
      $this->kec = $kota->districts()->get();
//      dd($this->kec);
    }

    public function submit()
    {
      $validData = $this->validate();

      $param = $validData;

      $checkTps = $this->checkTps($param);

      if ($checkTps) {
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

      if ($hitung->save()) {
        $this->emit('post-saved');
        flash('Data Suara Calon berhasil disimpan')->success();
        return redirect()->route('hitung-cepat.index');
      }
      flash('Data Suara Calon gagal disimpan')->success();
      return redirect()->route('hitung-cepat.index');
    }

    private function checkTps($param)
    {
      return HitungCepat::where('kecamatan', $param['kecamatan'])->where('desa', $param['desa'])
        ->where('no_tps', $param['tps'])->exists();
    }

    public function render()
    {
//      $kota = \Indonesia::findCity($this->kotaId,['districts']);
//      $this->kec = $kota->districts()->get();

      return view('livewire.hitung', ['kec' => $this->kec]);
    }
  }
