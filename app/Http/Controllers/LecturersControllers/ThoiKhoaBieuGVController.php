<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhSachPhongHoc;
use App\Models\HocPhan;
use App\Models\LichHoc;
use App\Models\ThuNgay;
use App\Models\HocKi;
use App\Models\NamHoc;
class ThoiKhoaBieuGVController extends Controller
{
    //
    public function indextkbgv(Request $request)
    {

        $idgv = $request->session()->get('id_gv');
        // $hocki = HocPhan::join('dsmonhoc','dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        // ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        // ->where('mahocphan.MaGV', $idgv)
        // ->distinct()->select('monhoccualop.HocKi')->orderBy('HocKi','ASC')->get();
        $namhoc = NamHoc::all();
        // $hocki = HocKi::distinct()->select('HocKi')->orderBy('HocKi','ASC')->get();
        // $hocki = HocPhan::j
        // dd($namhoc);
        return view('lecturercp.tkb.index')->with(compact('namhoc'));
    }
    public function namhoctkb($id, Request $request)
    {
        $namhoccd = NamHoc::find($request->id);

        $namhoc = NamHoc::all();
        $hocki = HocKi::where('idnamhoc', $request->id)->orderBy('HocKi','ASC')->get();
        return view('lecturercp.tkb.hocki')->with(compact('hocki', 'namhoccd', 'namhoc'));
    }
    public function viewtkb($id, Request $request)
    {
        $namhoc = NamHoc::all();
        $idhocki = $request->id;
        $hocki = HocKi::orderBy('HocKi','ASC')->get();
        // $hocki= HocKi::distinct('HocKi')->orderBy('HocKi','ASC')->get();
        $idgv = $request->session()->get('id_gv');
        $hockiht= HocKi::where('idhocki', $request->id)->with('namhoc')->orderBy('HocKi','ASC')->first();
        // dd($hockiht);
        // $hockiht = HocPhan::join('dsmonhoc','dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        // ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        // ->join('lichhoc', 'lichhocc.idhocphan', '=', 'mahocphan.idhocphan')
        // ->where('MaGV', $idgv)->where('HocKi', $id)
        // ->distinct()->select('monhoccualop.HocKi')
        // ->get();
        // $hockiht =$request->hocki;
        $phonghoc= LichHoc::join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'lichhoc.idhocphan')
        ->join('dsmonhoc', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('mahocphan.MaGV', $idgv)->where('monhoccualop.HocKi', $id)->orderBy('lichhoc.idphong','ASC')->get();

        $check=LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'lichhoc.idhocphan')
        ->join('dsmonhoc', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('MaGV', $idgv)->where('monhoccualop.HocKi', $id)->distinct('lichhoc.idphong')->get();
        $week_days = array(1,2,3,4,5,6,7);
        $classes = array();
        // dd($phonghoc);
        return view('lecturercp.tkb.viewtkb')->with(compact('hockiht','namhoc','hocki', 'phonghoc', 'check', 'week_days', 'classes'));
    }
}
