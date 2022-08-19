<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Database\Eloquent\Relations\BelongsTo;
  use Illuminate\Database\Eloquent\Relations\HasOne;

  /**
 * @mixin IdeHelperRefJenisCalon
 */
  class RefJenisCalon extends Model
  {
    /**
     * @var string
     */
    public $table = 'ref_jenis_calon';

    /**
     * @var string
     */
    protected $data = '';

    public $fillable = [
      'jenis_calon','nama_calon_1','nama_calon_2','status'
    ];

    public function calon(): HasOne
    {
      return $this->hasOne(Calon::class,'id','jenis_calon' );
    }

    public static function getJenisCalonName($id)
    {
      $id = $id ?? null;
      if(null !== $id){
        $jenis = self::find($id);
        return $jenis->jenis_calon ?? null;
      }
      return null;
    }
  }
