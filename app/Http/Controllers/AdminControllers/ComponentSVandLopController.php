<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollegeStudentAccounts;
use App\Models\DanhSachLop;
class ComponentSVandLopController extends Controller
{
    //
    public function sinhviencualop($slug)
    {
        $lop_id= DanhSachLop::where('slug_lop', $slug)->with('khoa')->first();
        $listsvs = CollegeStudentAccounts::with('lop', 'permission')->where('MaLop', $lop_id->MaLop)->orderBy('MaSV', 'DESC')->get();
        return view('admincp.dssinhvien.index')->with(compact('listsvs', 'lop_id'));

    }
    public function monhoccualop($slug)
    {
        $lop_id= DanhSachLop::where('slug_lop', $slug)->with('khoa')->first();
        return view('admincp.dsmonhoccualop.index')->with(compact('lop_id'));

    }
    public function khenthuongkyluatcualop($slug)
    {
        $lop_id= DanhSachLop::where('slug_lop', $slug)->with('khoa')->first();
        return view('admincp.khenthuongkyluat.index')->with(compact('lop_id'));

    }
}
