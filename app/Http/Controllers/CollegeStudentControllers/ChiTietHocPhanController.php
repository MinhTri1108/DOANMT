<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HocPhan;
use App\Models\HocKi;
use App\Models\NamHoc;
use App\Models\DiemDanhSV;
use App\Models\DangKyHocPhan;
use Storage;
class ChiTietHocPhanController extends Controller
{
    //
    public function qlchitiethp(Request $request)
    {
        $namhoc = NamHoc::all();
        return view('collegestudentcp.componenthocphan.index')->with(compact('namhoc'));
    }
    public function qlchitiethpnamhoc(Request $request)
    {
        $namhoccd = NamHoc::find($request->id);

        $namhoc = NamHoc::all();
        $hocki = HocKi::where('idnamhoc', $request->id)->orderBy('HocKi','ASC')->get();
        return view('collegestudentcp.componenthocphan.namhoc')->with(compact('hocki', 'namhoccd', 'namhoc'));
    }
    public function qlchitiethphocki(Request $request)
    {
        $namhoc = NamHoc::all();
        $idhocki = $request->id;
        $hocki = HocKi::orderBy('HocKi','ASC')->get();
        // $hocki= HocKi::distinct('HocKi')->orderBy('HocKi','ASC')->get();
        $idsv = $request->session()->get('id_sv');
        $hockiht= HocKi::where('idhocki', $request->id)->with('namhoc')->orderBy('HocKi','ASC')->first();
        $monhocs = DangKyHocPhan::join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->where('dangkymonhoc.MaSV', $idsv)->where('mahocphan.idhocki', $idhocki)
        ->get();
        return view('collegestudentcp.componenthocphan.hocki')->with(compact('hockiht','namhoc','hocki', 'monhocs'));
    }
    public function qlchitiet($id, Request $request)
    {
        $tenhocphan= HocPhan::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->where('idhocphan', $id)->first();

        return view('collegestudentcp.componenthocphan.luachon')->with(compact('tenhocphan'));
    }
    // public function tailieumonhoc($id, Request $request)
    // {
    //     $tenhocphan = HocPhan::with('monhoc')->where('idhocphan', $id)->first();
    //     return view('collegestudentcp.componenthocphan.tailieu')->with(compact('tenhocphan'));
    // }
     public function listfiletoawssv(Request $request, $id)
    {
        $lophocphan=HocPhan::where('idhocphan', $id)->with('monhoc')->first();
        $files = Storage::disk('s3')->files($id);

        $data = [];
        foreach($files as $file) {
            $data[] = [
                'name' => basename($file),
                'downloadUrl' => url('/collegestudent/QuanLyChiTietCacHocPhan/DownloadFileToAWS/'.base64_encode($file)),
                // 'removeUrl' => url('/lecturers/GroupLop/DeleteFileToAWS/'.base64_encode($file)),
            ];
        }
        // dd($files);
        return view('collegestudentcp.componenthocphan.tailieu', ['files' => $data])->with(compact('lophocphan'));
    }
    public function downloadfiletoawssv($file)
    {
        $file = base64_decode($file);
        $name = basename($file);
        $header = [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'inline; filename="'.$name.'"'
        ];
        // dd($file);
        $files =Storage::disk('s3')->download($file, $name);
        // // dd();
        // // return response()->download($files,$name);
        return $files;
        // return back()->withSuccess('File downloaded successfully');
        // $filename = 'test.pdf';
        // $filePath = storage_path($file);



        // return Response::make(file_get_contents($filePath), 200, $header);
        // dd(Storage::disk('s3')->download($file, $name, $header));
    }
    // public function deletefiletoaws($file)
    // {
    //     $file = base64_decode($file);
    //     Storage::disk('s3')->delete($file);

    //     return back()->withSuccess('File was deleted successfully');
    // }

    public function sobuoihoc($id, Request $request)
    {
        $idsv = $request->session()->get('id_sv');
        $tenhocphan = HocPhan::with('monhoc')->where('idhocphan', $id)->first();
        $diemdanh= DiemDanhSV::join('dangkymonhoc', 'dangkymonhoc.MaDK', '=', 'diemdanh.MaDK')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->where('dangkymonhoc.idhocphan', $id)->where('dangkymonhoc.MaSV', $idsv)
        ->get();
        if($diemdanh->count()>0)
        {
            $demsobuoihoc = DiemDanhSV::where('MaDK', $diemdanh->first()->MaDK)->where('DiemDanh', 1)->count();
            $demsobuoinghi = DiemDanhSV::where('MaDK', $diemdanh->first()->MaDK)->where('DiemDanh', 0)->count();
        }
        else
        {
            $demsobuoihoc=0;
            $demsobuoinghi=0;
        }
        // dd($demsobuoihoc);
        return view('collegestudentcp.componenthocphan.diemdanh')->with(compact('tenhocphan','diemdanh', 'demsobuoihoc', 'demsobuoinghi'));
    }
}
