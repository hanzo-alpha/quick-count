<?php
/**
 * Created by PhpStorm.
 * User: hansenmakangiras
 * Date: 21/10/18
 * Time: 12.00
 */

namespace App\Helpers;

use ArrayAccess;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateInterval;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
//use Spatie\Activitylog\Models\Activity;

/*
 *  Fungsi untuk memberi class active pada sidebar menu
*/
if (!function_exists('set_active')) {
    function set_active($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } elseif (Route::is($uri)) {
            return $output;
        }
    }
}

/*
 *  Fungsi untuk menambah class show pada sidebar menu
*/
if (!function_exists('set_show')) {
    function set_show($uri, $output = 'show')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } elseif (Route::is($uri)) {
            return $output;
        }
    }
}

/*
 *  Return status superadmin user
*/
if (!function_exists('isSuperadmin')) {
    function isSuperadmin()
    {
        return auth()->user()->is_superadmin;
    }
}

/*
 *  Return status verifikator user
*/
if (!function_exists('isVerifikator')) {
    function isVerifikator()
    {
        return auth()->user()->is_verifikator;
    }
}

/*
* Form::selectOpt()
*
* Parameters:
*   $collection    A I\S\Collection instance
*   $name          The HTML "name"
*   $groupBy       Field by which options are grouped
*   $labelBy       Field to use as an option label  (default="name")
*   $valueBy       Field to use as option's value (default="id")
*   $value         Value of selected item or items
*   $attributes    An array of additional HTML attributes
*/
if (!function_exists('renderSelectOpt')) {
    function renderSelectOpt(): void
    {
        Form::macro('selectOpt', static function (
            ArrayAccess $collection,
            $name,
            $groupBy,
            $labelBy = 'name',
            $valueBy
            = 'id',
            $value = null,
            $attributes = []
        ) {
            $select_optgroup_arr = [];
            foreach ($collection as $item) {
                $select_optgroup_arr[$item->$groupBy][$item->$valueBy] = $item->$labelBy;
            }
            return Form::select($name, $select_optgroup_arr, $value, $attributes);
        });
    }
}

/*
* Form::selectOptMulti()
*
* A shortcut for Form::selectOpt with multiple selection
*/
if (!function_exists('selectOptMulti')) {
    function selectOptMulti()
    {
        Form::macro('selectOptMulti',
            function (ArrayAccess $collection, $name, $groupBy, $labelBy = 'name', $valueBy = 'id', $value = null, $attributes = []) {
                $attributes = array_merge($attributes, ['multiple' => true]);
                return Form::selectOpt($collection, $name, $groupBy, $labelBy, $valueBy, $value, $attributes);
            });
    }
}

if (!function_exists('url_foto_pegawai')) {
    function url_foto_pegawai($filename, $thumb = false, $check = true)
    {
        $path = 'uploads/pegawai/';
        $no_path = !$thumb ? 'assets/img/nophoto-large.jpg' : 'assets/img/nophoto-small.jpg';
        if (empty($filename)) {
            return env('SIMPEG_URL_FOTO').$no_path;
        }
        if ($thumb) {
            $path .= 'thumbs/';
        }
        $path .= $filename;
        if ($check) {
            return file_exists('./'.$path) ? file_get_contents(env('SIMPEG_URL_FOTO').$path) : env('SIMPEG_URL_FOTO').$no_path;
        } else {
            return env('SIMPEG_URL_FOTO').$path;
        }
    }
}

if (!function_exists('url_foto_user')) {
    function url_foto_user($filename, $thumb = false, $check = true): false|string
    {
        $path = 'uploads/userphoto/';
        $no_path = !$thumb ? 'assets/img/nophoto-large.jpg' : 'assets/img/nophoto-small.jpg';
        if (empty($filename)) {
            return env('SIMPEG_PEGAWAI_FOTO').$no_path;
        }
        if ($thumb) {
            $path .= 'thumbs/';
        }
        $path .= $filename;
        if ($check) {
            return file_exists('./'.$path) ? file_get_contents(env('SIMPEG_URL_FOTO').$path) : env('SIMPEG_URL_FOTO').$no_path;
        }

        return env('SIMPEG_PEGAWAI_FOTO').$path;
    }
}

if (!function_exists('get_namapangkat')) {
    function get_namapangkat($golruang, $default = '')
    {
        $gol_pkt = [
            'I/a' => 'Juru Muda',
            'I/b' => 'Juru Muda Tingkat I',
            'I/c' => 'Juru',
            'I/d' => 'Juru Tingkat I',
            'II/a' => 'Pengatur Muda',
            'II/b' => 'Pengatur Muda Tingkat I',
            'II/c' => 'Pengatur',
            'II/d' => 'Pengatur Tingkat I',
            'III/a' => 'Penata Muda',
            'III/b' => 'Penata Muda Tingkat I',
            'III/c' => 'Penata',
            'III/d' => 'Penata Tingkat I',
            'IV/a' => 'Pembina',
            'IV/b' => 'Pembina Tingkat I',
            'IV/c' => 'Pembina Utama Muda',
            'IV/d' => 'Pembina Utama Madya',
            'IV/e' => 'Pembina Utama',
        ];
        return $gol_pkt[$golruang] ?? $default;
    }
}

