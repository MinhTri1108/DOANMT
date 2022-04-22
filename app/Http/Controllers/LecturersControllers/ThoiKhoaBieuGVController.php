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
        $hocki = HocPhan::where('MaGV', $idgv)->distinct()->select('HocKi')->orderBy('HocKi','ASC')->get();
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
        $hocki = HocPhan::where('MaGV', $idgv)->distinct()->select('HocKi')->orderBy('HocKi','ASC')->get();
        $hockiht = HocPhan::where('MaGV', $idgv)->where('HocKi', $id)
         ->join('lichhoc', 'lichhoc.idhocphan', '=', 'mahocphan.idhocphan')->distinct()->select('HocKi')->get();
        $phonghoc= LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'lichhoc.idhocphan')
        ->join('dsmonhoc', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('MaGV', $idgv)->where('mahocphan.HocKi', $id)->orderBy('lichhoc.idphong','ASC')->get();
        $check=LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'lichhoc.idhocphan')
        ->join('dsmonhoc', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('MaGV', $idgv)->where('mahocphan.HocKi', $id)->distinct('lichhoc.idphong')->get();
        $week_days = array(1,2,3,4,5,6,7);
        $classes = array();
        return view('lecturercp.tkb.viewtkb')->with(compact('phonghoc', 'check', 'week_days', 'classes', 'hocki', 'hockiht'));
    }
}
