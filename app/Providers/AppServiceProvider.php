<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\Models\Produk;             
use App\Models\Kontak;
use App\Models\Profil;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['layouts.app', 'frontend.*'], function ($view) {
            $view->with('profil', Profil::first());
            $view->with('kontak', Kontak::first());
            $view->with('produks', Produk::limit(5)->get());
        });
    }
}
