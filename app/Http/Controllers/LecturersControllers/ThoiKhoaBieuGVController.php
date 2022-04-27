<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhSachPhongHoc;
use App\Models\HocPhan;
use App\Models\LichHoc;
use App\Models\ThuNgay;
class ThoiKhoaBieuGVController extends Controller
{
    //
    public function indextkbgv(Request $request)
    {

        $idgv = $request->session()->get('id_gv');
        $hocki = HocPhan::join('dsmonhoc','dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('mahocphan.MaGV', $idgv)
        ->distinct()->select('monhoccualop.HocKi')->orderBy('HocKi','ASC')->get();
        // $phonghoc= LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        // ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        // ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')
        // ->join('mahocphan', 'mahocphan.idhocphan', '=', 'lichhoc.idhocphan')
        // ->join('dsmonhoc', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        // ->where('MaGV', $idgv)->orderBy('lichhoc.idphong','ASC')->get();;
        // $check=LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        // ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        // ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')
        // ->join('mahocphan', 'mahocphan.idhocphan', '=', 'lichhoc.idhocphan')
        // ->join('dsmonhoc', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        // ->where('MaGV', $idgv)->get();
        // $week_days = array(1,2,3,4,5,6,7);
        // $classes = array();
        // return view('lecturercp.tkb.index')->with(compact('phonghoc', 'check', 'week_days', 'classes', 'hocki'));
        return view('lecturercp.tkb.index')->with(compact('hocki'));
    }
    public function viewtkb($id, Request $request)
    {
        $idgv = $request->session()->get('id_gv');
        $hocki = HocPhan::join('dsmonhoc','dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('mahocphan.MaGV', $idgv)
        ->distinct()->select('monhoccualop.HocKi')->orderBy('HocKi','ASC')->get();
        // $hockiht = HocPhan::join('dsmonhoc','dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        // ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        // ->join('lichhoc', 'lichhocc.idhocphan', '=', 'mahocphan.idhocphan')
        // ->where('MaGV', $idgv)->where('HocKi', $id)
        // ->distinct()->select('monhoccualop.HocKi')
        // ->get();
        $hockiht =$request->id;
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
        return view('lecturercp.tkb.viewtkb')->with(compact('phonghoc', 'check', 'week_days', 'classes', 'hocki', 'hockiht'));
    }
}
