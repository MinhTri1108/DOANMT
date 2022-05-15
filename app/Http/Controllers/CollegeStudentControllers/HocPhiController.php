<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhSachMonHocCuaLop;
use App\Models\DanhSachMonHoc;
use App\Models\DangKyHocPhan;
use App\Models\HocPhan;
use App\Models\CollegeStudentAccounts;
class HocPhiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $idsv = $request->session()->get('id_sv');
        $profilesv = CollegeStudentAccounts::where('MaSV', $idsv)->with('lop')->first();
        // $counthk= HocPhan::distinct('HocKi')->join('dangkymonhoc', 'dangkymonhoc.idhocphan', '=', 'mahocphan.idhocphan')
        // ->where('dangkymonhoc.MaSV',$profilesv->MaSV)
        // ->count('HocKi');

        $counthk= DanhSachMonHocCuaLop::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'monhoccualop.MaMonHoc')
        ->join('mahocphan', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('dangkymonhoc', 'dangkymonhoc.idhocphan', '=', 'mahocphan.idhocphan')
        ->where('dangkymonhoc.MaSV', $profilesv->MaSV)->distinct('monhoccualop.idhocki')->count('idhocki');
        // $hocphis= DanhSachMonHocCuaLop::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'monhoccualop.MaMonHoc')
        // ->join('hocphi', 'dsmonhoc.SoTinChi', '=', 'hocphi.SoTinChi')
        // ->where('monhoccualop.MaLop', $profilesv->MaLop)->get();
        $hocphis=DangKyHocPhan::join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->join('dsmonhoc','dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->join('hocphi', 'dsmonhoc.SoTinChi', '=', 'hocphi.SoTinChi')
        ->join('dssinhvien', 'dssinhvien.MaSV', '=', 'dangkymonhoc.MaSV')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('dssinhvien.MaLop', $profilesv->MaLop)
        ->where('dangkymonhoc.MaSV', $profilesv->MaSV)
        ->get();
        //  dd($hocphis);
        // dd($profilesv->MaSV);
        return view('collegestudentcp.hocphi.index')->with(compact('hocphis', 'profilesv', 'counthk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
