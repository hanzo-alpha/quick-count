<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Database\Eloquent\Relations\HasOne;

  /**
 * @mixin IdeHelperHitungCepat
 */
  class HitungCepat extends Model
  {
    /**
     * @var string
     */
    public $table = 'hitung_suara';

    /**
     * @var string
     */
//    protected $data = '';

    public $fillable = [
      'kabupaten','kecamatan', 'desa', 'calon1_id', 'calon2_id', 'nama_calon1', 'nama_calon2', 'suara1', 'suara2', 'suara_tidak_sah', 'no_tps', 'status','dpt'
    ];

    protected $attributes = [
        'kabupaten' => '7312'
    ];

    protected $casts = [
        'status' => 'bool',
    ];

    public function calon(): HasOne
    {
      return $this->hasOne(Calon::class, 'id', 'calon_id');
    }

    public function tps(): HasOne
    {
      return $this->hasOne(Tps::class, 'id', 'tps_id');
    }

      public function kabupaten(): BelongsTo
      {
          return $this->belongsTo(Kota::class, 'kabupaten', 'code');
      }

    public function kec(): BelongsTo
    {
      return $this->belongsTo(Kecamatan::class, 'kecamatan', 'code');
    }

    public function desa(): BelongsTo
    {
      return $this->belongsTo(Kelurahan::class, 'desa', 'code');
    }

    public function scopeTpsMasuk($query)
    {
      return $query->where('status', 1);
    }

    public function scopeTpsBlmMasuk($query)
    {
      return $query->where('status', 0);
    }

    public function scopeStatus($query, $status)
    {
      return $query->where('status', $status);
    }

    public static function getJumlahSuara($id)
    {
      $id = $id ?? null;
      if (null !== $id) {
        $jumlah = self::find($id);
        return (null !== $jumlah) ? $jumlah->jumlah_suara_1 + $jumlah->jumlah_suara_2 : 0;
      }
      return 0;
    }

    public static function getTotalSuara($id)
    {
      $id = $id ?? null;
      if (null !== $id) {
        $total = self::find($id);
        return (null !== $total) ? $total->total_suara : 0;
      }
      return 0;
    }

    public static function getPersentaseSuara($id)
    {
      $id = $id ?? null;
      if (null !== $id) {
        $persen = self::find($id);
        return (null !== $persen) ? $persen->persentase_suara : 0;
      }
      return 0;
    }

    public static function countTps($tpsId): int
    {
      $tpsId = $tpsId ?? null;
      if (null !== $tpsId) {
        $tps = self::where('tps_id', $tpsId)->get();
        return (null !== $tps) ? $tps->count() : 0;
      }
      return 0;
    }
  }
