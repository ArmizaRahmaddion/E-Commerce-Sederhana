<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\tbcart;
use Illuminate\Support\Facades\Auth;

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
        View::composer('*', function ($view) {
            $id_user = Auth::id();
            $jumlah_pesanan = 0;

            if ($id_user) {
                $jumlah_pesanan = tbcart::where('id_user', $id_user)->count();
            }

            $view->with('jumlah_pesanan', $jumlah_pesanan);
        });
    }
}
