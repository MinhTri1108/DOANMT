<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollegeStudentAccounts;
use App\Models\HocPhan;
use App\Models\LichHoc;
use App\Models\DangKyHocPhan;
use App\Models\DanhSachMonHocCuaLop;
use App\Models\SettingTimeDKHP;
use Cookie;
use Carbon\Carbon;
class SVDangKyHocPhanController extends Controller
{
    //
    public function indexdangkyhocphan(Request $request)
    {
        //
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // $date =Carbon::now()->format('d/m') >= (27/04);
        // dd($date);
        $date = date('Y-m-d');
        // dd($date);
        $idsv = $request->session()->get('id_sv');
        $profilesv = CollegeStudentAccounts::where('MaSV', $idsv)->with('lop')->first();
        $checkngay = SettingTimeDKHP::where('start', '>=', $date)->orderBy('start', 'ASC')->first();

        // dd($checkngay);
        if(Carbon::now()->format('Y-m-d') >= $checkngay->start && Carbon::now()->format('Y-m-d') <= $checkngay->end)
        {

        // DangKyHocPhan::join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')

        $dangkyhocphan=HocPhan::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->join('dsgiaovien', 'dsgiaovien.MaGV', '=', 'mahocphan.MaGV')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('monhoccualop.MaLop', $profilesv->MaLop)
        ->orderBy('idhocphan')
        ->get();

        $hocki= DanhSachMonHocCuaLop::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'monhoccualop.MaMonHoc')
        ->join('mahocphan', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('dangkymonhoc', 'dangkymonhoc.idhocphan', '=', 'mahocphan.idhocphan')
        ->where('dangkymonhoc.MaSV', $profilesv->MaSV)->distinct('monhoccualop.HocKi')->count('HocKi');
        // $i=3;
        $lichhoc= LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')->orderBy('idhocphan')->get();
        // $dem=LichHoc::where('idhocphan', $i)->count('idhocphan');
        // dd($dem);
        $dem=LichHoc::count('idhocphan');
        $request->cookie('check');
        // request()->cookie('check');
        $checkdangky= DangKyHocPhan::where('MaSV', $profilesv->MaSV)->get();
        return view('collegestudentcp.dangkyhocphan.index')->with(compact('profilesv', 'dangkyhocphan', 'hocki', 'lichhoc','dem', 'checkdangky'));
        // join('mahocphan', 'lichhoc.idhocphan', '=', 'mahocphan.idhocphan')
        // ->

        // echo Cookie::get('check');
        }
        else{
            return view('collegestudentcp.dangkyhocphan.error')->with(compact('profilesv'));
        }
    }
    public function deletehocphan(Request $request)
    {
        $id = $request->id;
        DangKyHocPhan::find($id)->delete();
        return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
    }
}
