<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhSachPhongHoc;
use App\Models\HocPhan;
use App\Models\LichHoc;
use App\Models\ThuNgay;
use App\Models\HocKi;
use App\Models\NamHoc;
class ThoiKhoaBieuSVController extends Controller
{
    //
    public function indextkbsv(Request $request)
    {

        $idsv = $request->session()->get('id_sv');
        // $hocki = HocPhan::join('dsmonhoc','dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        // ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        // ->where('mahocphan.MaSV', $idsv)
        // ->distinct()->select('monhoccualop.HocKi')->orderBy('HocKi','ASC')->get();
        $namhoc = NamHoc::all();
        // $hocki = HocKi::distinct()->select('HocKi')->orderBy('HocKi','ASC')->get();
        // $hocki = HocPhan::j
        // dd($namhoc);
        return view('collegestudentcp.tkb.index')->with(compact('namhoc'));
    }
    public function namhoctkbsv($id, Request $request)
    {
        $namhoccd = NamHoc::find($request->id);

        $namhoc = NamHoc::all();
        $hocki = HocKi::where('idnamhoc', $request->id)->orderBy('HocKi','ASC')->get();
        return view('collegestudentcp.tkb.hocki')->with(compact('hocki', 'namhoccd', 'namhoc'));
    }
    public function viewtkbsv($id, Request $request)
    {
        $namhoc = NamHoc::all();
        $idhocki = $request->id;
        $hocki = HocKi::orderBy('HocKi','ASC')->get();
        // $hocki= HocKi::distinct('HocKi')->orderBy('HocKi','ASC')->get();
        $idsv = $request->session()->get('id_sv');
        $hockiht= HocKi::where('idhocki', $request->id)->with('namhoc')->orderBy('HocKi','ASC')->first();
        // dd($hockiht);
        // $hockiht = HocPhan::join('dsmonhoc','dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        // ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        // ->join('lichhoc', 'lichhocc.idhocphan', '=', 'mahocphan.idhocphan')
        // ->where('MaSV', $idsv)->where('HocKi', $id)
        // ->distinct()->select('monhoccualop.HocKi')
        // ->get();
        // $hockiht =$request->hocki;
        $phonghoc= LichHoc::join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'lichhoc.idhocphan')
        ->join('dsmonhoc', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('dangkymonhoc', 'dangkymonhoc.idhocphan', '=', 'mahocphan.idhocphan')
        ->where('dangkymonhoc.MaSV', $idsv)->where('monhoccualop.idhocki', $id)->orderBy('lichhoc.idphong','ASC')->get();

        $check=LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'lichhoc.idhocphan')
        ->join('dsmonhoc', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('dangkymonhoc', 'dangkymonhoc.idhocphan', '=', 'mahocphan.idhocphan')
        ->where('dangkymonhoc.MaSV', $idsv)->where('monhoccualop.idhocki', $id)->distinct('lichhoc.idphong')->get();
        $week_days = array(1,2,3,4,5,6,7);
        $classes = array();
        // dd($phonghoc);
        return view('collegestudentcp.tkb.viewtkb')->with(compact('hockiht','namhoc','hocki', 'phonghoc', 'check', 'week_days', 'classes'));
    }
}
