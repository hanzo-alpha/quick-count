<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SuaraCalonController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  Route::get('/', [FrontController::class,'index'])->name('front');

  Auth::routes();

  // dashboard Routes
  Route::get('/home', [HomeController::class,'index'])->name('home');

  /*
   * Route Data Wilayah
   */
  Route::get('select-provinsi', [WilayahController::class,'getSelectProvinsi'])->name('select.prov');
  Route::get('select-kabupaten', [WilayahController::class,'getSelectKota'])->name('select.kota');
  Route::get('select-kecamatan', [WilayahController::class,'getSelectKecamatan'])->name('select.kecamatan');
  Route::get('select-kelurahan', [WilayahController::class,'getSelectDesa'])->name('select.desa');

  /*
   * Route Data TPS
   */
  Route::get('tps-list', [TpsController::class,'getTpsData'])->name('tps.list');
  Route::resource('data-tps', TpsController::class);

  //Route::view('tps', 'livewire.tps');
  Route::get('calon-list', [CalonController::class,'getCalonData'])->name('calon.list');
  Route::get('select-jeniscalon', [CalonController::class,'getSelectJenisCalon'])->name('select.jeniscalon');
  Route::resource('data-calon', CalonController::class);

  Route::get('input-suara-calon/{id}', 'SuaraCalonController@inputSuaraCalon')->name('suaracalon.input');
  Route::get('suaracalon-list', [SuaraCalonController::class,'getSuaraCalonData'])->name('suaracalon.list');
  Route::get('select-paslon', [SuaraCalonController::class,'getSelectPaslon'])->name('select.paslon');
  Route::get('select-tps', [SuaraCalonController::class,'getSelectTps'])->name('select.tps');
  Route::resource('data-suara-calon', SuaraCalonController::class);

  // Route Hitung Cepat
  Route::get('export', 'HitungController@export')->name('hitung.export');
  Route::get('hitung-suara', [HitungController::class,'getHitungSuaraData'])->name('hitungsuara.list');
  Route::resource('hitung-cepat', HitungController::class);

  //  Route::resource('/log-absen', 'LogController');

  Route::resource('pengguna', UserController::class);

  // locale Route
  Route::get('lang/{locale}', [LanguageController::class, 'swap']);

  // acess controller
  Route::get('/access-control',  [AccessController::class,'index']);
  Route::get('/access-control/{roles}', [AccessController::class,'roles']);
  Route::get('/ecommerce', [AccessController::class,'home'])->middleware('role:Admin');

  Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
  });
  Route::get('/clear-view', function () {
    Artisan::call('view:clear');
  });
  Route::get('/clear-optimize', function () {
    Artisan::call('optimize:clear');
  });
