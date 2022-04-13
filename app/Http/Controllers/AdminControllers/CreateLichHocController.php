<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThuNgay;
use App\Models\DanhSachTietHoc;
use App\Models\DanhSachPhongHoc;
use App\Models\HocPhan;
use App\Models\LichHoc;
class CreateLichHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $thus=ThuNgay::all();
        $phongs=DanhSachPhongHoc::all();
        $tiethocs=DanhSachTietHoc::all();
        $hocphans=HocPhan::all();
        return view('admincp.createhp.createlh')->with(compact('thus','phongs','tiethocs','hocphans'));
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
            'idhocphan' => 'required|max:255',
            'idthu' => 'required|max:255',
            'idtiethoc' => 'required|max:255',
            'idphong' => 'required|max:255',
        ],
        [
            'idhocphan.unique' => 'id lich hoc đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'idthu.required' => 'id thu trong',
            'idtiethoc.unique' => 'id tiethoc đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'idphong.required' => 'idphong trong',
        ]
    );
    $dslichhoc = new LichHoc();
    $dslichhoc->idhocphan = $data['idhocphan'];
    $dslichhoc->idthu = $data['idthu'];
    $dslichhoc->idtiethoc = $data['idtiethoc'];
    $dslichhoc->idphong = $data['idphong'];
    $dslichhoc->save();
    return redirect()->back()->with('status', 'Thêm lịch học thành công');
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
        LichHoc::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa lịch học thành công');
    }
}
