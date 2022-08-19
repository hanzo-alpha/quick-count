<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\Calon
 *
 * @property int $id
 * @property int $jenis_calon
 * @property string $nama_calon_1
 * @property string $nama_calon_2
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $status
 * @property-read RefJenisCalon|null $calon
 * @method static Builder|Calon newModelQuery()
 * @method static Builder|Calon newQuery()
 * @method static Builder|Calon query()
 * @method static Builder|Calon whereCreatedAt($value)
 * @method static Builder|Calon whereId($value)
 * @method static Builder|Calon whereJenisCalon($value)
 * @method static Builder|Calon whereNamaCalon1($value)
 * @method static Builder|Calon whereNamaCalon2($value)
 * @method static Builder|Calon whereStatus($value)
 * @method static Builder|Calon whereUpdatedAt($value)
 */
	class IdeHelperCalon {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\HitungCepat
 *
 * @property int $id
 * @property Kecamatan|null $kecamatan
 * @property Kelurahan|null $desa
 * @property int $calon1_id
 * @property int $calon2_id
 * @property string|null $nama_calon1
 * @property string|null $nama_calon2
 * @property int $suara1
 * @property int $suara2
 * @property int $suara_tidak_sah
 * @property int $no_tps
 * @property int|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Calon|null $calon
 * @property-read Tps|null $tps
 * @method static Builder|HitungCepat newModelQuery()
 * @method static Builder|HitungCepat newQuery()
 * @method static Builder|HitungCepat query()
 * @method static Builder|HitungCepat status($status)
 * @method static Builder|HitungCepat tpsBlmMasuk()
 * @method static Builder|HitungCepat tpsMasuk()
 * @method static Builder|HitungCepat whereCalon1Id($value)
 * @method static Builder|HitungCepat whereCalon2Id($value)
 * @method static Builder|HitungCepat whereCreatedAt($value)
 * @method static Builder|HitungCepat whereDesa($value)
 * @method static Builder|HitungCepat whereId($value)
 * @method static Builder|HitungCepat whereKecamatan($value)
 * @method static Builder|HitungCepat whereNamaCalon1($value)
 * @method static Builder|HitungCepat whereNamaCalon2($value)
 * @method static Builder|HitungCepat whereNoTps($value)
 * @method static Builder|HitungCepat whereStatus($value)
 * @method static Builder|HitungCepat whereSuara1($value)
 * @method static Builder|HitungCepat whereSuara2($value)
 * @method static Builder|HitungCepat whereSuaraTidakSah($value)
 * @method static Builder|HitungCepat whereUpdatedAt($value)
 */
	class IdeHelperHitungCepat {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;

    /**
 * App\Models\HitungSuaraCalon
 *
 * @property-read Calon|null $calon
 * @property-read Kecamatan|null $kecamatan
 * @property-read Tps|null $tps
 * @method static Builder|HitungSuaraCalon newModelQuery()
 * @method static Builder|HitungSuaraCalon newQuery()
 * @method static Builder|HitungSuaraCalon query()
 * @method static Builder|HitungSuaraCalon status($status)
 * @method static Builder|HitungSuaraCalon tpsBlmMasuk()
 * @method static Builder|HitungSuaraCalon tpsMasuk()
 */
	class IdeHelperHitungSuaraCalon {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Laravolt\Indonesia\Models\City;
    use Laravolt\Indonesia\Models\Village;

    /**
 * App\Models\Kecamatan
 *
 * @property string $id
 * @property string $code
 * @property string $city_code
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read City $city
 * @property-read mixed $city_name
 * @property-read mixed $province_name
 * @property-read Collection|HitungCepat[] $hitung
 * @property-read int|null $hitung_count
 * @property-read Collection|Village[] $villages
 * @property-read int|null $villages_count
 * @method static Builder|Kecamatan newModelQuery()
 * @method static Builder|Kecamatan newQuery()
 * @method static Builder|Kecamatan query()
 * @method static Builder|Model search($keyword)
 * @method static Builder|Kecamatan whereCityCode($value)
 * @method static Builder|Kecamatan whereCode($value)
 * @method static Builder|Kecamatan whereCreatedAt($value)
 * @method static Builder|Kecamatan whereId($value)
 * @method static Builder|Kecamatan whereMeta($value)
 * @method static Builder|Kecamatan whereName($value)
 * @method static Builder|Kecamatan whereUpdatedAt($value)
 */
	class IdeHelperKecamatan {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Laravolt\Indonesia\Models\District;

    /**
 * App\Models\Kelurahan
 *
 * @property string $id
 * @property string $code
 * @property string $district_code
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read District $district
 * @property-read mixed $city_name
 * @property-read mixed $district_name
 * @property-read mixed $province_name
 * @method static Builder|Kelurahan newModelQuery()
 * @method static Builder|Kelurahan newQuery()
 * @method static Builder|Kelurahan query()
 * @method static Builder|Model search($keyword)
 * @method static Builder|Kelurahan whereCode($value)
 * @method static Builder|Kelurahan whereCreatedAt($value)
 * @method static Builder|Kelurahan whereDistrictCode($value)
 * @method static Builder|Kelurahan whereId($value)
 * @method static Builder|Kelurahan whereMeta($value)
 * @method static Builder|Kelurahan whereName($value)
 * @method static Builder|Kelurahan whereUpdatedAt($value)
 */
	class IdeHelperKelurahan {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Laravolt\Indonesia\Models\District;
    use Laravolt\Indonesia\Models\Province;
    use Laravolt\Indonesia\Models\Village;

    /**
 * App\Models\Kota
 *
 * @property string $id
 * @property string $code
 * @property string $province_code
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read Collection|District[] $districts
 * @property-read int|null $districts_count
 * @property-read mixed $logo_path
 * @property-read mixed $province_name
 * @property-read Province $province
 * @property-read Collection|Village[] $villages
 * @property-read int|null $villages_count
 * @method static Builder|Kota newModelQuery()
 * @method static Builder|Kota newQuery()
 * @method static Builder|Kota query()
 * @method static Builder|Model search($keyword)
 * @method static Builder|Kota whereCode($value)
 * @method static Builder|Kota whereCreatedAt($value)
 * @method static Builder|Kota whereId($value)
 * @method static Builder|Kota whereMeta($value)
 * @method static Builder|Kota whereName($value)
 * @method static Builder|Kota whereProvinceCode($value)
 * @method static Builder|Kota whereUpdatedAt($value)
 */
	class IdeHelperKota {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;

    /**
 * App\Models\Mesin
 *
 * @method static Builder|Mesin newModelQuery()
 * @method static Builder|Mesin newQuery()
 * @method static Builder|Mesin query()
 */
	class IdeHelperMesin {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;

    /**
 * App\Models\Pengaturan
 *
 * @method static Builder|Pengaturan newModelQuery()
 * @method static Builder|Pengaturan newQuery()
 * @method static Builder|Pengaturan query()
 */
	class IdeHelperPengaturan {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Laravolt\Indonesia\Models\City;
    use Laravolt\Indonesia\Models\District;

    /**
 * App\Models\Provinsi
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read Collection|City[] $cities
 * @property-read int|null $cities_count
 * @property-read Collection|District[] $districts
 * @property-read int|null $districts_count
 * @property-read mixed $logo_path
 * @method static Builder|Provinsi newModelQuery()
 * @method static Builder|Provinsi newQuery()
 * @method static Builder|Provinsi query()
 * @method static Builder|Model search($keyword)
 * @method static Builder|Provinsi whereCode($value)
 * @method static Builder|Provinsi whereCreatedAt($value)
 * @method static Builder|Provinsi whereId($value)
 * @method static Builder|Provinsi whereMeta($value)
 * @method static Builder|Provinsi whereName($value)
 * @method static Builder|Provinsi whereUpdatedAt($value)
 */
	class IdeHelperProvinsi {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;

    /**
 * App\Models\RefJenisCalon
 *
 * @property int $id
 * @property string|null $jenis_calon
 * @property-read Calon|null $calon
 * @method static Builder|RefJenisCalon newModelQuery()
 * @method static Builder|RefJenisCalon newQuery()
 * @method static Builder|RefJenisCalon query()
 * @method static Builder|RefJenisCalon whereId($value)
 * @method static Builder|RefJenisCalon whereJenisCalon($value)
 */
	class IdeHelperRefJenisCalon {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\SuaraCalon
 *
 * @property int $id
 * @property int $tps_id
 * @property int $calon_id
 * @property int $user_id
 * @property int $jumlah_suara
 * @property int|null $no_tps
 * @property int $total_suara
 * @property float $persentase_suara
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Calon|null $calon
 * @property-read Tps|null $tps
 * @property-read User|null $user
 * @method static Builder|SuaraCalon newModelQuery()
 * @method static Builder|SuaraCalon newQuery()
 * @method static Builder|SuaraCalon query()
 * @method static Builder|SuaraCalon whereCalonId($value)
 * @method static Builder|SuaraCalon whereCreatedAt($value)
 * @method static Builder|SuaraCalon whereId($value)
 * @method static Builder|SuaraCalon whereJumlahSuara($value)
 * @method static Builder|SuaraCalon whereNoTps($value)
 * @method static Builder|SuaraCalon wherePersentaseSuara($value)
 * @method static Builder|SuaraCalon whereTotalSuara($value)
 * @method static Builder|SuaraCalon whereTpsId($value)
 * @method static Builder|SuaraCalon whereUpdatedAt($value)
 * @method static Builder|SuaraCalon whereUserId($value)
 */
	class IdeHelperSuaraCalon {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\Tps
 *
 * @property int $id
 * @property string $prov_id
 * @property string $kota_id
 * @property string $kec_id
 * @property string $kel_id
 * @property int $user_id
 * @property string $nama_tps
 * @property int $jumlah_tps
 * @property string|null $keterangan
 * @property int|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Kelurahan|null $desa
 * @property-read Kecamatan|null $kecamatan
 * @property-read Kota|null $kota
 * @property-read Provinsi|null $provinsi
 * @property-read User|null $users
 * @method static Builder|Tps newModelQuery()
 * @method static Builder|Tps newQuery()
 * @method static Builder|Tps query()
 * @method static Builder|Tps whereCreatedAt($value)
 * @method static Builder|Tps whereId($value)
 * @method static Builder|Tps whereJumlahTps($value)
 * @method static Builder|Tps whereKecId($value)
 * @method static Builder|Tps whereKelId($value)
 * @method static Builder|Tps whereKeterangan($value)
 * @method static Builder|Tps whereKotaId($value)
 * @method static Builder|Tps whereNamaTps($value)
 * @method static Builder|Tps whereProvId($value)
 * @method static Builder|Tps whereStatus($value)
 * @method static Builder|Tps whereUpdatedAt($value)
 * @method static Builder|Tps whereUserId($value)
 */
	class IdeHelperTps {}
}

namespace App\Models{

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Notifications\DatabaseNotificationCollection;
    use Illuminate\Support\Carbon;
    use Laravolt\Indonesia\Models\Kabupaten;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    /**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $is_superadmin
 * @property Carbon|null $last_login
 * @property int|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Kabupaten|null $kabupaten
 * @property-read \Laravolt\Indonesia\Models\Kecamatan|null $kecamatan
 * @property-read \Laravolt\Indonesia\Models\Kelurahan|null $kelurahan
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Laravolt\Indonesia\Models\Provinsi|null $provinsi
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsSuperadmin($value)
 * @method static Builder|User whereLastLogin($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereStatus($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUsername($value)
 */
	class IdeHelperUser {}
}
