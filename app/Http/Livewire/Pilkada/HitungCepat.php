<?php

  namespace App\Http\Livewire\Pilkada;

  use Livewire\Component;

  class HitungCepat extends Component
  {
    public $hitung;

    /** @var int */
    public int $totalSuara1;

    /** @var int */
    public int $totalSuara2;

    /** @var int */
    public int $totalSuaraSah;

    /** @var int */
    public int $totalSuaraTidakSah;

    /** @var int */
    public int $totalDpt;

    /** @var int */
    public int $refreshInSeconds;

    public float $persenSuara1;
    public float $persenSuara2;
    public float $persenSuara;
    public float $persenSuaraTidakSah;
    public float $persenSuaraSah;
    public int $partisipan;
    public int $totalTps;
    public float $persenPartisipan;
    public int $suaraMasuk;
    public int $suaraBlmMasuk;
    public int $totalSuaraMasuk;
    public float $persentaseSuaraMasuk;
    public float $persentaseSuaraBlmMasuk;
    public float $persentaseSuaraAll;

    public function mount($hitung, int $refreshInSeconds = 60): void
    {
      $hitung = $hitung ?: \App\Models\HitungCepat::all();

      $this->totalTps = config('global.total_tps', 517);
      $this->totalDpt = config('global.total_dpt', 175415);

      if (isset($hitung)) {
        $totalSuara1 = 0;
        $totalSuara2 = 0;
        $totalSuaraTidakSah = 0;
        $this->persenSuara1 = 0;
        $this->persenSuara2 = 0;
        $this->persenSuara = 0;
        $this->persenSuaraTidakSah = 0;
        $this->persenSuaraSah = 0;
        $this->partisipan = 0;
        $this->persenPartisipan = 0;
        $this->suaraMasuk = 0;
        $this->suaraBlmMasuk = 0;
        $this->totalSuaraMasuk = 0;
        $this->persentaseSuaraMasuk = 0;
        $this->persentaseSuaraBlmMasuk = 0;

        $tpsMasuk = \App\Models\HitungCepat::status(1)->get();
        $tpsBlmMasuk = \App\Models\HitungCepat::status(0)->get();

        $this->persentaseSuaraMasuk = ($tpsMasuk->count() / $this->totalTps) * 100;
        $this->persentaseSuaraBlmMasuk = (($this->totalTps - $tpsMasuk->count()) / $this->totalTps) * 100;
        $this->persentaseSuaraAll = (($this->persentaseSuaraMasuk + $this->persentaseSuaraBlmMasuk) / $this->totalTps) * 100;
//        dd($this->persentaseSuaraMasuk,$this->persentaseSuaraBlmMasuk,$this->totalTps,$this->persentaseSuaraAll);
        foreach ($hitung as $item) {
          $totalSuara1 += $item->suara1;
          $totalSuara2 += $item->suara2;
          $totalSuaraTidakSah += $item->suara_tidak_sah;
          $this->totalSuara1 = $totalSuara1;
          $this->totalSuara2 = $totalSuara2;
          $this->totalSuaraSah = $this->totalSuara1 + $this->totalSuara2;
          $this->persenSuara1 = (float) ($this->totalSuara1 / $this->totalSuaraSah) * 100;
          $this->persenSuara2 = (float) ($this->totalSuara2 / $this->totalSuaraSah) * 100;
          $this->totalSuaraTidakSah = $totalSuaraTidakSah;
          $this->persenSuaraSah = (float) ($this->totalSuaraSah / $this->totalDpt) * 100;
          $this->persenSuaraTidakSah = (float) ($this->totalSuaraTidakSah / $this->totalDpt) * 100;


          $this->suaraMasuk = $this->totalSuaraSah + $this->totalSuaraTidakSah;
//          $this->suaraMasuk = $tpsMasuk->sum('suara1') + $tpsMasuk->sum('suara2');
          $this->suaraBlmMasuk = $this->totalDpt - $this->suaraMasuk;
          $this->partisipan = $this->suaraMasuk;
          $this->persenSuara = (float) (($this->suaraMasuk + $this->suaraBlmMasuk) / $this->totalDpt) * 100;
        }

        $this->refreshInSeconds = $refreshInSeconds;
        $this->emit('chartUpdate');
      }
    }

    public function render()
    {
      return view('livewire.pilkada.hitung-cepat', [
        'refreshInSeconds' => config('global.refresh_interval_in_seconds', 60),
      ]);
    }
  }
