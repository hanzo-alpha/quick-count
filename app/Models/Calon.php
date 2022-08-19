<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @mixin IdeHelperCalon
 */
class Calon extends Model
{
    public $table = 'calon';

  public $fillable = [
    'jenis_calon','nama_calon_1','nama_calon_2','status'
  ];

  public function calon(): BelongsTo
  {
    return $this->belongsTo(RefJenisCalon::class,'jenis_calon','id' );
  }

}
