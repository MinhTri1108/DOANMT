<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HocPhan;
use App\Models\DangKyHocPhan;
use App\Models\DiemDanhSV;
class DiemDanhController extends Controller
{
    //
    public function indexdiemdanh($id)
    {
        $lophocphan=HocPhan::where('idhocphan', $id)->with('monhoc')->first();
        $diemdanh = DiemDanhSV::join('dangkymonhoc', 'dangkymonhoc.MaDK', '=', 'diemdanh.MaDk')
        ->join('dssinhvien', 'dssinhvien.MaSV', '=', 'dangkymonhoc.MaSV')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')

        ->where('dangkymonhoc.idhocphan', $lophocphan->idhocphan)->orderBy('diemdanh.Ngay', 'ASC')->get();
        $ngay = DiemDanhSV::distinct()->select('Ngay')->orderBy('Ngay', 'ASC')->get();
        // $sinhviencuahocphan=DangKyHocPhan::groupBy('dangkymonhoc.MaDK')->join('dssinhvien','dssinhvien.MaSV','=','dangkymonhoc.MaSV')
        // ->leftJoin('diemdanh', 'dangkymonhoc.MaDK', '=', 'diemdanh.MaDK')
        // ->where('idhocphan', $lophocphan->idhocphan)->get();
        $classes = array();
        $sinhviencuahocphan = DangKyHocPhan::join('dssinhvien','dssinhvien.MaSV','=','dangkymonhoc.MaSV')->join('dslop', 'dssinhvien.MaLop', '=', 'dslop.MaLop')->where('idhocphan', $lophocphan->idhocphan)->get();
        return view('lecturercp.diemdanhhp.index')->with(compact('lophocphan', 'ngay','sinhviencuahocphan','diemdanh', 'classes'));
        // echo '<pre>';
        // print_r($sinhviencuahocphan);
    }
    public function storediemdanh(Request $request)
    {
        $ngay = date('Y:m:d');
        $madk = $request->MaDK;
        $diemdanh =$request->DiemDanh;
        // $data=[
        //     ['MaSV'] => $masv, ['DiemDanh'] =>$diemdanh, ['Ngay']=>$ngay
        // ];
        // print_r($data);
        // print_r($masv);
        // print_r($diemdanh);
        foreach($madk as $key=>$iddk)
        {
            // $input['MaSV']= $idsv;
            $input['MaDK']=$iddk;
            $input['DiemDanh']= $diemdanh[$key];
            $input['Ngay']=$ngay;
            // echo '</pre>';
            // print_r($input);
             DiemDanhSV::create($input);
            // print_r($input);
        }
        return redirect()->back()->with('status', 'Điểm danh thành công');
        // $diemdanh = DanhSachMonHoc::find($id);
        // $diemdanh->MaSV = $data['MaSV'];
        // $diemdanh->DiemDanh = $data['DiemDanh'];
        // $diemdanh->Ngay = $ngay;
        // $diemdanh->save();
        // return redirect()->back()->with('status', 'Điểm danh thành công');
    }
}
