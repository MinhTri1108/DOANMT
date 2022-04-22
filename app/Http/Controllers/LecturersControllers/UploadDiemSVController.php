<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HocPhan;
use App\Models\DangKyHocPhan;
use App\Models\DanhSachDiem;
class UploadDiemSVController extends Controller
{
    //
    public function uploaddiem($id)
    {
        $lophocphan=HocPhan::where('idhocphan', $id)->with('monhoc')->first();
        $sinhviencuahocphan= DangKyHocPhan::where('idhocphan', $lophocphan->idhocphan)->with('hocphan', 'masv')->get();
        $diemsinhvien=DanhSachDiem::join('dangkymonhoc', 'dsdiem.MaDK', '=', 'dangkymonhoc.MaDK')->join('dssinhvien','dangkymonhoc.MaSV', '=', 'dssinhvien.MaSV')
        ->join('dslop', 'dssinhvien.MaLop', '=', 'dslop.MaLop')->where('dangkymonhoc.idhocphan', $lophocphan->idhocphan)->get();
        return view('lecturercp.uploaddiem.index')->with(compact('lophocphan','sinhviencuahocphan', 'diemsinhvien'));
    }
    public function storeuploaddiem(Request $request)
    {
        $data= $request->validate([
            'MaDK' => 'required||max:11',
            'DiemCC' => 'required|max:11',
            'DiemGK' => 'required|max:11',
            'DiemThi' => 'required|max:11',
            'DiemTBMon' => 'required|max:11',
        ],
        [
            'MaDK.unique' => 'MaDk null',
            'DiemCC.required' => 'DiemCC trong',
            'DiemGK.required' => 'DiemGK trong',
            'DiemThi.required' => 'DiemThi trong',
            'MaHeDT.required' => 'MaHeDT trong',
        ]
    );
    // print_r($data);
    $danhsachdiem = new DanhSachDiem();
    $danhsachdiem->MaDK = $data['MaDK'];
    $danhsachdiem->DiemCC = $data['DiemCC'];
    $danhsachdiem->DiemGK = $data['DiemGK'];
    $danhsachdiem->DiemThi = $data['DiemThi'];
    $danhsachdiem->DiemTBMon = $data['DiemTBMon'];
    // print_r($danhsachdiem);
    $danhsachdiem->save();
    return redirect()->back()->with('status', 'Nhận điểm thành công');
    }
    public function edituploaddiem($id)
    {

    }
    public function deleteuploaddiem($id)
    {
        DanhSachDiem::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa điểm sinh viên  thành công');
    }
    public function updateuploaddiem($id)
    {

    }
}
