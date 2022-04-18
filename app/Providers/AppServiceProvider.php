<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use App\Models\AdminAccounts;
use App\Models\Permission;
use App\Models\LecturersAccounts;
use App\Models\ThongBaoGV;
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
            $view->with('dataad', $Admin);
        });
        view()->composer('*', function ($view) {
                $giangvien=LecturersAccounts::where(['MaGV'=> session()->get('id_gv')])->with('permission')->get();
                $notificationgv=ThongBaoGV::join('dsadmin', 'dsadmin.MaAdmin', '=', 'thongbaogv.MaAdmin')
        ->join('quyen', 'quyen.idloaitk', '=', 'dsadmin.idloaitk')->where(['MaGV'=> session()->get('id_gv')])->get();
        $counttb= ThongBaoGV::where(['MaGV'=> session()->get('id_gv')])->sum('status');
            $view->with('data', $giangvien)->with('notificationgv', $notificationgv)->with('counttb', $counttb);
        });
    }
}
