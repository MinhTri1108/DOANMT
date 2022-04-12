<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhSachKhoaHoc;
use App\Models\HeDaoTao;
use App\Models\DanhSachKhoa;
use App\Models\DanhSachLop;
class DanhSachLopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $listlops = DanhSachLop::orderBy('MaLop', 'ASC')->get();

        return view('admincp.dslop.index')->with(compact('listlops'));
        // return view('admincp.dslop.index')->with(compact('listlops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listkhoahocs = DanhSachKhoaHoc::orderBy('MaKhoaHoc', 'ASC')->get();
        $listhdts = HeDaoTao::orderBy('MaHeDT', 'ASC')->get();
        $listkhoas = DanhSachKhoa::orderBy('MaKhoa', 'ASC')->get();
        return view('admincp.dslop.create')->with(compact('listkhoas','listkhoahocs', 'listhdts'));
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
        $data= $request->validate([
            'TenLop' => 'required|unique:dslop|max:255',
            'slug_lop' => 'required|max:255',
            'MaKhoa' => 'required|max:255',
            'MaKhoaHoc' => 'required|max:255',
            'MaHeDT' => 'required|max:255',
        ],
        [
            'TenLop.unique' => 'Tên Lớp đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'slug_lop.required' => 'slug_lop trong',
            'MaKhoa.required' => 'TMaKhoa trong',
            'MaKhoaHoc.required' => 'MaKhoaHoc trong',
            'MaHeDT.required' => 'MaHeDT trong',
        ]
    );
    $danhsachlop = new DanhSachLop();
    $danhsachlop->TenLop = $data['TenLop'];
    $danhsachlop->slug_lop = $data['slug_lop'];
    $danhsachlop->MaKhoa = $data['MaKhoa'];
    $danhsachlop->MaKhoaHoc = $data['MaKhoaHoc'];
    $danhsachlop->MaHeDT = $data['MaHeDT'];
    $danhsachlop->save();
    return redirect()->back()->with('status', 'Thêm Lớp thành công');
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
        $lop =DanhSachLop::with('khoa', 'khoahoc', 'hedaotao')->find($id);
        // $lop = DanhSachLop::with('khoa', 'khoahoc', 'hedaotao')->where($id)->orderBy('MaLop', 'DESC')->get();
        $listkhoahocs = DanhSachKhoaHoc::orderBy('MaKhoaHoc', 'ASC')->get();
        $listhdts = HeDaoTao::orderBy('MaHeDT', 'ASC')->get();
        $listkhoas = DanhSachKhoa::orderBy('MaKhoa', 'ASC')->get();
        return view('admincp.dslop.edit')->with(compact('listkhoas','listkhoahocs', 'listhdts','lop'));
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
        $data= $request->validate([
            'TenLop' => 'required|max:255',
            'slug_lop' => 'required|max:255',
            'MaKhoa' => 'required|max:255',
            'MaKhoaHoc' => 'required|max:255',
            'MaHeDT' => 'required|max:255',
        ],
        [
            'TenLop.unique' => 'Tên Lớp đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'slug_lop.required' => 'slug_lop trong',
            'MaKhoa.required' => 'TMaKhoa trong',
            'MaKhoaHoc.required' => 'MaKhoaHoc trong',
            'MaHeDT.required' => 'MaHeDT trong',
        ]
    );
    $danhsachlop = DanhSachLop::find($id);
    $danhsachlop->TenLop = $data['TenLop'];
    $danhsachlop->slug_lop = $data['slug_lop'];
    $danhsachlop->MaKhoa = $data['MaKhoa'];
    $danhsachlop->MaKhoaHoc = $data['MaKhoaHoc'];
    $danhsachlop->MaHeDT = $data['MaHeDT'];
    $danhsachlop->save();
     return redirect()->back()->with('status', 'Cập nhật khoa thành công');
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
        DanhSachLop::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa lớp thành công');
    }
    public function lop($slug)
    {
        $lop_id= DanhSachLop::where('slug_lop', $slug)->with('khoa')->first();
        // $listlops = DanhSachLop::with('khoa', 'khoahoc', 'hedaotao')->where('MaKhoa', $khoa_id->MaKhoa)->orderBy('MaLop', 'DESC')->get();
        return view('admincp.dssvoflop.index')->with(compact('lop_id'));
    }
}
