<?php

  namespace App\Models;

  use Illuminate\Contracts\Auth\MustVerifyEmail;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Illuminate\Notifications\Notifiable;
  use Laravolt\Indonesia\Models\Kabupaten;
  use Laravolt\Indonesia\Models\Kecamatan;
  use Laravolt\Indonesia\Models\Kelurahan;
  use Laravolt\Indonesia\Models\Provinsi;
  use Spatie\Permission\Traits\HasRoles;

  /**
 * @mixin IdeHelperUser
 */
  class User extends Authenticatable
  {
    use Notifiable, HasRoles;

    //protected $table = 'pengguna';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'username', 'email', 'password', 'last_login', 'is_superadmin', 'status', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'email_verified_at' => 'datetime',
      'last_login' => 'datetime',
    ];


    public function provinsi()
    {
      return $this->hasOne(Provinsi::class, 'id', 'id');
    }

    public function kabupaten()
    {
      return $this->hasOne(Kabupaten::class,'id','id');
    }

    public function kecamatan()
    {
      return $this->hasOne(Kecamatan::class,'id','id');
    }

    public function kelurahan()
    {
      return $this->hasOne(Kelurahan::class,'id','id');
    }

    public function isSuperadmin($id)
    {
      return self::find($id) ? $this->is_superadmin : false;
    }
  }
