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
/**
 * App\Models\Calon
 *
 * @property int $id
 * @property int $jenis_calon
 * @property string $nama_calon_1
 * @property string $nama_calon_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status
 * @property-read \App\Models\RefJenisCalon|null $calon
 * @method static \Illuminate\Database\Eloquent\Builder|Calon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Calon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Calon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Calon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calon whereJenisCalon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calon whereNamaCalon1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calon whereNamaCalon2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Calon whereUpdatedAt($value)
 */
	class IdeHelperCalon {}
}

namespace App\Models{
/**
 * App\Models\HitungCepat
 *
 * @property int $id
 * @property \App\Models\Kecamatan|null $kecamatan
 * @property \App\Models\Kelurahan|null $desa
 * @property int $calon1_id
 * @property int $calon2_id
 * @property string|null $nama_calon1
 * @property string|null $nama_calon2
 * @property int $suara1
 * @property int $suara2
 * @property int $suara_tidak_sah
 * @property int $no_tps
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Calon|null $calon
 * @property-read \App\Models\Tps|null $tps
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat query()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat status($status)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat tpsBlmMasuk()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat tpsMasuk()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereCalon1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereCalon2Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereDesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereNamaCalon1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereNamaCalon2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereNoTps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereSuara1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereSuara2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereSuaraTidakSah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungCepat whereUpdatedAt($value)
 */
	class IdeHelperHitungCepat {}
}

namespace App\Models{
/**
 * App\Models\HitungSuaraCalon
 *
 * @property-read \App\Models\Calon|null $calon
 * @property-read \App\Models\Kecamatan|null $kecamatan
 * @property-read \App\Models\Tps|null $tps
 * @method static \Illuminate\Database\Eloquent\Builder|HitungSuaraCalon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungSuaraCalon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungSuaraCalon query()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungSuaraCalon status($status)
 * @method static \Illuminate\Database\Eloquent\Builder|HitungSuaraCalon tpsBlmMasuk()
 * @method static \Illuminate\Database\Eloquent\Builder|HitungSuaraCalon tpsMasuk()
 */
	class IdeHelperHitungSuaraCalon {}
}

namespace App\Models{
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
 * @property-read \Laravolt\Indonesia\Models\City $city
 * @property-read mixed $city_name
 * @property-read mixed $province_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\HitungCepat[] $hitung
 * @property-read int|null $hitung_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravolt\Indonesia\Models\Village[] $villages
 * @property-read int|null $villages_count
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model search($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereCityCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kecamatan whereUpdatedAt($value)
 */
	class IdeHelperKecamatan {}
}

namespace App\Models{
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
 * @property-read \Laravolt\Indonesia\Models\District $district
 * @property-read mixed $city_name
 * @property-read mixed $district_name
 * @property-read mixed $province_name
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model search($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereDistrictCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelurahan whereUpdatedAt($value)
 */
	class IdeHelperKelurahan {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravolt\Indonesia\Models\District[] $districts
 * @property-read int|null $districts_count
 * @property-read mixed $logo_path
 * @property-read mixed $province_name
 * @property-read \Laravolt\Indonesia\Models\Province $province
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravolt\Indonesia\Models\Village[] $villages
 * @property-read int|null $villages_count
 * @method static \Illuminate\Database\Eloquent\Builder|Kota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kota query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model search($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Kota whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kota whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kota whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kota whereProvinceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kota whereUpdatedAt($value)
 */
	class IdeHelperKota {}
}

namespace App\Models{
/**
 * App\Models\Mesin
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mesin query()
 */
	class IdeHelperMesin {}
}

namespace App\Models{
/**
 * App\Models\Pengaturan
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Pengaturan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengaturan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengaturan query()
 */
	class IdeHelperPengaturan {}
}

namespace App\Models{
/**
 * App\Models\Provinsi
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property array|null $meta
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravolt\Indonesia\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravolt\Indonesia\Models\District[] $districts
 * @property-read int|null $districts_count
 * @property-read mixed $logo_path
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model search($keyword)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provinsi whereUpdatedAt($value)
 */
	class IdeHelperProvinsi {}
}

namespace App\Models{
/**
 * App\Models\RefJenisCalon
 *
 * @property int $id
 * @property string|null $jenis_calon
 * @property-read \App\Models\Calon|null $calon
 * @method static \Illuminate\Database\Eloquent\Builder|RefJenisCalon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefJenisCalon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefJenisCalon query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefJenisCalon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefJenisCalon whereJenisCalon($value)
 */
	class IdeHelperRefJenisCalon {}
}

namespace App\Models{
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Calon|null $calon
 * @property-read \App\Models\Tps|null $tps
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon query()
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereCalonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereJumlahSuara($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereNoTps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon wherePersentaseSuara($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereTotalSuara($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereTpsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SuaraCalon whereUserId($value)
 */
	class IdeHelperSuaraCalon {}
}

namespace App\Models{
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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kelurahan|null $desa
 * @property-read \App\Models\Kecamatan|null $kecamatan
 * @property-read \App\Models\Kota|null $kota
 * @property-read \App\Models\Provinsi|null $provinsi
 * @property-read \App\Models\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder|Tps newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tps newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tps query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereJumlahTps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereKecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereKelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereKotaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereNamaTps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereProvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tps whereUserId($value)
 */
	class IdeHelperTps {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $is_superadmin
 * @property \Illuminate\Support\Carbon|null $last_login
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Laravolt\Indonesia\Models\Kabupaten|null $kabupaten
 * @property-read \Laravolt\Indonesia\Models\Kecamatan|null $kecamatan
 * @property-read \Laravolt\Indonesia\Models\Kelurahan|null $kelurahan
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Laravolt\Indonesia\Models\Provinsi|null $provinsi
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsSuperadmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class IdeHelperUser {}
}

