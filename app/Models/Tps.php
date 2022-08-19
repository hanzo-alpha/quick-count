<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperTps
 */
class Tps extends Model
{
    /**
     * @var string
     */
    public $table = 'tps';

    /**
     * @var string
     */
    protected $data = '';

    public $fillable = [
        'prov_id', 'kota_id', 'kec_id', 'kel_id', 'user_id', 'nama_tps', 'jumlah_tps', 'keterangan', 'status'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class,'prov_id','id');
    }

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class,'kota_id','id');
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class,'kec_id','id');
    }

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class,'kel_id','id');
    }
}
