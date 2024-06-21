<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Repuesto;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $countRequerimiento =  Repuesto::all()
        ->where('estado_repuesto', '=' ,'1')//1 es igual a pendiente de Autorizar
        ->count();
        View::share('countRequerimiento', $countRequerimiento);
    }
}