if (!function_exists('kekata')) {
    function kekata($x)
    {
        $x = abs($x);
        $angka = [
            '', 'satu', 'dua', 'tiga', 'empat', 'lima',
            'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas',
        ];
        $temp = '';
        if ($x < 12) {
            $temp = ' '.$angka[$x];
        } else {
            if ($x < 20) {
                $temp = kekata($x - 10).' belas';
            } else {
                if ($x < 100) {
                    $temp = kekata($x / 10).' puluh'.kekata($x % 10);
                } else {
                    if ($x < 200) {
                        $temp = ' seratus'.kekata($x - 100);
                    } else {
                        if ($x < 1000) {
                            $temp = kekata($x / 100).' ratus'.kekata($x % 100);
                        } else {
                            if ($x < 2000) {
                                $temp = ' seribu'.kekata($x - 1000);
                            } else {
                                if ($x < 1000000) {
                                    $temp = kekata($x / 1000).' ribu'.kekata($x % 1000);
                                } else {
                                    if ($x < 1000000000) {
                                        $temp = kekata($x / 1000000).' juta'.kekata($x % 1000000);
                                    } else {
                                        if ($x < 1000000000000) {
                                            $temp = kekata($x / 1000000000).' milyar'.kekata(fmod($x, 1000000000));
                                        } else {
                                            if ($x < 1000000000000000) {
                                                $temp = kekata($x / 1000000000000).' trilyun'.kekata(fmod($x, 1000000000000));
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $temp;
    }

}

if (!function_exists('terbilang')) {
    function terbilang($x, $style = 4): string
    {
        if ($x < 0) {
            $hasil = 'minus '.trim(kekata($x));
        } else {
            $hasil = trim(kekata($x));
        }
        return match ($style) {
            1 => strtoupper($hasil),
            2 => strtolower($hasil),
            3 => ucwords($hasil),
            default => ucfirst($hasil),
        };
    }
}

if (!function_exists('ucname')) {
    function ucname($str): string
    {
        $string = ucwords(strtolower($str));
        foreach (['-', '\'', '.'] as $delimiter) {
            if (str_contains($string, $delimiter)) {
                $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
            }
        }
        return $string;
    }
}

if (!function_exists('list_ya_tidak')) {
    function list_ya_tidak($first_empty = false): array
    {
        $arr = ['Y' => 'Ya', 'N' => 'Tidak'];
        return ($first_empty === false) ? $arr : ['' => $first_empty] + $arr;
    }
}

if (!function_exists('list_jam_hadir')) {
    function list_jam_hadir($first_empty = false, $tipe_rumpun = 'A'): array
    {
        $pembagi = ($tipe_rumpun === 'B') ? 6.0 : 5.0;
        $arr = [];
        for ($i = 0; $i <= $pembagi; $i += 0.5) {
            $arr[(string) $i] = str_replace('.', ',', $i);
        }
        return ($first_empty === false) ? $arr : ['' => $first_empty] + $arr;
    }
}

if (!function_exists('hours_between')) {
    function hours_between($datetime1, $datetime2): float
    {
        $datetime1 = strtotime($datetime1);
        $datetime2 = strtotime($datetime2);
        $interval = abs($datetime2 - $datetime1);
        return round($interval / 60 / 60);
    }
}

if (!function_exists('last_tanggal_kerja')) {
    /** tanggal kerja terakhir dihitung dari $batas ke belakang */
    function last_tanggal_kerja($batas = null)
    {
        if (!$batas) {
            $batas = date('Y-m-d');
        }
        static $cache = [];
        $cache_idx = $batas;
        if (!isset($cache[$cache_idx])) {
            $cache[$cache_idx] = false;
            $inc = 7;
            do {
                $dari = date('Y-m-d', strtotime("{$batas} -{$inc} days"));
                $tgl_kerja = range_tanggal_kerja($dari, $batas);
                if (count($tgl_kerja) > 0) {
                    $idx = count($tgl_kerja) - 1;
                    $cache[$cache_idx] = $tgl_kerja[$idx];
                }
                $inc += 7;
                $batas = $dari;
            } while ($cache[$cache_idx] === false);
        }
        return $cache[$cache_idx];
    }
}

if (!function_exists('add_nol')) {
    function add_nol($str, $jumnol = 2)
    {
        if (strlen($str) > $jumnol) {
            return $str;
        }

        $res = '';
        $n = $jumnol - strlen($str);
//            $res .= repeater('0', $n);
        $res .= str_repeat('0', $n);
        return $res.$str;
    }
}

if (!function_exists('list_tanggal_kerja')) {
    function list_tanggal_kerja($jumlah, $batas = null): array
    {
        if (!$batas) {
            $batas = date('Y-m-d');
        }
        $cache_idx = $jumlah.'-'.$batas;
        static $cache = [];
        if (!isset($cache[$cache_idx])) {
            $jumlah_ex = $jumlah + (floor($jumlah / 7) * 2);
            $dari = date('Y-m-d', strtotime("{$batas} -{$jumlah_ex} days"));
            $cache[$cache_idx] = range_tanggal_kerja($dari, $batas);
            $inc = 1;
            while (count($cache[$cache_idx]) < $jumlah) {
                $batas_tk = date('Y-m-d', strtotime("{$dari} -{$inc} days"));
                $last_tk = last_tanggal_kerja($batas_tk);
                array_unshift($cache[$cache_idx], $last_tk);
                $inc++;
            }
        }
        $cache[$cache_idx] = array_unique($cache[$cache_idx]);
        return $cache[$cache_idx];
    }
}

if (!function_exists('range_tanggal_kerja')) {
    function range_tanggal_kerja($dari, $sampai = null, $harikerja6 = false)
    {
        $dari = $dari instanceof Date ? Date::parse($dari)->format('Y-m-d') : $dari;
        if (!$sampai) {
            $sampai = $sampai instanceof Date ? Jenssegers\Date\Date::today()->format('Y-m-d') : date('Y-m-d');
        }
        $cache_idx = $dari.'-'.$sampai;
        static $cache = [];
        if (!isset($cache[$cache_idx])) {
            $libur = list_tanggal_libur($dari, $sampai);
            $range = date_range($dari, $sampai);
            $cache[$cache_idx] = [];
            foreach ($range as $ymd) {
                $d = date('N', strtotime($ymd));
                if (!$harikerja6 && ($d === '7' || $d === '6')) {
                    continue;
                }

                if ($harikerja6 && $d === '7') {
                    continue;
                } // hari minggu & sabtu // hari minggu
                if (in_array($ymd, $libur, true)) {
                    continue;
                }
                $cache[$cache_idx][] = $ymd;
            }
        }
        return $cache[$cache_idx];
    }
}

if (!function_exists('list_tanggal_libur')) {
    function list_tanggal_libur($dari, $sampai = null)
    {
        if (!$sampai) {
            $sampai = date('Y-m-d');
        }
        $cache_idx = $dari.'-'.$sampai;
        static $cache = [];
        if (!isset($cache[$cache_idx])) {
            $qw = DB::table('hari_libur')->select('tanggal')
                ->whereDate('tanggal', '>=', $dari)
                ->whereDate('tanggal', '<=', $sampai)
                ->groupBy('tanggal')->get('hari_libur');
            $cache[$cache_idx] = [];
            foreach ($qw as $row) {
                $cache[$cache_idx][] = $row->tanggal;
            }
        }
        return $cache[$cache_idx];
    }

}

if (!function_exists('list_absen')) {
    function list_absen($singkat = false, $first_empty = false): array
    {
        if ($singkat) {
            $arr = [1 => 'H', 2 => 'I', 3 => 'S', 4 => 'C', 5 => 'D', 6 => 'TK'];
        } else {
            $arr = [1 => 'Hadir', 2 => 'Izin', 3 => 'Sakit', 4 => 'Cuti', 5 => 'Dinas', 6 => 'TK'];
        }
        return ($first_empty === false) ? $arr : ['' => $first_empty] + $arr;
    }

}

if (!function_exists('ribuan')) {
    function ribuan($num = 0, $decimal = 'auto 2'): array|string
    {
        if (empty($num)) {
            return '0';
        }
        $auto = false;
        if (str_starts_with($decimal, 'auto')) {
            [, $decimal] = explode(' ', $decimal);
            $auto = true;
        }
        $num = number_format($num, $decimal, ',', '.');
        if ($auto) {
            $num = str_replace(',00', '', $num);
        }
        return $num;
    }
}

if (!function_exists('format_angka')) {
    function format_angka($angka, $empty_val = '0')
    {
        $angka = ribuan($angka);
        return empty($angka) ? $empty_val : $angka;
    }
}

if (!function_exists('hitung_ketepatan_laporan')) {
    function hitung_ketepatan_laporan($tipe, $nilai_tpp): float
    {
        $tipe = (int) $tipe ?: 3;

        if ($tipe === 1) {
            $nilai_tpp = 0;
//                $nilai_tpp = round((double) $nilai_tpp * (settings('ekn_tepat_lapor') / 100), 2);
        } elseif ($tipe === 2) {
            $nilai_tpp = round((double) $nilai_tpp * (settings('ekn_telat_lapor') / 100), 2);
        } elseif ($nilai_tpp > 0) {
            --$nilai_tpp;
        }

        return (double) $nilai_tpp;
    }
}

if (!function_exists('hitung_nilaitpp')) {
    function hitung_nilaitpp($tpp_maks, $nilai_kinerja, $jumharikerja): float|int
    {
        $hasil = 0;
        if (!isset($tpp_maks)) {
            return 0;
        }
        if (!isset($nilai_kinerja)) {
            return 0;
        }
        if (!isset($jumharikerja)) {
            return 0;
        }
        if (isset($tpp_maks, $nilai_kinerja, $jumharikerja)) {
            $tpp_kinerja = $tpp_maks * (settings('ekn_tppmaks_kinerja') / 100);
            $hasil = round(($tpp_kinerja * ($nilai_kinerja / 100)) / $jumharikerja, 2);
        }
        return $hasil;
    }
}

if (!function_exists('hitung_persen_kinerja')) {
    function hitung_persen_kinerja($total_satuan, $jum_keg): float|int
    {
        $hasil = 0;
        if (!isset($total_satuan)) {
            return 0;
        }
        if (!isset($jum_keg)) {
            return 0;
        }

        if ($total_satuan > 0 && $jum_keg > 0) {
            $hasil = round($total_satuan / $jum_keg, 2);
        }

        return $hasil;
    }
}

if (!function_exists('hitung_satuan_tugas')) {
    function hitung_satuan_tugas($bobot, $capaian): float|int
    {
        $hasil = 0;
        $persen = 100;
        if (!isset($bobot)) {
            return 0;
        }

        if (!isset($capaian)) {
            return 0;
        }

        if (isset($bobot, $capaian) && $bobot !== 0 && $capaian !== 0) {
            if ($capaian > $bobot) {
                $hasil = round(100, 2);
            } else {
                $hasil = round(($capaian * $persen) / $bobot, 2);
            }
        }

        return $hasil;
    }
}

if (!function_exists('hitung_tpp_disiplin')) {
    function hitung_tpp_disiplin($tppmaks): float|int
    {
        $hasil = 0;
        if (!isset($tppmaks)) {
            return 0;
        }

        if ($tppmaks > 0) {
            $hasil = round(((float) $tppmaks * (settings()->get('ekn_tppmaks_disiplin') / 100)) / settings()->get('ekn_hari_kerja'), 2);
        }
        return $hasil;
    }
}

if (!function_exists('hitung_tpp_apel')) {
    function hitung_tpp_apel($tppdisiplin): float|int
    {
        $hasil = 0;
        $persen = 30 / 100;
        if (!isset($tppdisiplin)) {
            return 0;
        }

        if ($tppdisiplin !== 0) {
            $hasil = round($tppdisiplin * $persen, 2);
        }
        return $hasil;
    }
}

if (!function_exists('hitung_tpp_jamkerja')) {
    function hitung_tpp_jamkerja($tppdisiplin): float|int
    {
        $hasil = 0;
        $persen = 70 / 100;
        if (!isset($tppdisiplin)) {
            return 0;
        }

        if ($tppdisiplin !== 0) {
            $hasil = round($tppdisiplin * $persen, 2);
        }
        return $hasil;
    }
}

if (!function_exists('hitung_nilai_apel')) {
    function hitung_nilai_apel($tppapel): float|int
    {
        $hasil = 0;
        if (!isset($tppapel)) {
            return 0;
        }

        if ($tppapel > 0) {
            $hasil = round($tppapel / 2, 2);
        }
        return $hasil;
    }
}

if (!function_exists('hitung_nilai_jamker')) {
    function hitung_nilai_jamker($tppjamker, $persentase): float|int
    {
        $hasil = 0;
        $persentase = (float) $persentase ?: 0;
        if (!isset($tppjamker)) {
            return 0;
        }

        if ($tppjamker > 0) {
            $hasil = round($tppjamker * ($persentase / 100), 2);
        }
        return $hasil;
    }
}

if (!function_exists('hitung_nilai_disiplin')) {
    function hitung_nilai_disiplin($tppapel, $tppjamker, $persentase): float|int
    {
        $apel = hitung_nilai_apel($tppapel);
        $jamker = hitung_nilai_jamker($tppjamker, $persentase);
        $hasil = round($apel + $jamker, 2);
        return $hasil ?: 0;
    }
}

if (!function_exists('nama_hari')) {
    function nama_hari($tanggal = ''): string
    {
        if ($tanggal === '') {
            $tanggal = date('Y-m-d H:i:s');
            $ind = date('w', strtotime($tanggal));
        } elseif (strlen($tanggal) < 2) {
            $ind = $tanggal - 1;
        } else {
            $ind = date('w', strtotime($tanggal));
        }
        $arr_hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        return $arr_hari[$ind];
    }
}

if (!function_exists('list_bulan')) {
    function list_bulan($short = false): array
    {
        if ($short) {
            $bln = [
                '1' => 'Jan',
                '2' => 'Feb',
                '3' => 'Mar',
                '4' => 'Apr',
                '5' => 'Mei',
                '6' => 'Jun',
                '7' => 'Jul',
                '8' => 'Agu',
                '9' => 'Sep',
                '10' => 'Okt',
                '11' => 'Nov',
                '12' => 'Des',
            ];
        } else {
            $bln = [
                '1' => 'Januari',
                '2' => 'Februari',
                '3' => 'Maret',
                '4' => 'April',
                '5' => 'Mei',
                '6' => 'Juni',
                '7' => 'Juli',
                '8' => 'Agustus',
                '9' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
            ];
        }
        return $bln;
    }
}

if (!function_exists('nama_bulan')) {
    function nama_bulan($tanggal = '', $short = false): string
    {
        if ($tanggal === '' || $tanggal === 'now') {
            $tanggal = date('Y-m-d H:i:s');
            $ind = date('m', strtotime($tanggal));
        } elseif (strlen($tanggal) < 3) {
            $ind = $tanggal;
        } else {
            $ind = date('m', strtotime($tanggal));
        }
        --$ind;
        if ($short) {
            $arr_bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        } else {
            $arr_bulan = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
            ];
        }
        return $arr_bulan[$ind];
    }
}

if (!function_exists('index_nama_bulan')) {
    function index_nama_bulan($nama_bulan = '', $short = false): bool|int|string
    {
        $list_bulan = list_bulan($short);
        return array_search($nama_bulan, $list_bulan, null);
    }
}

if (!function_exists('tanggal')) {
    function tanggal($tanggal = 'now', $short_month = false, $empty_val = '')
    {
        $null = ['', '0000-00-00', '0000-00-00 00:00:00', '1970-01-01', null];
        if (in_array($tanggal, $null, true)) {
            return $empty_val;
        }
        if ($tanggal === 'now') {
            $tanggal = date('Y-m-d H:i:s');
        }
        $tgl = date('j', strtotime($tanggal));
        $thn = date('Y', strtotime($tanggal));
        $bln = nama_bulan($tanggal, $short_month);
        return $tgl.' '.$bln.' '.$thn;
    }
}

if (!function_exists('tanggal_jam')) {
    function tanggal_jam($tanggal = '', $sep = ' - '): string
    {
        if ($tanggal === '') {
            $tanggal = date('Y-m-d H:i:s');
        }
        return tanggal($tanggal).$sep.date('H:i', strtotime($tanggal));
    }
}

if (!function_exists('day_date')) {
    function day_date($tanggal = '')
    {
        Date::setLocale('id');
        if ($tanggal === '') {
//                $tanggal = Date::now()->format('l, j F Y H:i:s');
            $tanggal = Date::now()->format('l, j F Y');
        }
        return $tanggal;
    }
}

if (!function_exists('localeDate')) {
    function localeDate($date, $format)
    {
        Date::setLocale(config('app.locale'));
        return Date::createFromFormat('Y-m-d H:i:s', $date->format('Y-m-d H:i:s'))->format($format);
    }
}

if (!function_exists('hari_tanggal')) {
    function hari_tanggal($tanggal = ''): string
    {
        Date::setLocale('id');
        if ($tanggal === '') {
//                $tanggal = date('Y-m-d H:i:s');
            $tanggal = Date::now()->timezone(config('app.timezone'))->format('Y-m-d H:i:s');
        }
        $tgl = date('d', strtotime($tanggal));
        $thn = date('Y', strtotime($tanggal));
        $hari = nama_hari($tanggal);
        $tgl = (int) $tgl;
        $bln = nama_bulan($tanggal);
        return $hari.', '.$tgl.' '.$bln.' '.$thn;
    }
}

if (!function_exists('hari_tanggal_jam')) {
    function hari_tanggal_jam($tanggal = '', $sep = ' pukul '): string
    {
        if ($tanggal === '') {
            $tanggal = date('Y-m-d H:i:s');
        }
        return hari_tanggal($tanggal).$sep.date('H:i', strtotime($tanggal));
    }
}

if (!function_exists('selisih_waktu')) {
    function selisih_waktu($awal, $akhir): float
    {
        $awal = isset($awal) ? strtotime($awal) : strtotime(now());
        $akhir = isset($akhir) ? strtotime($akhir) : strtotime(now() + 1);
        $diff = $akhir - $awal;

//            $jam = $diff / (60 * 60);
        $jam = floor($diff / (60 * 60));
        $menit = $diff - $jam * (60 * 60);

        return $jam;
    }
}


if (!function_exists('ddmmy')) {
    function ddmmy($tanggal = 'now', $sep = '/', $full_year = true): string
    {
        if ($tanggal === null || $tanggal === '0000-00-00') {
            return '';
        }
        if ($tanggal === 'now') {
            $tanggal = date('Y-m-d');
        }
        $tanggal = strtotime($tanggal);
        $y_format = $full_year ? 'Y' : 'y';
        return date('d'.$sep.'m'.$sep.$y_format, $tanggal);
    }
}

function dmyhi($tanggal = 'now', $sep = '/', $full_year = true): string
{
    if ($tanggal === null || $tanggal === '0000-00-00') {
        return '';
    }
    if ($tanggal === 'now') {
        $tanggal = date('Y-m-d H:i:s');
    }
    $tanggal = strtotime($tanggal);
    $y_format = $full_year ? 'Y' : 'y';
    return date('d'.$sep.'m'.$sep.$y_format.' H:i', $tanggal);
}

if (!function_exists('ymdhis')) {
    function ymdhis($tanggal = '', $sep = '/', $inc_time = true): string
    {
        if ($tanggal === '') {
            return date('Y-m-d H:i:s');
        }

        [$date, $time] = array_pad(explode(' ', $tanggal), 2, date('H:i'));
        $pecah = explode($sep, $date);
        $d = add_nol($pecah[0], 2);
        $m = add_nol($pecah[1], 2);
        $y = $pecah[2];
        $ret = $y.'-'.$m.'-'.$d;
        if ($inc_time) {
            $ret .= ' '.$time.':00';
        }
        return $ret;
    }
}

/**
 * Menghitung umur berdasar tgl lahir
 *
 * @param  date  $tgl_lahir  Y-m-d
 * @param  string [x|y|m|d|obj]
 * x = (int) tahun
 * y = 25 Tahun
 * m = 25 Tahun 3 Bulan
 * d = 25 Tahun 3 Bulan 12 hari
 * obj = obj(y, m, d, h, i ,s)
 * @return int/string/obj umur
 */
if (!function_exists('get_umur')) {
    function get_umur($tgl_lahir, $return_type = 'x')
    {
        $from = new DateTime($tgl_lahir);
        $to = new DateTime('today');
        $obj = $from->diff($to);
        $x_tahun = "{$obj->y} Tahun";
        $x_bulan = $obj->m > 0 ? " {$obj->m} Bulan" : '';
        $x_hari = $obj->d > 0 ? " {$obj->d} Hari" : '';
        return match (strtolower($return_type)) {
            'y' => $x_tahun,
            'm' => $x_tahun.$x_bulan,
            'd' => $x_tahun.$x_bulan.$x_hari,
            'obj' => $obj,
            default => $obj->y,
        };
    }
}

if (!function_exists('xtime')) {
    function xtime($ymdhis = ''): string
    {
        if (!$ymdhis || $ymdhis === '0000-00-00 00:00:00') {
            return '';
        }
        $ago = strtotime($ymdhis);
        $now = time();
        $tgl = date('j', $ago);
        $nama_hari = nama_hari($ymdhis);
        $nama_bulan = nama_bulan($ymdhis);
        $pukul = date('H:i', $ago);
        $seldetik = abs(floor($now - $ago));
        $selmenit = abs(round($seldetik / 60));
        $seljam = abs(round($seldetik / 3600));
        if ($seldetik < 50) {
            return $seldetik.' detik yang lalu';
        }

        if ($selmenit < 50) {
            return $selmenit.' menit yang lalu';
        }

        if ($seljam < 4) {
            return $seljam.' jam yang lalu';
        }

        if ($seljam < 24) {
            return 'Hari ini pukul '.$pukul;
        }

        if ($seljam < 48) {
            return 'Kemarin pukul '.$pukul;
        }

        if (date('W', $ago) === date('W', $now)) {
            return $nama_hari.' '.$pukul;
        }

        if (date('Y', $ago) === date('Y', $now)) {
            return $tgl.' '.$nama_bulan.' '.$pukul;
        }

        return tanggal_jam($ymdhis);
    }
}

/**
 * Determines if the current version of PHP is equal to or greater than the supplied value
 *
 * @param  string
 * @return    bool    TRUE if the current version is $version or higher
 */
if (!function_exists('is_php')) {
    function is_php($version)
    {
        static $_is_php;
        $version = (string) $version;

        if (!isset($_is_php[$version])) {
            $_is_php[$version] = version_compare(PHP_VERSION, $version, '>=');
        }

        return $_is_php[$version];
    }
}

function date_range($unix_start = '', $mixed = '', $is_unix = true, $format = 'Y-m-d'): bool|array
{
    if ($unix_start === '' || $mixed === '' || $format === '') {
        return false;
    }

    $is_unix = !(!$is_unix || $is_unix === 'days');

    if ((!ctype_digit((string) $unix_start) && ($unix_start = @strtotime($unix_start)) === false)
        || (!ctype_digit((string) $mixed) && ($is_unix === false || ($mixed = @strtotime($mixed)) === false))
        || ($is_unix === true && $mixed < $unix_start)) {
        return false;
    }

    if ($is_unix && ($unix_start === $mixed || date($format, $unix_start) === date($format, $mixed))) {
        return [date($format, $unix_start)];
    }

    $range = [];
    $from = new DateTime();

    if (is_php('5.3')) {
        $from->setTimestamp($unix_start);
        if ($is_unix) {
            $arg = new DateTime();
            $arg->setTimestamp($mixed);
        } else {
            $arg = (int) $mixed;
        }

        $period = new DatePeriod($from, new DateInterval('P1D'), $arg);
        foreach ($period as $date) {
            $range[] = $date->format($format);
        }

        if (!is_int($arg) && $range[count($range) - 1] !== $arg->format($format)) {
            $range[] = $arg->format($format);
        }

        return $range;
    }

    $from->setDate(date('Y', $unix_start), date('n', $unix_start), date('j', $unix_start));
    $from->setTime(date('G', $unix_start), date('i', $unix_start), date('s', $unix_start));
    if ($is_unix) {
        $arg = new DateTime();
        $arg->setDate(date('Y', $mixed), date('n', $mixed), date('j', $mixed));
        $arg->setTime(date('G', $mixed), date('i', $mixed), date('s', $mixed));
    } else {
        $arg = (int) $mixed;
    }
    $range[] = $from->format($format);

    if (is_int($arg)) // Day intervals
    {
        do {
            $from->modify('+1 day');
            $range[] = $from->format($format);
        } while (--$arg > 0);
    } else // end date UNIX timestamp
    {
        for ($from->modify('+1 day'), $end_check = $arg->format('Ymd'); $from->format('Ymd') < $end_check; $from->modify('+1 day')) {
            $range[] = $from->format($format);
        }

        $range[] = $arg->format($format);
    }

    return $range;
}

if (!function_exists('list_tanggal')) {
    function list_tanggal(): array
    {
        $day = [];
        for ($i = 1; $i <= 31; $i++) {
            $day[$i] = $i;
        }
        return $day;
    }
}

if (!function_exists('list_tipe_rumpun')) {
    function list_tipe_rumpun($char_only = true, $first_empty = false): array
    {
        $arr = ['A' => 'A', 'B' => 'B'];
        if (!$char_only) {
            $arr = [
                'A' => '<b>A</b>&nbsp;&nbsp;<em class="text-muted">(5 hari kerja)</em>',
                'B' => '<b>B</b>&nbsp;&nbsp;<em class="text-muted">(6 hari kerja)</em>',
            ];
        }
        return ($first_empty === false) ? $arr : ['' => $first_empty] + $arr;
    }
}

if (!function_exists('list_jk')) {
    function list_jk()
    {
        return ['L' => 'Laki-Laki', 'P' => 'Perempuan'];

    }
}

if (!function_exists('to_persen')) {
    function to_persen($jumlah, $total)
    {
        if (!isset($jumlah, $total)) {
            return 0;
        }
        return round(($jumlah / $total) * 100, 2).' %';

    }
}

if (!function_exists('selisih_jam')) {
    function selisih_jam($jam_masuk, $jam_keluar)
    {
        [$h, $m, $s] = explode(':', $jam_masuk);
        $dtAwal = mktime($h, $m, $s, '1', '1', '1');
        [$h, $m, $s] = explode(':', $jam_keluar);
        $dtAkhir = mktime($h, $m, $s, '1', '1', '1');
        $dtSelisih = $dtAkhir - $dtAwal;
        $totalmenit = $dtSelisih / 60;
        $jam = explode('.', $totalmenit / 60);
        $sisamenit = ($totalmenit / 60) - $jam[0];
        $sisamenit2 = $sisamenit * 60;
        $jml_jam = $jam[0];
        return $jml_jam.' jam '.$sisamenit2.' menit';
    }
}

if (!function_exists('hitung_selisih_waktulapor')) {
    function hitung_selisih_waktulapor($tgl_lapor, $status_lapor)
    {
        $tgl_lapor = $tgl_lapor instanceof Date;
        $status_lapor = $status_lapor ?: 0;
        $tipe = 3;
        // Hitung selisih waktu pelaporan kegiatan
        $settingWaktuLapor = settings('ekn_jamawal_lapor');
        $slice = explode(':', $settingWaktuLapor);

        $now = Date::now()->timezone(config('app.timezone'))->toDateTime();
        $start = Date::today()->timezone(config('app.timezone'))->setTimeFromTimeString($settingWaktuLapor);
        $akhir = Date::today()->timezone(config('app.timezone'))->setTimeFromTimeString($settingWaktuLapor)->addDay();

        $lapor = null !== $tgl_lapor ? $tgl_lapor->toDateTime() : null;
        if ($now >= $start) {
            $jam = $now->diff($akhir)->h;
            $mnt = $now->diff($akhir)->i;
            $dtk = $now->diff($akhir)->s;
            $tipe = 1;

            if ($status_lapor === 1 && $lapor > $akhir) {
                if ($jam === $slice[0] && $mnt === $slice[1] && $dtk > $slice[2]) {
                    $tipe = 2;
                }
            }
        }
        return $tipe;
    }
}

if (!function_exists('dateDifference')) {
    function dateDifference($date_1, $date_2, $differenceFormat = '%a')
    {
        $datetime1 = $date_1 ?: date_create($date_1);
        $datetime2 = $date_2 ?: date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);

    }
}

if (!function_exists('list_pelaporan')) {
    function list_pelaporan()
    {
        return [
            1 => 'Tepat Waktu',
            2 => 'Terlambat',
            3 => 'Tidak Ada Laporan',
        ];
    }
}

if (!function_exists('convertDateFromString')) {
    function convertDateFromString($date, $toDate = false)
    {
        $date = $date ?? '';
        Date::setLocale('id');
        if (!$toDate) {
            return Date::parse($date)->timezone(config('app.timezone'))->locale('id')->toDateTime();
        }
        return Date::parse($date)->timezone(config('app.timezone'))->locale('id')->toDate();

    }
}

if (!function_exists('set_verifikasi_badge')) {
    function set_verifikasi_badge($status)
    {
        if ($status === 1) {
            $clas = '<span class="badge badge-success"><i class="fa fa-check-circle"></i> Terverifikasi</span>';
        } elseif ($status === 2) {
            $clas = '<span class="badge badge-danger"><i class="fa fa-minus-square"></i> Gagal Verifikasi</span>';
        } else {
            $clas = '<span class="badge badge-info"><i class="ni ni-watch-time"></i> Menunggu</span>';
        }

        return $clas;
    }
}

if (!function_exists('nama_status_verif')) {
    function nama_status_verif($status)
    {
        if ($status === 1) {
            $clas = 'Terverikasi';
        } elseif ($status === 2) {
            $clas = 'Gagal Verifikasi';
        } else {
            $clas = 'Menunggu';
        }

        return $clas;
    }
}

if (!function_exists('nama_status_terima')) {
    function nama_status_terima($status)
    {
        $clas = 'Tidak Terima';
        if ($status === 1) {
            $clas = 'Terima';
        }
        return $clas;
    }
}

if (!function_exists('set_checklist_absen')) {
    function set_checklist_absen($status)
    {
        switch ($status) {
            case 1:
                $color = 'green'; // Hadir
                break;
            case 2:
                $color = 'blue'; // Izin
                break;
            case 3:
                $color = 'red'; // Sakit
                break;
            case 4:
                $color = 'teal'; // Cuti
                break;
            case 5:
                $color = 'dark'; // Dinas
                break;
            case 6:
                $color = 'purple'; // Tanpa Keterangan
                break;
            default:
                $color = 'primary'; // Default
        }
        return $color;
    }
}

if (!function_exists('set_dt_checklist_absen')) {
    function set_dt_checklist_absen($status)
    {
        switch ($status) {
            case 1:
                $color = '<i class="fa fa-check-square text-green"></i>'; // Hadir
                break;
            case 2:
                $color = '<i class="fa fa-check-square text-red"></i>'; // Izin
                break;
            case 3:
                $color = '<i class="fa fa-check-square text-info"></i>'; // Sakit
                break;
            case 4:
                $color = '<i class="fa fa-check-square text-purple"></i>'; // Cuti
                break;
            case 5:
                $color = '<i class="fa fa-check-square text-dark"></i>'; // Dinas
                break;
            default:
                $color = '<i class="fa fa-check-square text-red"></i>'; // Default
        }
        return $color;
    }
}

if (!function_exists('set_color_absen')) {
    function set_color_absen($status)
    {
        switch ($status) {
            case 1:
                $color = 'success'; // Hadir
                break;
            case 2:
                $color = 'danger'; // Izin
                break;
            case 3:
                $color = 'info'; // Sakit
                break;
            case 4:
                $color = 'primary'; // Cuti
                break;
            case 5:
                $color = 'default'; // Dinas
                break;
            default:
                $color = 'warning'; // Default
        }
        return $color;
    }
}

if (!function_exists('set_dt_checklist_jamker')) {
    function set_dt_checklist_jamker($status)
    {
        if ($status) {
            return '<i class="fa fa-check-square text-green"></i>';
        }
        return '<i class="fa fa-minus-square text-red"></i>';
    }
}

function getAutoVersion($file)
{
    $filePath = public_path().'EKN'.$file;

    if (!file_exists($filePath)) {
        return '';
    }

    $version = filemtime($filePath);

    return '?v='.$version;
}

if (!function_exists('list_jenis_pengguna')) {
    function list_jenis_pengguna()
    {
        return [
            1 => 'PNS',
            2 => 'NON PNS',
        ];
    }
}

if (!function_exists('list_jenis_jamkerja')) {
    function list_jenis_jamkerja()
    {
        return [
            'A' => 'A',
            'B' => 'B',
        ];
    }
}

if (!function_exists('get_tipe_jamker')) {
    function get_tipe_jamker($tipe)
    {
        if ($tipe === 'B') {
            return 'B - (7,5 hari kerja)';
        }
        return 'A - (5 hari kerja)';
    }
}

if (!function_exists('format_indonesia')) {
    function format_indonesia($nilai, $koma = false)
    {
        if ($koma) {
            return 'Rp. '.number_format($nilai, 2, ',', '.');
        }

        return 'Rp. '.number_format($nilai, 0, ',', '.');
    }
}

if (!function_exists('set_iuran_bpjs')) {
    function set_iuran_bpjs($nilai = 0)
    {
        $iuran = 0;
        $persen = settings()->get('ekn_persen_iuran_bpjs') ?: 1;
        if ($nilai > 0) {
            $iuran = (int) $nilai * $persen / 100;
        }
        return $iuran;
    }
}

if (!function_exists('cutNum')) {
    function cutNum($num, $precision = 2)
    {
        return floor($num).substr(str_replace(floor($num), '', $num), 0, $precision + 1);
    }
}

if (!function_exists('hitung_pajak')) {
    function hitung_pajak($nilai, $pajak)
    {
        $nilai = $nilai ?? 0;
        $pajak = $pajak ?? 0;
        return $nilai * ($pajak / 100) ?? 0.00;
    }
}

if(!function_exists('status_mesin')){
    function status_mesin($status){
        switch ($status){
            case 0 :
                return 'Masuk';
                break;
            case 1 :
                return 'Pulang';
                break;
            case 2 :
                return 'Keluar';
                break;
            case 3 :
                return 'Kembali';
                break;
            case 4 :
                return 'Lembur Masuk';
                break;
            case 5 :
                return 'Lembur Keluar';
                break;
            default:
                return null;
                break;

        }
    }
}

if(!function_exists('jam_absen_diantara')){
    function jam_absen_diantara($jam, $status_absen, $hari = null)
    {
        if (!$hari || null === $hari) {
            $hari = format_date('now', '%w');
        }
        $jam = strtotime($jam);
        $buka = strtotime(get_jam_absen_buka($status_absen, $hari) . ':00');
        $tutup = strtotime(get_jam_absen_tutup($status_absen, $hari) . ':59');
        return ($jam >= $buka && $jam <= $tutup);
    }
}

if(!function_exists('get_jam_absen')){
    function get_jam_absen($status_absen, $hari = null)
    {
        if (!$hari || null === $hari) {
            $hari = format_date('now', '%w');
        }
        return config_item("waktu_{$status_absen}_{$hari}");
    }
}

if(!function_exists('get_jam_absen_buka')){
    function get_jam_absen_buka($status_absen, $hari = null)
    {
        if (!$hari || null === $hari) {
            $hari = format_date('now', '%w');
        }
        $waktu = get_jam_absen($status_absen, $hari);
        $buka = (int) config_item("buka_{$status_absen}_{$hari}");
        return Date::createFromTimestamp(strtotime($waktu))
            ->timezone(config('app.timezone'))->addMinutes(-$buka)->format("H:i");
        //return format_date(strtotime("-{$buka} minutes", strtotime($waktu)), '%H:%i');
    }
}

if(!function_exists('get_jam_absen_tutup')){
    function get_jam_absen_tutup($status_absen, $hari = null)
    {
        if (!$hari || null === $hari) {
            $hari = format_date('now', '%w');
        }
        $waktu = get_jam_absen($status_absen, $hari);
        $tutup = (int) config_item("tutup_{$status_absen}_{$hari}");
        return Date::createFromTimestamp(strtotime($waktu))
            ->timezone(config('app.timezone'))->addMinutes($tutup)->format("H:i");
        //return format_date(strtotime("+{$tutup} minutes", strtotime($waktu)), '%H:%i');
    }
}

if(!function_exists('absen_check_action')){
    function absen_check_action($id_action)
    {
        $ci = &get_instance();
        $qw = DB::select('ID_act id, name, time_exec, ID_msn msn')->where(array('ID_act' => $id_action, 'time_exec <>' => NULL))->get('actions');
        if ($qw->num_rows() > 0) {
            return $qw->row_array();
        }
        return false;
    }
}

if(!function_exists('absen_send_action')){
    function absen_send_action($action, $id_msn)
    {
        $ci = DB::table('actions');
        // hapus action yg kadaluarsa
        $batas = strtotime(date_ymdhis()) - (10 * 50); // 10 menit
        $batas = date_ymdhis($batas);
        $ci->where('time_added <', $batas)->delete('actions');

        $pdata = array(
            'name'       => $action,
            'ID_msn'     => $id_msn,
            'time_exec'  => NULL
        );
        // cek apa sudah pernah ada sebelumnya
        $cek = $ci->select('ID_act id')->where($pdata)->get()->first();
        if ($cek || null !== $cek) {
            return $cek->id;
        }
        // insert action baru
        $pdata['time_added'] = date_ymdhis();
        if ($ci->insert( $pdata)) {
            return $ci->insertGetId($pdata);
        }
        return false;
    }
}

if(!function_exists('get_konektor_last_active')){
    function get_konektor_last_active()
    {
        $ci = setting();
        //	$config = config_item('connector_last_active');
        //$konektor = isset($config) ? $config : set_konektor_last_active();
        //$konektor = $ci->config->load_from_db(['cfg_key' => 'connector_last_active']);
        return $ci->get('connector_last_active');
    }
}

if(!function_exists('set_konektor_last_active')){
    function set_konektor_last_active($ymdhis = 'now')
    {
        //$ci = &get_instance();
        $ymdhis = date_ymdhis() ?? $ymdhis;
        setting(['connector_last_active' => $ymdhis]);
//        $ci->config->set_item('connector_last_active', $ymdhis);
//        $ci->config->save_to_db('connector_last_active', $ymdhis);
    }
}

if(!function_exists('konektor_aktif')){
    function konektor_aktif()
    {
        $last = get_konektor_last_active();
        echo $last;
        if ($last) {
            $batas = config_item('menit_konektor_disconnect');
            return minutes_between($last, date_ymdhis()) <= $batas;
        }
        return FALSE;
    }
}

if(!function_exists('label_status_absen')){
    function label_status_absen($status)
    {
        $jns = get_list_item('label_status_absen', 2);
        return $jns[$status] ?? $jns[0];
    }
}

if(!function_exists('list_status_absen')){
    function list_status_absen($first_empty = FALSE)
    {
        return get_list_item('label_status_absen', 2, $first_empty);
    }
}

if(!function_exists('list_kode_status_absen')){
    function list_kode_status_absen($first_empty = FALSE)
    {
        return get_list_item('kode_status_absen', 2, $first_empty);
    }
}

if(!function_exists('jam_to_hari')){
    function jam_to_hari($jam)
    {
        if (empty($jam)) return NULL;
        if ($jam <= 24) return $jam . ' Jam';
        $hari = floor($jam / 24);
        $sisa = $jam % 24;
        $ret = $hari . ' Hari';
        if ($sisa > 0) $ret .= ' ' . $sisa . ' Jam';
        return $ret;
    }
}

if(!function_exists('time_hhmm')){
    function time_hhmm($time)
    {
        $exp = explode(':', $time);
        return $exp[0] . ':' . $exp[1];
    }
}
/**
 * Get item from list_item config
 * @param  string  $item_name
 * @param  integer $part 0=key,1=value,2=both
 * @param  string|FALSE $first_empty
 * @return array
 */

if(!function_exists('get_list_item')){
    function get_list_item($item_name, $part = 1, $first_empty = false)
    {
        static $items = null;
        if ($items === null) {
//            $items = $ci->config->item('list_item');
            $items = config('list_item');
        }
        $arr = $items[$item_name];
        if ($part === 0) {
            $arr = array_keys($items[$item_name]);
            $arr = array_combine($arr, $arr);
        } elseif ($part === 1) {
            $arr = array_combine($items[$item_name], $items[$item_name]);
        }
        return ($first_empty === false) ? $arr : array('' => $first_empty) + $arr;
    }
}

if(!function_exists('label_ya_tidak')){
    function label_ya_tidak($ya_tidak)
    {
        $jks = list_ya_tidak();
        return $jks[$ya_tidak] ?? '';
    }
}

if(!function_exists('list_sudah_belum')){
    function list_sudah_belum($first_empty = false): array
    {
        $arr = array('Y' => 'Sudah', 'N' => 'Belum');
        return ($first_empty === false) ? $arr : array('' => $first_empty) + $arr;
    }
}

if(!function_exists('label_sudah_belum')){
    function label_sudah_belum($yn, $default = '')
    {
        $list = list_sudah_belum();
        return $list[$yn] ?? $default;
    }
}

if(!function_exists('arr_jam')){
    function arr_jam(): array
    {
        $arr = array();
        for ($i = 0; $i <= 23; $i++) {
            $wkt = $i > 9 ? $i : '0' . $i;
            $wkt .= ':00';
            $arr[$wkt] = $wkt;
        }
        return $arr;
    }
}

if(!function_exists('arr_range')){
    function arr_range($low, $max, $first_empty = FALSE, $step = 1): array
    {
        $arr = array();
        for ($i = $low; $i <= $max; $i += $step) {
            $arr[$i] = $i;
        }
        return ($first_empty === FALSE) ? $arr : array('' => $first_empty) + $arr;
    }
}

if(!function_exists('in_array_set_checked')){
    function in_array_set_checked($arr, $val): string
    {
        if ($arr === 'all') {
            return ' checked';
        }
        if (!is_array($arr)) {
            return '';
        }
        if (in_array($val, $arr, true)) {
            return ' checked';
        }

        return '';
    }
}

if(!function_exists('download_pegmesin')){
    function download_pegmesin($idmsn): void
    {
        $ret = array('ok' => FALSE, 'msg' => '', 'id' => 0);
        if (!konektor_aktif()) {
            $ret['msg'] = 'Server tidak aktif!';
        } elseif ($ret['id'] = absen_send_action('datapeg_dwl', $idmsn)) {
            $ret['ok'] = TRUE;
        }
        echo $ret;
    }
}

if(!function_exists('list_mesin')){
    function list_mesin($first_empty = FALSE)
    {
        $arr = items_fromdb('mesin', 'ID_msn', 'nama');
        return ($first_empty === FALSE) ? $arr : array('' => $first_empty) + $arr;
    }
}

if(!function_exists('import_log_finger')){
    function import_log_finger($id_msn, $tgl_absen): bool|int
    {
        $tgl_absen = $tgl_absen ?? date_ymd();
        $jum_data = 0;
        $ci = DB::table('attlog');
        $id_rumpun = get_where_value('mesin', 'rumpun_ID', array('ID_msn' => $id_msn));

        // load data attlog
        $ci->selectRaw("Tanggal, PIN, GROUP_CONCAT(Status,'-',Jam ORDER BY Status SEPARATOR ';') jam_sep");
//        $ci->select("Tanggal, PIN, GROUP_CONCAT(Status,'-',Jam ORDER BY Status SEPARATOR ';') jam_sep");
        $ci->where('ID_msn', $id_msn);
        $ci->where('Tanggal', $tgl_absen);
        $ci->groupBy('Tanggal', 'PIN');
        $qw = $ci->get();
        if ($qw->count() > 0) {
            $tipe_rumpun = get_where_value('rumpun', 'tipe', array('ID' => $id_rumpun));
            $hari = format_date($tgl_absen, '%w');
            $pdata = array();
            foreach ($qw as $i => $row) {
                $pdata[$i] = array(
                    'tanggal_absensi' => $tgl_absen, 'pegawai_ID' => $row->PIN, 'sumber' => 2,
                    'absen_masuk' => 'NULL', 'absen_pulang' => 'NULL', 'pembagi' => 'NULL', 'jam_hadir' => 'NULL'
                );
                $jam_sep_arr = explode(';', $row->jam_sep);
                $jams = array();
                foreach ($jam_sep_arr as $st_jam) {
                    [$p_status, $p_jam] = explode('-', $st_jam);
                    $jams[$p_status] = $p_jam;
                }
                if (isset($jams[0])) {
                    $pdata[$i]['absen_masuk'] = 1;
                }
                if (isset($jams[1])) {
                    $pdata[$i]['absen_pulang'] = 1;
                    if (isset($jams[0])) {

                        $tol_masuk = (int) config_item('tol_masuk');
                        $waktu_masuk = config_item('waktu_masuk_' . $hari) . ':00'; // format H:i:s
                        $waktu_masuk_tol = strtotime("+{$tol_masuk} minutes", strtotime($waktu_masuk)); // format time
                        // jika masuk sebelum jam masuk+toleransi maka tetap dihitung dari jam masuk
                        if (strtotime($jams[0]) < $waktu_masuk_tol) {
                            $jams[0] = $waktu_masuk;
                        }

                        $tol_pulang = (int) config_item('tol_pulang');
                        $waktu_pulang = config_item('waktu_pulang_' . $hari) . ':00'; // format H:i:s
                        $waktu_pulang_tol = strtotime("-{$tol_pulang} minutes", strtotime($waktu_pulang)); // format time
                        // jika pulang setelah jam pulang-toleransi maka tetap dihitung dari jam pulang
                        if (strtotime($jams[1]) > $waktu_pulang_tol) {
                            $jams[1] = $waktu_pulang;
                        }

                        $pdata[$i]['jam_hadir'] = hours_between($jams[0], $jams[1]);
                        if (isset($jams[2])) { // 2 = keluar istrahat
                            if (isset($jams[3])) { // 3 = kembali masuk dari istrahat
                                // $jam_istrahat = hours_between(config_item('waktu_keluar_'.$hari), config_item('waktu_kembali_'.$hari), 0.5);

                                $tol_keluar = (int) config_item('tol_keluar');
                                $waktu_keluar = config_item('waktu_keluar_' . $hari) . ':00'; // format H:i:s
                                $waktu_keluar_tol = strtotime("-{$tol_keluar} minutes", strtotime($waktu_keluar)); // format time
                                // jika keluar setelah jam keluar-toleransi maka tetap dihitung dari jam keluar
                                if (strtotime($jams[2]) > $waktu_keluar_tol) {
                                    $jams[2] = $waktu_keluar;
                                }

                                $tol_kembali = (int) config_item('tol_kembali');
                                $waktu_kembali = config_item('waktu_kembali_' . $hari) . ':00'; // format H:i:s
                                $waktu_kembali_tol = strtotime("+{$tol_kembali} minutes", strtotime($waktu_kembali)); // format time
                                // jika kembali sebelum jam kembali+toleransi maka tetap dihitung dari jam kembali
                                if (strtotime($jams[3]) < $waktu_kembali_tol) {
                                    $jams[3] = $waktu_kembali;
                                }

                                $lama_istirahat = hours_between($jams[2], $jams[3]);
                                // if ($lama_istirahat < $jam_istrahat) $lama_istirahat = $jam_istrahat;
                                $pdata[$i]['jam_hadir'] -= $lama_istirahat;
                            } else {
                                // tidak kembali dari istrahat
                                // $pdata[$i]['jam_hadir'] = hours_between($jams[0], $jams[2]);
                                $pdata[$i]['jam_hadir'] -= 3; // kurangi 3 jam
                            }
                        } else {
                            $pdata[$i]['jam_hadir'] -= 4.5; // kurangi 4.5 jam
                        }
                        // bulatkan 0.5
                        $pdata[$i]['jam_hadir'] = floor($pdata[$i]['jam_hadir'] * 2) / 2;
                    }
                }
                // $pdata[$i]['pembagi'] = ($tipe_rumpun === 'B') ? config_item('sia_pembagi_6') : config_item('sia_pembagi');
                $cfg_item = ($tipe_rumpun === 'B') ? 'sia_pembagi_6' : 'sia_pembagi';
                $pdata[$i]['pembagi'] = get_where_value('config', 'config_value', array('config_key' => $cfg_item));
                if ($pdata[$i]['jam_hadir'] !== null && $pdata[$i]['jam_hadir'] > $pdata[$i]['pembagi']) {
                    $pdata[$i]['jam_hadir'] = $pdata[$i]['pembagi'];
                }

                if (!isset($jams[2], $jams[3])) {
                    unset($pdata[$i]);
                }
            }
            $pdata = array_values($pdata);
            $jum_data = count($pdata);
            if ($jum_data > 0) {
//                $ci->db->set_dbprefix('sm_');
                $xdb = new Xdb();
                if ($xdb->insert_batch_update('absensi', $pdata, false)) {
                    return $jum_data;
                }

                return false;
            }
        }
        return false;
    }
}

/*
 * DATE HELPER
 */
if(!function_exists('is_empty_date')){
    function is_empty_date($datetime): bool
    {
        return empty($datetime) || ($datetime === '0000-00-00') || ($datetime === '0000-00-00 00:00:00');
    }
}

if(!function_exists('days_between')){
    function days_between($ymd1, $ymd2 = NULL): float
    {
        if ( ! $ymd2) {
            $ymd2 = date_ymd();
        }
        $datediff = abs(strtotime($ymd1) - strtotime($ymd2));
        return floor($datediff / (60 * 60 * 24));
    }
}

if(!function_exists('minutes_between')){
    function minutes_between($datetime1, $datetime2): float
    {
        $datetime1 = strtotime($datetime1);
        $datetime2 = strtotime($datetime2);
        $interval  = abs($datetime2 - $datetime1);
        return round($interval / 60);
    }
}

if(!function_exists('day_list')){
    function day_list($short = FALSE) {
        static $days = array();
        $lang_prefix = $short ? 'dayname_short_' : 'dayname_';
        if ( ! isset($days[$lang_prefix])) {
            //get_instance()->lang->load('date');
            $days[$lang_prefix] = array();
            for ($i = 0; $i <= 6; $i++) {
                $days[$lang_prefix][$i] = __($lang_prefix . $i);
            }
        }
        return $days[$lang_prefix];
    }
}

/**
 * Get day name
 * require : custom date_lang
 *
 * @param mixed $date [now|y-m-m|d-m-y|day_index(0 = sunday)|time]
 * @param bool $short short day name (3 digit)
 * @param  string $empty_val default value if error or empty
 * @return string
 */

if(!function_exists('day_name')){
    function day_name($date = 'now', $short = false, $empty_val = '') {
//        get_instance()->lang->load('date');
        $lang_prefix = $short ? 'dayname_short_' : 'dayname_';
        if ($date === '' || $date === NULL || $date === '0000-00-00') {
            return $empty_val;
        }
        if ($date === 'now') {
            return __($lang_prefix . mdate('%w'));
        }

        if (is_string($date)) {
            // in day index format (0 = sunday)
            if (strlen($date) === 1) {
                $date = (int) $date;
                return __($lang_prefix . $date);
            }
            // in Y-m-d format
            if (preg_match('/^\d{4}-\d{2}-\d{2}/', $date, $match)) {
                $date = date('w', strtotime($match[0]));
                return __($lang_prefix . $date);
            }
            // in d/m/Y or d-m-Y format
            if (preg_match('/^\d{2}([\-|\/]{1})\d{2}[\-|\/]{1}\d{4}/', $date, $match)) {
                $date = date('w', strtotime(dmy2ymd($match[0], $match[1])));
                return __($lang_prefix . $date);
            }
        } elseif (is_int($date) && ($date >= 0 && $date <= 6)) {
            return __($lang_prefix . $date);
        } else { // in time format
            return __($lang_prefix . Date::parse($date)->format('w'));
//            return __($lang_prefix . date('w', $date));
        }
        return $empty_val;
    }
}

if(!function_exists('month_list')){
    function month_list($short = FALSE) {
        static $months = array();
        $lang_prefix = $short ? 'monthname_short_' : 'monthname_';
        if ( ! isset($months[$lang_prefix])) {
//            get_instance()->lang->load('date');
            $months[$lang_prefix] = array();
            for ($i = 1; $i <= 12; $i++) {
                $months[$lang_prefix][$i] = __($lang_prefix . $i);
            }
        }
        return $months[$lang_prefix];
    }
}

/**
 * Get month name
 * require : custom date_lang
 *
 * @param mixed $date [now|y-m-m|d-m-y|month_index(1 = jan)|time]
 * @param bool $short short month (3 digit)
 * @param  string $default default value if error or empty
 * @return string
 */

if(!function_exists('month_name')){
    function month_name($date = 'now', $short = FALSE, $default = '') {
        $lang_prefix = $short ? 'monthname_short_' : 'monthname_';
        if (empty($date) || $date === '0000-00-00') {
            return $default;
        }
        if ($date === 'now') {
            return __($lang_prefix . mdate('%n'));
        }

        if (is_string($date)) {
            // check if date in Y-m-d format
            [, $m, ] = array_pad(explode('-', $date), 3, '0');
            if ($m = (int) $m) {
                return __($lang_prefix.$m);
            }
            // check if date in d/m/Y format
            [, $m, ] = array_pad(explode('/', $date), 3, '0');
            if ($m = (int) $m) {
                return __($lang_prefix.$m);
            }
            // check if string month index
            $date = (int) $date;
            if ($date > 0 && $date < 13) {
                return __($lang_prefix.$date);
            }
        } elseif (is_int($date) && ($date > 0 && $date < 13)) {
            return __($lang_prefix . $date);
        } else { // in time format
            return __($lang_prefix . Date::parse($date)->format('n'));
//            return __($lang_prefix . date('n', $date));
        }
        return $default;
    }
}

if ( ! function_exists('now'))
{
    /**
     * Get "now" time
     *
     * Returns time() based on the timezone parameter or on the
     * "time_reference" setting
     *
     * @param  string
     * @return    int
     * @throws \Exception
     */
    function now($timezone = null)
    {
        if (empty($timezone))
        {
            $timezone = config('app.timezone');
        }

        if ($timezone === 'local' || $timezone === date_default_timezone_get())
        {
            return time();
        }

        //$datetime = new \DateTime('now', new \DateTimeZone($timezone));
        $datetime = Date::now()->timezone($timezone)->locale(config('app.locale'));
        sscanf($datetime->format('j-n-Y G:i:s'), '%d-%d-%d %d:%d:%d', $day, $month, $year, $hour, $minute, $second);

        return mktime($hour, $minute, $second, $month, $day, $year);
    }
}

if(!function_exists('mdate')){
    function mdate($datestr = '', $time = ''): string
    {
        if ($datestr === '') {
            return '';
        }

        if (empty($time)) {
            $time = now();
        }
        $datestr = str_replace('%\\','',preg_replace('/([a-z]+?){1}/i', '\\\\\\1', $datestr));
//        dd(Date::parse($time)->format($datestr));
        return Date::parse($time)->format($datestr);
//        return \date($datestr, $time);
    }
}

if(!function_exists('month_index')){
    function month_index($month_name, $short = FALSE): bool|int|string
    {
        $month_list = month_list($short);
        return array_search($month_name, $month_list,true);
    }
}

if(!function_exists('fdate_date')){
    function fdate_date($date = 'now', $short_month = FALSE, $default = NULL) {
        $format = $short_month ? '%j %M %Y' : '%j %F %Y';
        return format_date($date, $format, $default);
    }
}

if(!function_exists('fdate_datetime')){
    function fdate_datetime($datetime = '', $time_sep = ' - ', $default = NULL) {
        if (empty($time_sep)) $time_sep = ' ';
        return format_date($datetime, "%j %F %Y{$time_sep}%H:%i", $default);
    }
}

if(!function_exists('fdate_daydate')){
    function fdate_daydate($date = 'now', $default = NULL) {
        return format_date($date, "%l, %j %F %Y", $default);
    }
}

if(!function_exists('fdate_daydatetime')){
    function fdate_daydatetime($date = 'now', $time_sep = ' Pukul ', $default = NULL) {
        if (empty($time_sep)) $time_sep = ' ';
        return format_date($date, "%l, %j %F %Y{$time_sep}%H:%i", $default);
    }
}

if(!function_exists('date_dmy')){
    function date_dmy($date = 'now', $short_year = FALSE, $sep = '/', $default = NULL) {
        $format = $short_year ? "%d{$sep}%m{$sep}%y" : "%d{$sep}%m{$sep}%Y";
        return format_date($date, $format, $default);
    }
}

if(!function_exists('date_ymd')){
    function date_ymd($date = 'now', $default = NULL) {
        return format_date($date, '%Y-%m-%d', $default);
    }
}

if(!function_exists('date_ymdhis')){
    function date_ymdhis($date = 'now', $default = NULL) {
        return format_date($date, '%Y-%m-%d %H:%i:%s', $default);
    }
}

if(!function_exists('date_hi')){
    function date_hi($date = 'now', $default = NULL) {
        return format_date($date, '%H:%i', $default);
    }
}

if(!function_exists('date_his')){
    function date_his($date = 'now', $default = NULL) {
        return format_date($date, '%H:%i:%s', $default);
    }
}

if(!function_exists('dmy2ymd')){
    function dmy2ymd($dmy, $default = NULL) {
        if (preg_match('/^(\d{2})[\/\-\.]{1}(\d{2})[\/\-\.]{1}(\d{2,4})$/', $dmy, $match)) {
            return $match[3] . '-' . $match[2] . '-' . $match[1];
        }
        return $default;
    }
}

if(!function_exists('format_date')){
    function format_date($date = 'now', $format = '%d/%m/%Y', $default = null) {
        if (empty($date) || $date === '0000-00-00' || $date === '0000-00-00 00:00:00') {
            return $default;
        }
        if ($date === 'now') {
            $date_int = now();
        } elseif (is_int($date)) {
            $date_int = $date;
        }elseif (preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{2,4})([0-9:]*)/', $date, $match)) {
            $date_int = strtotime( $match[3] . '-' . $match[2] . '-' . $match[1] . (isset($match[4]) ? ' '.$match[4] : '') );
        } elseif ( ! $date_int = strtotime($date)) {
            return $default;
        }
        $format = str_replace(array('%F','%M','%l','%D'),
            array(
                month_name($date_int),
                month_name($date_int, TRUE),
                day_name($date_int),
                day_name($date_int, TRUE)
            ), $format
        );
        return mdate($format, $date_int);
    }
}

if(!function_exists('year_range')){
    function year_range($start='', $end=''): array
    {
        if (strlen($start) < 4) {
            if ($start[0] === '+') {
                $year1 = date("Y").substr($start, 1, strlen($start));
            } elseif ($start[0] === '-') {
                $year1 = date("Y") - substr($start, 1, strlen($start));
            } elseif ($start === '0') {
                $year1 = date("Y");
            }
        } else {
            $year1 = $start;
        }

        if (strlen($end) < 4) {
            if ($end[0] === '+') {
                $year2 = date("Y").substr($end, 1, strlen($end));
            } elseif ($end[0] === '-') {
                $year2 = date("Y") - substr($end, 1, strlen($end));
            } elseif ($end === '0') {
                $year2 = date("Y");
            }
        } else {
            $year2 = $end;
        }
        $arr = range($year1, $year2);
        return array_combine($arr, $arr);
    }
}

if(!function_exists('header_no_cache')){
    function header_no_cache(): void
    {
        header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", FALSE);
        header("Pragma: no-cache");
    }
}
