<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhSachMonHoc;
use App\Models\HocPhi;
class DanhSachMonHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listmhs= DanhSachMonHoc::with('stc')->get();
        return view('admincp.dsmonhoc.index')->with(compact('listmhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stcs= HocPhi::all();
        return view('admincp.dsmonhoc.create')->with(compact('stcs'));
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
            'TenMonHoc' => 'required|unique:dsmonhoc|max:255',
            'HocKi' => 'required|max:255',
            'SoTinChi' => 'required|max:255',
            'LT' => 'required|max:255',
            'TH' => 'required|max:255',
            'TL' => 'required|max:255',
            'TT' => 'required|max:255',
        ],
        [
            'TenMonHoc.unique' => 'Tên Lớp đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'HocKi.required' => 'HocKi trong',
            'SoTinChi.required' => 'stc trong',
            'LT.required' => 'lt trong',
            'TH.required' => 'th trong',
            'TL.required' => 'tl trong',
            'TT.required' => 'tt trong',
        ]
    );
    $dsmonhoc = new DanhSachMonHoc();
    $dsmonhoc->TenMonHoc = $data['TenMonHoc'];
    $dsmonhoc->HocKi = $data['HocKi'];
    $dsmonhoc->SoTinChi = $data['SoTinChi'];
    $dsmonhoc->LT = $data['LT'];
    $dsmonhoc->TH = $data['TH'];
    $dsmonhoc->TL = $data['TL'];
    $dsmonhoc->TT = $data['TT'];
    $dsmonhoc->save();
    return redirect()->back()->with('status', 'Thêm Môn Học thành công');
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
        $stcs= HocPhi::all();
        $monhoc = DanhSachMonHoc::with('stc')->find($id);
        return view('admincp.dsmonhoc.edit')->with(compact('monhoc','stcs'));
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
            'TenMonHoc' => 'required|max:255',
            'HocKi' => 'required|max:255',
            'SoTinChi' => 'required|max:255',
            'LT' => 'required|max:255',
            'TH' => 'required|max:255',
            'TL' => 'required|max:255',
            'TT' => 'required|max:255',
        ],
        [
            'TenMonHoc.unique' => 'Tên Lớp đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'HocKi.required' => 'HocKi trong',
            'SoTinChi.required' => 'stc trong',
            'LT.required' => 'lt trong',
            'TH.required' => 'th trong',
            'TL.required' => 'tl trong',
            'TT.required' => 'tt trong',
        ]
    );
    $dsmonhoc = DanhSachMonHoc::find($id);
    $dsmonhoc->TenMonHoc = $data['TenMonHoc'];
    $dsmonhoc->HocKi = $data['HocKi'];
    $dsmonhoc->SoTinChi = $data['SoTinChi'];
    $dsmonhoc->LT = $data['LT'];
    $dsmonhoc->TH = $data['TH'];
    $dsmonhoc->TL = $data['TL'];
    $dsmonhoc->TT = $data['TT'];
    $dsmonhoc->save();
    return redirect()->back()->with('status', 'Cập nhật Môn Học thành công');
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
        DanhSachMonHoc::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa môn học thành công thành công');
    }
}
