<?php

use Illuminate\Support\Facades\Route;
// admin
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
// end admin
// sinhvien
use App\Http\Controllers\CollegeStudentControllers\HomeSVController;
use App\Http\Controllers\CollegeStudentControllers\MessengerSVController;
use App\Http\Controllers\CollegeStudentControllers\ChuongTrinhDaoTaoController;
use App\Http\Controllers\CollegeStudentControllers\HocPhiController;
use App\Http\Controllers\CollegeStudentControllers\BangDiemSVController;
use App\Http\Controllers\CollegeStudentControllers\SVDangKyHocPhanController;
use App\Http\Controllers\CollegeStudentControllers\ThongBaoSinhVienController;
// end sinhvien
// giangvien
use App\Http\Controllers\LecturersControllers\HomeGVController;
use App\Http\Controllers\LecturersControllers\GroupLopController;
use App\Http\Controllers\LecturersControllers\DiemDanhController;
use App\Http\Controllers\LecturersControllers\UploadDiemSVController;
use App\Http\Controllers\LecturersControllers\UploadFileToS3AWSController;
use App\Http\Controllers\LecturersControllers\UploadFileTaiLieuController;
use App\Http\Controllers\LecturersControllers\ComponentGVandLopHocController;
use App\Http\Controllers\LecturersControllers\ThoiKhoaBieuGVController;
use App\Http\Controllers\LecturersControllers\ThongBaoGiangVienController;
// end giangvien
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
// Route::any('{query}',
//     function() { return redirect('/welcome'); })
//     ->where('query', '.*');
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
    Route::any('{query}',
    function() { return redirect('admin/'); })
    ->where('query', '.*');
});

Route::middleware(['CheckAccountSVLogin'])->prefix('collegestudent')->group(function () {
    Route::get('/', [HomeSVController::class, 'index'])->name('index');
    Route::get('/Messenger', [MessengerSVController::class, 'index'])->name('messenger');
    Route::post('/Messenger/store', [MessengerSVController::class, 'store'])->name('sendmessenger');
    Route::resource('/ChuongTrinhDaoTao', ChuongTrinhDaoTaoController::class);
    Route::resource('/HocPhi', HocPhiController::class);
    Route::resource('/Marks', BangDiemSVController::class);
    // Route::resource('/DangKyHocPhan', DangKyHocPhanController::class);
    // Route::group(['middleware' => ['SettingTimeDKHP']], function () {
    Route::get('/DangKyHocPhan', [SVDangKyHocPhanController::class, 'indexdangkyhocphan'])->name('dangkyhocphan');
    Route::delete('/DangKyHocPhan/delete', [SVDangKyHocPhanController::class, 'deletehocphan'])->name('deletehocphan');
    Route::get('/ThongBaoSinhVien', [ThongBaoSinhVienController::class, 'thongbaosv'])->name('thongbaosv');

    // });

    // Route::post('/Chat', function (Request $request){
    //     return $request->input('message');
    // });
    // Route::any('{query}',
    // function() { return redirect('collegestudent/'); })
    // ->where('query', '.*');
});
Route::middleware(['CheckAccountGVLogin'])->prefix('lecturers')->group(function () {
    //  Route::any('{query}',
    // function() { return redirect('lecturers/'); })
    // ->where('query', '.*');
    Route::get('/', [HomeGVController::class, 'index'])->name('index');
    Route::PUT('/UpdateProFile/{id}', [HomeGVController::class, 'updateprofile'])->name('updateprofile');
    Route::PUT('/UpdateChangePass/{id}', [HomeGVController::class, 'updatechangepass'])->name('updatechangepass');
    Route::prefix("GroupLop")->group(function(){
        Route::resource('/Lop', GroupLopController::class);
        Route::get('/DiemDanh/{id}', [DiemDanhController::class, 'indexdiemdanh'])->name('indexdiemdanh');
        Route::POST('/DiemDanh/store', [DiemDanhController::class, 'storediemdanh'])->name('storediemdanh');
        Route::get('/UploadDiem/Lop/{id}', [UploadDiemSVController::class, 'uploaddiem'])->name('uploaddiem');
        Route::POST('/UploadDiem/Lop/store', [UploadDiemSVController::class, 'storeuploaddiem'])->name('storeuploaddiem');
        Route::GET('/UploadDiem/Lop/edit/{id}', [UploadDiemSVController::class, 'edituploaddiem'])->name('edituploaddiem');
        Route::DELETE('/UploadDiem/Lop/delete/{id}', [UploadDiemSVController::class, 'deleteuploaddiem'])->name('deleteuploaddiem');
        Route::PUT('/UploadDiem/Lop/update/{id}', [UploadDiemSVController::class, 'updateuploaddiem'])->name('updateuploaddiem');
        Route::resource('/UploadFileTaiLieu', UploadFileTaiLieuController::class);

        Route::GET('/ListFileCuaHocPhan/{id}', [UploadFileToS3AWSController::class, 'listfiletoaws'])->name('listfiletoaws');
        Route::GET('/DownloadFileToAWS/{id}', [UploadFileToS3AWSController::class, 'downloadfiletoaws'])->name('downloadfiletoaws');
        Route::Delete('/DeleteFileToAWS/{id}', [UploadFileToS3AWSController::class, 'deletefiletoaws'])->name('deletefiletoaws');
        Route::GET('/UploadFileToAWS', [UploadFileToS3AWSController::class, 'indexfiletoaws'])->name('indexfiletoaws');
        Route::POST('/UploadFileToAWS/store', [UploadFileToS3AWSController::class, 'storefiletoaws'])->name('storefiletoaws');
        Route::get('/MonHoc-HocPhan/{id}', [ComponentGVandLopHocController::class, 'indexcomponentmonhoc'])->name('indexcomponentmonhoc');
        Route::get('/ThoiKhoaBieuGiangVien', [ThoiKhoaBieuGVController::class, 'indextkbgv'])->name('indextkbgv');
        Route::get('/ThoiKhoaBieuGiangVien/NamHoc/{id}', [ThoiKhoaBieuGVController::class, 'namhoctkb'])->name('namhoctkb');
        Route::get('/ThoiKhoaBieuGiangVien/HocKi/{id}', [ThoiKhoaBieuGVController::class, 'viewtkb'])->name('viewtkb');
    });

});

