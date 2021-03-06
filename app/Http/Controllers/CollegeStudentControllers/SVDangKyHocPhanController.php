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
        // $date = date('Y-m-d H:i:s');
        $timestamp = time();
        $date = date ("Y-m-d H:i:s", $timestamp);
        // dd($date);
        $idsv = $request->session()->get('id_sv');
        $profilesv = CollegeStudentAccounts::where('MaSV', $idsv)->with('lop')->first();
        $checkngay = SettingTimeDKHP::where('end', '>=', $date)->orderBy('start', 'ASC')->first();
        $hientai = Carbon::now('Asia/Ho_Chi_Minh');
        $date1 = Carbon::createFromFormat('Y-m-d H:i:s', $checkngay->start);
        $date2 = Carbon::createFromFormat('Y-m-d H:i:s', $checkngay->end);
        // // lon hon hoac bang
        // echo $date;
        // echo '<br>';
        // echo $hientai;
        // echo '<br>';
        // echo $date1;
        // echo '<br>';
        // echo $date2;
        // echo '<br>';
        // var_dump($hientai->gte($date1));
        // // echo '<br>';
        // // // // // be hon hoac bang
        // var_dump($hientai->lte($date2));
        // // echo $hientai->lte($date1) ;
        // // echo $hientai->gte($date2) ;
        // if($hientai->gte($date1) && $hientai->lte($date2))
        // {
        //     echo 'hi';
        // }
        // else
        // {
        //     echo "error";
        // }
        // if(Carbon::now()->format('Y-m-d') >= $checkngay->start && Carbon::now()->format('Y-m-d') <= $checkngay->end)
        if($hientai->gte($date1) && $hientai->lte($date2))
        {

        // DangKyHocPhan::join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')

        $dangkyhocphan=HocPhan::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->join('dsgiaovien', 'dsgiaovien.MaGV', '=', 'mahocphan.MaGV')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('monhoccualop.MaLop', $profilesv->MaLop)
        ->orderBy('idhocphan', 'asc')
        ->get();

        $hocki= DanhSachMonHocCuaLop::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'monhoccualop.MaMonHoc')
        ->join('mahocphan', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('dangkymonhoc', 'dangkymonhoc.idhocphan', '=', 'mahocphan.idhocphan')
        ->where('dangkymonhoc.MaSV', $profilesv->MaSV)->distinct('monhoccualop.idhocki')->count('idhocki');
        $lichhoc= LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')->orderBy('idhocphan')->get();

        $dem=LichHoc::count('idhocphan');
        $checkdangky= DangKyHocPhan::where('MaSV', $profilesv->MaSV)->orderBy('idhocphan')->get();
        //  dd($checkdangky);
        // dd($profilesv->MaSV);
        return view('collegestudentcp.dangkyhocphan.index')->with(compact('profilesv', 'dangkyhocphan', 'hocki', 'lichhoc','dem', 'checkdangky'));
        // join('mahocphan', 'lichhoc.idhocphan', '=', 'mahocphan.idhocphan')
        // ->

        // echo Cookie::get('check');
        }
        else{
            return view('collegestudentcp.dangkyhocphan.error')->with(compact('profilesv'));
        }
    }
    public function deletehocphan($id, Request $request)
    {
        $id = $request->id;
        $ktraid= DangKyHocPhan::where('idhocphan', $id)->first();
        // dd($ktraid->MaDK);
        DangKyHocPhan::find($ktraid->MaDK)->delete();
        return response()->json([
        'success' => 'Record deleted successfully!'
    ]);
    }
    public function storedangkyhocphan($id, Request $request)
    {
        $idsv = $request->session()->get('id_sv');
        $id = $request->id;
        $checkhp= HocPhan::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->join('hocphi','hocphi.SoTinChi', '=', 'dsmonhoc.SoTinChi')
        ->where('mahocphan.idhocphan', $id)->get();
        // dd($checkhp->first()->GiaTien);
        $giatien = $checkhp->first()->GiaTien;
        $timestamp = time();
        $thoigian = date ("Y-m-d H:i:s", $timestamp);

        $dangkyhp = new DangKyHocPhan();
        $dangkyhp->MaSV = $idsv;
        $dangkyhp->idhocphan = $id;
        $dangkyhp->HocPhi = $giatien;
        $dangkyhp->NgayDangKy = $thoigian;

        $dangkyhp->save();
        // dd($dangkyhp);

    }
}
