<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollegeStudentAccounts;
use App\Models\DanhSachDiem;
use App\Models\HocPhan;
use App\Models\DanhSachMonHocCuaLop;
use App\Models\DanhSachDiemTBHocKi;
use App\Models\DanhSachDiemTichLuy;
class BangDiemSVController extends Controller
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
        // $diem =DanhSachDiem::all();
        $diem =DanhSachDiem::join('dangkymonhoc', 'dangkymonhoc.MaDK', '=', 'dsdiem.MaDK')
        ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->where('dangkymonhoc.MaSV', $profilesv->MaSV)->get();
        $hocki= DanhSachMonHocCuaLop::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'monhoccualop.MaMonHoc')
        ->join('mahocphan', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('dangkymonhoc', 'dangkymonhoc.idhocphan', '=', 'mahocphan.idhocphan')
        ->where('dangkymonhoc.MaSV', $profilesv->MaSV)->distinct('monhoccualop.idhocki')->count('idhocki');
        $diemtbhk= DanhSachDiemTBHocKi::where('MaSV', $idsv)->get();
        $diemtichluy= DanhSachDiemTichLuy::where('MaSV', $idsv)->get();
        // dd($diemtbhk);
        // $stcdat=DanhSachDiem::join('dangkymonhoc', 'dangkymonhoc.MaDK', '=', 'dsdiem.MaDK')
        // ->join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')
        // ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        // ->where('dangkymonhoc.MaSV', $profilesv->MaSV)->get();
        return view('collegestudentcp.marks.index')->with(compact('profilesv', 'diem', 'hocki', 'diemtbhk', 'diemtichluy'));
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
