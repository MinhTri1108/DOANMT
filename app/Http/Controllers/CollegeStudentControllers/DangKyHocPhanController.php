<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollegeStudentAccounts;
use App\Models\HocPhan;
use App\Models\LichHoc;
use App\Models\DangKyHocPhan;
use App\Models\DanhSachMonHocCuaLop;
use Cookie;
class DangKyHocPhanController extends Controller
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
        // DangKyHocPhan::join('mahocphan', 'mahocphan.idhocphan', '=', 'dangkymonhoc.idhocphan')

        $dangkyhocphan=HocPhan::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->join('dsgiaovien', 'dsgiaovien.MaGV', '=', 'mahocphan.MaGV')
        ->join('monhoccualop', 'monhoccualop.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->where('monhoccualop.MaLop', $profilesv->MaLop)
        ->orderBy('idhocphan')
        ->get();

        $hocki= DanhSachMonHocCuaLop::join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'monhoccualop.MaMonHoc')
        ->join('mahocphan', 'mahocphan.MaMonHoc', '=', 'dsmonhoc.MaMonHoc')
        ->join('dangkymonhoc', 'dangkymonhoc.idhocphan', '=', 'mahocphan.idhocphan')
        ->where('dangkymonhoc.MaSV', $profilesv->MaSV)->distinct('monhoccualop.HocKi')->count('HocKi');
        // $i=3;
        $lichhoc= LichHoc::join('thungay', 'thungay.idthu', '=', 'lichhoc.idthu')
        ->join('dstiethoc', 'dstiethoc.idtiethoc', '=', 'lichhoc.idtiethoc')
        ->join('dsphonghoc', 'dsphonghoc.idphong', '=', 'lichhoc.idphong')->orderBy('idhocphan')->get();
        // $dem=LichHoc::where('idhocphan', $i)->count('idhocphan');
        // dd($dem);
        $dem=LichHoc::count('idhocphan');

        //  Cookie::queue('check','nooo' ,30);
        $checkdangky= DangKyHocPhan::where('MaSV', $profilesv->MaSV)->get();
        dd($checkdangky);
        // return view('collegestudentcp.dangkyhocphan.index')->with(compact('profilesv', 'dangkyhocphan', 'hocki', 'lichhoc','dem', 'checkdangky'));
        // echo Cookie::get('check');
        // join('mahocphan', 'lichhoc.idhocphan', '=', 'mahocphan.idhocphan')
        // ->
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
        return 'cc';
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
			DangKyHocPhan::destroy($id);
    }
}
