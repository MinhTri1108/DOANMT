<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LecturersAccounts;
use App\Models\ThongBaoGV;
class ThongBaoGiangVienController extends Controller
{
    //
    public function thongbaogv(Request $request)
    {
        $idgv = $request->session()->get('id_gv');
        $profilegv = LecturersAccounts::where('MaGV', $idgv)->first();
        $thongbao =ThongBaoGV::join('dsadmin', 'dsadmin.MaAdmin', '=', 'thongbaogv.MaAdmin')
        ->join('quyen', 'quyen.idloaitk', '=', 'dsadmin.idloaitk')
        ->where('thongbaogv.MaGV', $profilegv->MaGV)->orderBy('idgv', 'DESC')
        ->get();
        // dd($thongbao);
        return view('lecturercp.thongbaogv.index')->with(compact('profilegv', 'thongbao'));
    }
}
