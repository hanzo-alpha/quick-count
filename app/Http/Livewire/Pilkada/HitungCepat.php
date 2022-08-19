<?php

namespace App\Http\Livewire\Pilkada;

use Livewire\Component;
use App\Models\HitungCepat as ModelHitung;

class HitungCepat extends Component
{
    public ModelHitung $hitung;

    /** @var int */
    public int $totalSuara1 = 0;

    /** @var int */
    public int $totalSuara2 = 0;

    /** @var int */
    public int $totalSuaraSah = 0;

    /** @var int */
    public int $totalSuaraTidakSah = 0;

    /** @var int */
    public int $totalDpt = 0;

    /** @var int */
    public int $refreshInSeconds = 60;

    public float $persenSuara1 = 0;
    public float $persenSuara2 = 0;
    public float $persenSuara = 0;
    public float $persenSuaraTidakSah = 0;
    public float $persenSuaraSah = 0;
    public int $partisipan = 0;
    public int $totalTps = 0;
    public float $persenPartisipan = 0;
    public int $suaraMasuk = 0;
    public int $suaraBlmMasuk = 0;
    public int $totalSuaraMasuk = 0;
    public float $persentaseSuaraMasuk = 0;
    public float $persentaseSuaraBlmMasuk = 0;
    public float $persentaseSuaraAll = 0;

    public function mount(ModelHitung $hitung, int $refreshInSeconds = 60): void
    {
        $this->hitung = $hitung;
        $this->totalTps = config('global.total_tps', 517);
        $this->totalDpt = config('global.total_dpt', 175415);
        $query = $this->hitung->query();

        $tpsMasuk = $query->status(1)->get();
        $tpsBlmMasuk = $query->status(0)->get();

        $this->persentaseSuaraMasuk = ($tpsMasuk->count() / $this->totalTps) * 100;
        $this->persentaseSuaraBlmMasuk = (($this->totalTps - $tpsBlmMasuk->count()) / $this->totalTps) * 100;
        $this->persentaseSuaraAll = (($this->persentaseSuaraMasuk + $this->persentaseSuaraBlmMasuk) / $this->totalTps) * 100;

        $this->hitung->get()->each(function ($item) {
            $this->totalSuara1 += $item->suara1;
            $this->totalSuara2 += $item->suara2;
            $this->totalSuaraTidakSah += $item->suara_tidak_sah;
            $this->totalSuaraSah = $this->totalSuara1 + $this->totalSuara2;
            $this->persenSuara1 = (float) ($this->totalSuara1 / $this->totalSuaraSah) * 100;
            $this->persenSuara2 = (float) ($this->totalSuara2 / $this->totalSuaraSah) * 100;
            $this->persenSuaraSah = (float) ($this->totalSuaraSah / $this->totalDpt) * 100;
            $this->persenSuaraTidakSah = (float) ($this->totalSuaraTidakSah / $this->totalDpt) * 100;
            $this->suaraMasuk = $this->totalSuaraSah + $this->totalSuaraTidakSah;
            $this->suaraBlmMasuk = $this->totalDpt - $this->suaraMasuk;
            $this->partisipan = $this->suaraMasuk;
            $this->persenSuara = (float) (($this->suaraMasuk + $this->suaraBlmMasuk) / $this->totalDpt) * 100;
        });

        $this->refreshInSeconds = $refreshInSeconds;
        $this->emit('chartUpdate');
    }

    public function render()
    {
        return view('livewire.pilkada.hitung-cepat', [
            'refreshInSeconds' => config('global.refresh_interval_in_seconds', 60),
        ]);
    }
}
