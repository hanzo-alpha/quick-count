<?php

namespace App\Providers;

use App\Charts\RekapKecamatanChart;
use App\Charts\StatistikChart;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Carbon\Carbon;
//use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
     */
    public function register(): void
    {
        if ($this->app->environment() !== 'production') {
          $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale($this->app->getLocale());
        // $charts->register([
        //   StatistikChart::class,
        //   RekapKecamatanChart::class,
        // ]);
    }
}
