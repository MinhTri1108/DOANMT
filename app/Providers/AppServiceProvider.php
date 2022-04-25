<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use App\Models\AdminAccounts;
use App\Models\Permission;
use App\Models\CollegeStudentAccounts;
use App\Models\LecturersAccounts;
use App\Models\ThongBaoGV;
use App\Models\ThongBaoSV;
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
         view()->composer('*', function ($view) {
                $sinhvien=CollegeStudentAccounts::where(['MaSV'=> session()->get('id_sv')])->with('permission')->get();
                $notificationsv=ThongBaoSV::join('dsadmin', 'dsadmin.MaAdmin', '=', 'thongbaosv.MaAdmin')
        ->join('quyen', 'quyen.idloaitk', '=', 'dsadmin.idloaitk')->where(['MaSV'=> session()->get('id_sv')])->get();
        $counttb= ThongBaoSV::where(['MaSV'=> session()->get('id_sv')])->sum('status');
            $view->with('datasv', $sinhvien)->with('notificationsv', $notificationsv)->with('counttb', $counttb);
        });
    }
}
