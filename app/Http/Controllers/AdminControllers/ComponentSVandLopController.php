<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollegeStudentAccounts;
use App\Models\DanhSachLop;
use App\Models\DanhSachMonHocCuaLop;
use App\Models\DanhSachMonHoc;
class ComponentSVandLopController extends Controller
{
    //Danh sách sinh viên của lớp
    public function sinhviencualop($slug)
    {
        $lop_id= DanhSachLop::where('slug_lop', $slug)->with('khoa')->first();
        $listsvs = CollegeStudentAccounts::with('lop', 'permission')->where('MaLop', $lop_id->MaLop)->orderBy('MaSV', 'DESC')->get();
        return view('admincp.dssinhvien.index')->with(compact('listsvs', 'lop_id'));

    }
    // Đóng danh sách sinh viên
    // Chương trình đào tạo của lớp
    public function monhoccualop($slug)
    {
        $lop_id= DanhSachLop::where('slug_lop', $slug)->with('khoa')->first();
        $mhoflop= DanhSachMonHocCuaLop::with('lop','monhoc')->where('MaLop', $lop_id->MaLop)->orderBy('idmonhoccualop', 'ASC')->get();
        $counthk= DanhSachMonHocCuaLop::distinct('HocKi')->count('HocKi');
        // dd($mhoflop);
        // dd($lop_id);
        return view('admincp.dsmonhoccualop.index')->with(compact('lop_id', 'mhoflop', 'counthk'));

    }
    public function createmonhoccualop($slug)
    {
        $lop_id= DanhSachLop::where('slug_lop', $slug)->with('khoa')->first();
        $dsmonhoc= DanhSachMonHoc::all();
        return view('admincp.dsmonhoccualop.create')->with(compact('lop_id','dsmonhoc'));
    }
    public function storemonhoccualop(Request $request)
    {
        $dataa= $request->validate([
            'MaLop' => 'required|max:255',
            'MaMonHoc' => 'required|max:255',
            'HocKi' => 'required|max:255',
        ],
        [
            'MaLop.unique' => 'mã lớp đã có',
            'MaMonHoc.required' => 'trống',
            'HocKi.unique' => 'trống',
        ]
    );
    $dsmhcualop = new DanhSachMonHocCuaLop();
    $dsmhcualop->MaLop = $dataa['MaLop'];
    $dsmhcualop->MaMonHoc = $dataa['MaMonHoc'];
    $dsmhcualop->HocKi = $dataa['HocKi'];
    $dsmhcualop->save();
    return redirect()->back()->with('status', 'Thêm chương trình đào tạo thành công');
    }
    public function destroymonhoccualop($id)
    {
        DanhSachMonHocCuaLop::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa chương trình đào tạo thành công');
    }
    // Đóng chương trình đào tạo của lớp
    // Khen thưởng kỷ luật của lớp
    public function khenthuongkyluatcualop($slug)
    {
        $lop_id= DanhSachLop::where('slug_lop', $slug)->with('khoa')->first();
        return view('admincp.khenthuongkyluat.index')->with(compact('lop_id'));

    }
    // Đóng khen thưởng-kỷ luật của lớp
}
