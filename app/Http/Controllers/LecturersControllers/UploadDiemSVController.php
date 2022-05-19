<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HocPhan;
use App\Models\DangKyHocPhan;
use App\Models\DanhSachDiem;
use App\Models\DanhSachDiemTBHocKi;
use App\Models\DanhSachDiemTichLuy;
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
            'Diem4' => 'required|max:11',
            'DiemChu' => 'required|max:11',
        ],
        [
            'MaDK.unique' => 'MaDk null',
            'DiemCC.required' => 'DiemCC trong',
            'DiemGK.required' => 'DiemGK trong',
            'DiemThi.required' => 'DiemThi trong',
            'DiemTBMon.required' => 'DiemTBMon trong',
            'Diem4.required' => 'Diem4 trong',
            'DiemChu.required' => 'DiemChu trong',
        ]
    );
    // print_r($data);
    $danhsachdiem = new DanhSachDiem();
    $danhsachdiem->MaDK = $data['MaDK'];
    $danhsachdiem->DiemCC = $data['DiemCC'];
    $danhsachdiem->DiemGK = $data['DiemGK'];
    $danhsachdiem->DiemThi = $data['DiemThi'];
    $danhsachdiem->DiemTBMon = $data['DiemTBMon'];
    $danhsachdiem->Diem4 = $data['Diem4'];
    $danhsachdiem->DiemChu = $data['DiemChu'];
    // print_r($danhsachdiem);
    $danhsachdiem->save();
    if($danhsachdiem->save() == true)
    {
        $getmasvandhocki= DangKyHocPhan::join('dssinhvien', 'dssinhvien.MaSV', '=', 'dangkymonhoc.MaSV')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->where('MaDK', $data['MaDK'])->first();
        //  dd($getmasvandhocki->MaSV, $getmasvandhocki->idhocki);
        $getdiemtb=DanhSachDiem::join('dangkymonhoc', 'dangkymonhoc.MaDK','=','dsdiem.MaDK')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->where('dangkymonhoc.MaSV', $getmasvandhocki->MaSV)
        ->where('mahocphan.idhocki', $getmasvandhocki->idhocki)->get();
        $getdiemtichluy=DanhSachDiem::join('dangkymonhoc', 'dangkymonhoc.MaDK','=','dsdiem.MaDK')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->where('dangkymonhoc.MaSV', $getmasvandhocki->MaSV)
        ->where('mahocphan.idhocki','<=', $getmasvandhocki->idhocki)->get();
        // dd($getdiemtb);
         $sumtchk =0;
         $sumtc = 0;
         $sumdiem =0;
         $tichdiemandhk=0;
         $tichdiemandhk4=0;
         $tichdiem=0;
         $tichdiem4=0;
        function tongdiem($diemtbm, $stcofd)
        {
            $tong= ($diemtbm*$stcofd);
            return $tong;
        }
        function tongdiem4($diemtbm4, $stcofd)
        {
            $tong4= ($diemtbm4*$stcofd);
            return $tong4;
        }
        if($getdiemtb->count()>0){
            // tinh diem trung binh hoc ki
            foreach($getdiemtb as $loaddiemtbm)
            {
                $sumtchk += $loaddiemtbm['SoTinChi'];
                $sumdiem += $loaddiemtbm['DiemTBMon'];
                $tichdiemandhk += tongdiem($loaddiemtbm['SoTinChi'], $loaddiemtbm['DiemTBMon']);
                $tichdiemandhk4 += tongdiem4($loaddiemtbm['SoTinChi'], $loaddiemtbm['Diem4']);
            }
            // tinh diem tich luy
            foreach($getdiemtichluy as $loaddiemtichluy)
            {
                $sumtc += $loaddiemtichluy['SoTinChi'];
                $sumdiem += $loaddiemtichluy['DiemTBMon'];
                $tichdiem += tongdiem($loaddiemtichluy['SoTinChi'], $loaddiemtichluy['DiemTBMon']);
                $tichdiem4 += tongdiem4($loaddiemtichluy['SoTinChi'], $loaddiemtichluy['Diem4']);
            }
            $checktontai   = DanhSachDiemTBHocKi::where('MaSV', $getmasvandhocki->MaSV)->where('idhocki', $getmasvandhocki->idhocki)
            ->count();
            if($checktontai>0)
            {
                // update diem tb hoc ki
                $updatedtb=DanhSachDiemTBHocKi::where('MaSV', $getmasvandhocki->MaSV)
                ->where('idhocki', $getmasvandhocki->idhocki)
                ->update([
                    'DiemTB' => round(($tichdiemandhk/$sumtchk),2),
                    'DiemTB4' => round(($tichdiemandhk4/$sumtchk),2),
                    'SoTC' =>$sumtchk,
                ]);
                // update diem tich luy
                $checktontaidiemtichluy   = DanhSachDiemTichLuy::where('MaSV', $getmasvandhocki->MaSV)->where('idhocki', $getmasvandhocki->idhocki)
                ->count();
                if($checktontaidiemtichluy>0)
                {
                    $updatedtb=DanhSachDiemTichLuy::where('MaSV', $getmasvandhocki->MaSV)
                    ->where('idhocki', $getmasvandhocki->idhocki)
                    ->update([
                    'SoTC' =>$sumtc,
                    'DiemTichLuy10' => round(($tichdiem/$sumtc),2),
                    'DiemTichLuy4' => round(($tichdiem4/$sumtc),2),

                ]);
                }
                else
                {
                    $updiemtichluy= new DanhSachDiemTichLuy();
                    $updiemtichluy->MaSV = $getmasvandhocki->MaSV;
                    $updiemtichluy->idhocki = $getmasvandhocki->idhocki;
                    $updiemtichluy->SoTC = $sumtc;
                    $updiemtichluy->DiemTichLuy10 = round(($tichdiem/$sumtc),2);
                    $updiemtichluy->DiemTichLuy4 = round(($tichdiem4/$sumtc),2);

                    $updiemtichluy->save();
                }

                return redirect()->back()->with('status', 'Nhận điểm thành công');
            }
            else
            {
                // create diem tb hocki
                $updiemtb= new DanhSachDiemTBHocKi();
                $updiemtb->MaSV = $getmasvandhocki->MaSV;
                $updiemtb->idhocki = $getmasvandhocki->idhocki;
                $updiemtb->DiemTB = round(($tichdiemandhk/$sumtchk),2);
                $updiemtb->DiemTB4 = round(($tichdiemandhk4/$sumtchk),2);
                $updiemtb->SoTC = $sumtchk;
                $updiemtb->save();
                //  create diem tich luy
                 $checktontaidiemtichluy   = DanhSachDiemTichLuy::where('MaSV', $getmasvandhocki->MaSV)->where('idhocki', $getmasvandhocki->idhocki)
                ->count();
                if($checktontaidiemtichluy>0)
                {
                    $updatedtb=DanhSachDiemTichLuy::where('MaSV', $getmasvandhocki->MaSV)
                    ->where('idhocki', $getmasvandhocki->idhocki)
                    ->update([
                    'SoTC' =>$sumtc,
                    'DiemTichLuy10' => round(($tichdiem/$sumtc),2),
                    'DiemTichLuy4' => round(($tichdiem4/$sumtc),2),

                ]);
                }
                else
                {
                    $updiemtichluy= new DanhSachDiemTichLuy();
                    $updiemtichluy->MaSV = $getmasvandhocki->MaSV;
                    $updiemtichluy->idhocki = $getmasvandhocki->idhocki;
                    $updiemtichluy->SoTC = $sumtc;
                    $updiemtichluy->DiemTichLuy10 = round(($tichdiem/$sumtc),2);
                    $updiemtichluy->DiemTichLuy4 = round(($tichdiem4/$sumtc),2);

                    $updiemtichluy->save();
                }
                return redirect()->back()->with('status', 'Nhận điểm thành công');
            }
        }
        else
        {
              return redirect()->back()->with('status', 'Không có sinh viên');
        }
    }else
    {
          return redirect()->back()->with('status', 'Error');
    }
    // return redirect()->back()->with('status', 'Nhận điểm thành công');
    }
    public function edituploaddiem($id)
    {

    }
    public function deleteuploaddiem($id)
    {
        $getmdk= DanhSachDiem::where('iddiem',$id)->first();
        $savemadk= $getmdk->MaDK;
        DanhSachDiem::find($id)->delete();
        $getmasvandhocki= DangKyHocPhan::join('dssinhvien', 'dssinhvien.MaSV', '=', 'dangkymonhoc.MaSV')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->where('MaDK', $savemadk)->first();

        $getdiemtb=DanhSachDiem::join('dangkymonhoc', 'dangkymonhoc.MaDK','=','dsdiem.MaDK')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->where('dangkymonhoc.MaSV', $getmasvandhocki->MaSV)
        ->where('mahocphan.idhocki', $getmasvandhocki->idhocki)->get();
        // dd($getdiemtb);
         $sumtchk =0;
         $sumdiem =0;
         $tichdiemandhk=0;
         $tichdiemandhk4=0;
        function tongdiem($diemtbm, $stcofd)
        {
            $tong= ($diemtbm*$stcofd);
            return $tong;
        }
        function tongdiem4($diemtbm4, $stcofd)
        {
            $tong4= ($diemtbm4*$stcofd);
            return $tong4;
        }
        if($getdiemtb->count()>0){
            foreach($getdiemtb as $loaddiemtbm)
            {
                $sumtchk += $loaddiemtbm['SoTinChi'];
                $sumdiem += $loaddiemtbm['DiemTBMon'];
                $tichdiemandhk += tongdiem($loaddiemtbm['SoTinChi'], $loaddiemtbm['DiemTBMon']);
                $tichdiemandhk4 += tongdiem4($loaddiemtbm['SoTinChi'], $loaddiemtbm['Diem4']);
            }
        $updatedtb=DanhSachDiemTBHocKi::where('MaSV', $getmasvandhocki->MaSV)
        ->where('idhocki', $getmasvandhocki->idhocki)
        ->update([
            'DiemTB' => round(($tichdiemandhk/$sumtchk),2),
            'DiemTB4' => round(($tichdiemandhk4/$sumtchk),2),
            'SoTC' =>$sumtchk,
        ]);

        return redirect()->back()->with('status', 'Bạn xóa điểm sinh viên  thành công');

        }
        else
        {
            echo "khong co sv";
        }

    }
    public function updateuploaddiem($id)
    {

    }
}
