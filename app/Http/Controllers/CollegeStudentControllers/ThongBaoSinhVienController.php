<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollegeStudentAccounts;
use App\Models\ThongBaoSV;
class ThongBaoSinhVienController extends Controller
{
    //
    public function thongbaosv(Request $request)
    {
        $idsv = $request->session()->get('id_sv');
        $profilesv = CollegeStudentAccounts::where('MaSV', $idsv)->with('lop')->first();
        $thongbao =ThongBaoSV::join('dsadmin', 'dsadmin.MaAdmin', '=', 'thongbaosv.MaAdmin')
        ->join('quyen', 'quyen.idloaitk', '=', 'dsadmin.idloaitk')
        ->where('thongbaosv.MaSV', $profilesv->MaSV)->orderBy('id', 'DESC')
        ->get();
        // dd($thongbao);
        return view('collegestudentcp.thongbaosv.index')->with(compact('profilesv', 'thongbao'));
    }
}

