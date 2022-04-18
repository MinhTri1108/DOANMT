<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AdminControllers\AdminAccountsController;
use App\Http\Controllers\AdminControllers\HomeController;
use App\Http\Controllers\AdminControllers\LecturersAccountsController;
use App\Http\Controllers\AdminControllers\DanhSachKhoaController;
use App\Http\Controllers\AdminControllers\DanhSachLopController;
use App\Http\Controllers\AdminControllers\CollegeStudentAccountsController;
use App\Http\Controllers\AdminControllers\ComponentSVandLopController;
use App\Http\Controllers\AdminControllers\DanhSachMonHocController;
use App\Http\Controllers\AdminControllers\TaoHocPhanController;
use App\Http\Controllers\AdminControllers\CreateLichHocController;
use App\Http\Controllers\AdminControllers\SukienHoatDongController;
use App\Http\Controllers\AdminControllers\SendNotificationController;

use App\Http\Controllers\CollegeStudentControllers\HomeSVController;
use App\Http\Controllers\CollegeStudentControllers\MessengerSVController;

use App\Http\Controllers\LecturersControllers\HomeGVController;
use App\Http\Controllers\LecturersControllers\GroupLopController;
/*
|--------------------------------------------------------------------------
|   Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
// Route::get('/Login','AuthControllers\LoginController@index')->name('login');
// Route::get('Logout','AuthControllers\LoginController@logout')->name('logout');
Route::POST('/Login', [LoginController::class, 'login'])->name('login');
Route::GET('logout',[LoginController::class, 'logout'])->name('logout');


// Route::get('/admincp/index', function () {
//     return view('admincp.index');
// });


Route::middleware(['CheckAccountLogin'])->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('/AdminAccounts', AdminAccountsController::class);
    // Route::get('/AdminAccounts', [AdminAccountsController::class, 'index'])->name('index');
    // Route::post('/AdminAccounts/store',[ AdminAccountsController::class, 'store'])->name('store');
    Route::get('/AdminAccounts/fetchall', [AdminAccountsController::class, 'fetchAll'])->name('fetchAll');
    Route::resource('/LecturersAccounts', LecturersAccountsController::class);
    Route::prefix("EducationProgram")->group(function(){
        Route::resource('/DanhSachKhoa', DanhSachKhoaController::class);
        Route::resource('/DanhSachLop', DanhSachLopController::class);
        Route::GET('/Khoa/{id}', [DanhSachKhoaController::class, 'khoa'])->name('khoa');
        Route::GET('/Lop/{id}', [DanhSachLopController::class, 'lop'])->name('lop');
        Route::resource('/DanhSachSinhVien', CollegeStudentAccountsController::class);
        Route::resource('/SuKien-HoatDong', SukienHoatDongController::class);
        Route::resource('/SendNotification', SendNotificationController::class);

        Route::GET('/DanhSachSinhVien-Lop/{id}', [ComponentSVandLopController::class, 'sinhviencualop'])->name('sinhviencualop');

        Route::GET('/DanhSachMonHoc-Lop/{id}', [ComponentSVandLopController::class, 'monhoccualop'])->name('monhoccualop');
        Route::GET('/DanhSachMonHoc-Lop/create/{id}', [ComponentSVandLopController::class, 'createmonhoccualop'])->name('createmonhoccualop');
        // Route::GET('/DanhSachMonHoc-Lop/edit/{id}', [ComponentSVandLopController::class, 'editmonhoccualop'])->name('editmonhoccualop');
        Route::POST('/DanhSachMonHoc-Lop/store', [ComponentSVandLopController::class, 'storemonhoccualop'])->name('storemonhoccualop');
        // Route::PUT('/DanhSachMonHoc-Lop/update/{id}', [ComponentSVandLopController::class, 'updatemonhoccualop'])->name('updatemonhoccualop');
        Route::DELETE('/DanhSachMonHoc-Lop/delete/{id}', [ComponentSVandLopController::class, 'destroymonhoccualop'])->name('destroymonhoccualop');

        Route::GET('/KhenThuongKyLuat-Lop/{id}', [ComponentSVandLopController::class, 'khenthuongkyluatcualop'])->name('khenthuongkyluatcualop');

        Route::resource('/DanhSachMonHoc', DanhSachMonHocController::class);
        Route::resource('/CreateHocPhan', TaoHocPhanController::class);
        Route::resource('/CreateLichHoc', CreateLichHocController::class);
    });

});

Route::middleware(['CheckAccountSVLogin'])->prefix('collegestudent')->group(function () {
    Route::get('/', [HomeSVController::class, 'index'])->name('index');
    Route::get('/Messenger', [MessengerSVController::class, 'index'])->name('messenger');
    Route::post('/Messenger/store', [MessengerSVController::class, 'store'])->name('sendmessenger');
    // Route::post('/Chat', function (Request $request){
    //     return $request->input('message');
    // });
});
Route::middleware(['CheckAccountGVLogin'])->prefix('lecturers')->group(function () {
    Route::get('/', [HomeGVController::class, 'index'])->name('index');
    Route::resource('/GroupLop', GroupLopController::class);
});

