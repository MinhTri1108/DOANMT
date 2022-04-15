<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LichLamViec;
class SukienHoatDongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lichlvs=LichLamViec::all();
        return view('admincp.sukienhoatdong.index')->with(compact('lichlvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admincp.sukienhoatdong.create');
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
            'MaAdmin' => 'required|max:255',
            'images' => 'required|max:255',
            'link' => 'required|max:255',
            'NoiDung' => 'required|max:255',
            'DiaDiem' => 'required|max:255',
            'Ngay' => 'required|max:255',
            'Gio' => 'required|max:255',
            'GhiChu' => 'required|max:255',
        ],
        [
            'MaAdmin.unique' => 'Tên Lớp đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'images.required' => 'slug_lop trong',
            'link.required' => 'TMaKhoa trong',
            'NoiDung.required' => 'MaKhoaHoc trong',
            'DiaDiem.required' => 'MaHeDT trong',
            'Ngay.required' => 'slug_lop trong',
            'Gio.required' => 'TMaKhoa trong',
            'GhiChu.required' => 'MaKhoaHoc trong',
        ]
    );
    $skienhdong = new LichLamViec();
    $skienhdong->MaAdmin = $data['MaAdmin'];
    $skienhdong->images = $data['images'];
    $skienhdong->link = $data['link'];
    $skienhdong->NoiDung = $data['NoiDung'];
    $skienhdong->DiaDiem = $data['DiaDiem'];
    $skienhdong->Ngay = $data['Ngay'];
    $skienhdong->Gio = $data['Gio'];
    $skienhdong->GhiChu = $data['GhiChu'];
    $skienhdong->save();
    return redirect()->back()->with('status', 'Thêm hoạt động sự kiện thành công');
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
        $lichlv=LichLamViec::with('admin')->find($id);
        return view('admincp.sukienhoatdong.edit')->with(compact('lichlv'));
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
            'MaAdmin' => 'required|max:255',
            'images' => 'required|max:255',
            'link' => 'required|max:255',
            'NoiDung' => 'required|max:255',
            'DiaDiem' => 'required|max:255',
            'Ngay' => 'required|max:255',
            'Gio' => 'required|max:255',
            'GhiChu' => 'required|max:255',
        ],
        [
            'MaAdmin.unique' => 'Tên Lớp đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'images.required' => 'slug_lop trong',
            'link.required' => 'TMaKhoa trong',
            'NoiDung.required' => 'MaKhoaHoc trong',
            'DiaDiem.required' => 'MaHeDT trong',
            'Ngay.required' => 'slug_lop trong',
            'Gio.required' => 'TMaKhoa trong',
            'GhiChu.required' => 'MaKhoaHoc trong',
        ]
    );
    $skienhdong = LichLamViec::find($id);
    $skienhdong->MaAdmin = $data['MaAdmin'];
    $skienhdong->images = $data['images'];
    $skienhdong->link = $data['link'];
    $skienhdong->NoiDung = $data['NoiDung'];
    $skienhdong->DiaDiem = $data['DiaDiem'];
    $skienhdong->Ngay = $data['Ngay'];
    $skienhdong->Gio = $data['Gio'];
    $skienhdong->GhiChu = $data['GhiChu'];
    $skienhdong->save();
    return redirect()->back()->with('status', 'Thêm hoạt động sự kiện thành công');
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
        LichLamViec::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa hoạt động sự kiện thành công');
    }
}
