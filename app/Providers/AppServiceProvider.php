<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\AdminAccounts;
use App\Models\Permission;
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
        view()->composer('*', function ($view) {
                $Admin=AdminAccounts::where(['MaAdmin'=> session()->get('id_account')])->with('permission')->get();
            $view->with('data', $Admin);
        });
    }
}
