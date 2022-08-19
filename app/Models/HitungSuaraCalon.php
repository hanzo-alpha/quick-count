<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Database\Eloquent\Relations\HasOne;

  /**
 * @mixin IdeHelperHitungSuaraCalon
 */
  class HitungSuaraCalon extends Model
  {
    /**
     * @var string
     */
    public $table = 'hitung_suara_calon';

    /**
     * @var string
     */
//    protected $data = '';

    public $fillable = [
      'kecamatan', 'desa','suara1', 'suara2', 'suara_tidak_sah', 'no_tps','dpt', 'status'
    ];

    protected $casts = [

    ];

    public function calon(): HasOne
    {
      return $this->hasOne(Calon::class, 'id', 'calon_id');
    }

    public function tps(): HasOne
    {
      return $this->hasOne(Tps::class, 'id', 'tps_id');
    }

    public function kecamatan(): BelongsTo
    {
      return $this->belongsTo(Kecamatan::class, 'id', 'kecamatan');
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

    public static function countTps($kecid): int
    {
      $kecid = $kecid ?? null;
      if (null !== $kecid) {
        $tps = self::where('kecamatan', $kecid)->get();
        return (null !== $tps) ? $tps->count() : 0;
      }
      return 0;
    }
  }
