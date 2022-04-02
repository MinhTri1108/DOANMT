<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AdminControllers\AdminAccountsController;
use App\Http\Controllers\AdminControllers\HomeController;
use App\Http\Controllers\AdminControllers\LecturersAccountsController;
use App\Http\Controllers\AdminControllers\DanhSachKhoaController;
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

// Route::get('/admincp/index', function () {
//     return view('admincp.index');
// });
Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('/AdminAccounts', AdminAccountsController::class);
    // Route::get('/AdminAccounts', [AdminAccountsController::class, 'index'])->name('index');
    // Route::post('/AdminAccounts/store',[ AdminAccountsController::class, 'store'])->name('store');
    Route::get('/AdminAccounts/fetchall', [AdminAccountsController::class, 'fetchAll'])->name('fetchAll');
    Route::resource('/LecturersAccounts', LecturersAccountsController::class);
    Route::prefix("EducationProgram")->group(function(){
        Route::resource('/DanhSachKhoa', DanhSachKhoaController::class);
    });
    // Route::get('/employee',[nhanvienController::class, 'index'])->name('listemployee');
    // Route::get('/employee/create',[nhanvienController::class, 'pagecreate'])->name('pageemployee');
    // Route::post('/employee/store',[nhanvienController::class, 'store'])->name('create');
    // Route::get('/employee/edit/{id}', [nhanvienController::class, 'pageedit']);
    // Route::put('/employee/update/{id}', [nhanvienController::class, 'update'])->name('update');
    // Route::get('/employee/delete/{id}', [nhanvienController::class, 'destroy']);
});

