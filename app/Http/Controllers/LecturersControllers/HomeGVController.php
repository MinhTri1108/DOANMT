<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThongBaoGV;
class HomeGVController extends Controller
{
    //
    public function index()
    {
        $tbgvs= ThongBaoGV::join('dsadmin', 'dsadmin.MaAdmin', '=', 'thongbaogv.MaAdmin')
        ->join('quyen', 'quyen.idloaitk', '=', 'dsadmin.idloaitk')->get();
        $counttb= ThongBaoGV::sum('status');;
        return view('lecturercp.index')->with(compact('tbgvs','counttb'));
    }
}
