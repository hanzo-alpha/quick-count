<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperSuaraCalon
 */
class SuaraCalon extends Model
{
  /**
   * @var string
   */
  public $table = 'suara_calon';

  /**
   * @var string
   */
  protected $data = '';

  public $fillable = [
    'tps_id','calon_id','user_id','jumlah_suara','total_suara','persentasi_suara','no_tps'
  ];

  public function calon(): HasOne
  {
    return $this->hasOne(Calon::class,'id','calon_id' );
  }

  public function tps(): HasOne
  {
    return $this->hasOne(Tps::class,'id','tps_id' );
  }

  public function user(): HasOne
  {
    return $this->hasOne(User::class,'id','user_id' );
  }


  public static function getJumlahSuara($id)
  {
    $id = $id ?? null;
    if(null !== $id){
      $jumlah = self::find($id);
      return (null !== $jumlah) ? $jumlah->jumlah_suara : 0;
    }
    return 0;
  }

  public static function getTotalSuara($id)
  {
    $id = $id ?? null;
    if(null !== $id){
      $total = self::find($id);
      return (null !== $total) ? $total->total_suara : 0;
    }
    return 0;
  }

  public static function getPersentaseSuara($id)
  {
    $id = $id ?? null;
    if(null !== $id){
      $persen = self::find($id);
      return (null !== $persen) ? $persen->persentase_suara : 0;
    }
    return 0;
  }

  public static function countTps($tpsId): int
  {
    $tpsId = $tpsId ?? null;
    if(null !== $tpsId){
      $tps = self::where('tps_id',$tpsId)->get();
      return (null !== $tps) ? $tps->count() : 0;
    }
    return 0;
  }
}
