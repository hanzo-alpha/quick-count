<?php

  namespace App\Models;

  use Laravolt\Indonesia\Models\District;

  /**
 * @mixin IdeHelperKecamatan
 */
class Kecamatan extends District
  {

    public function hitung(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(HitungCepat::class, 'kecamatan', 'id');
    }
  }
