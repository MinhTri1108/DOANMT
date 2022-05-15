<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LichHoc;
use App\Models\HocPhan;
use App\Models\DanhSachMonHoc;
use App\Models\LecturersAccounts;
use App\Models\HocKi;
class TaoHocPhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listlichhocs= LichHoc::with('hocphan', 'thu', 'tiethoc', 'phong')->orderBy('idlichhoc', 'ASC')->get();
        $hocphans= HocPhan::with('magv', 'monhoc')->get();
        $hps = HocPhan::join('dsgiaovien', 'dsgiaovien.MaGV', '=', 'mahocphan.MaGV')
        ->join('quyen', 'quyen.idloaitk', '=', 'dsgiaovien.idloaitk')
        ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')->get();
        return view('admincp.createhp.index')->with(compact('hocphans', 'listlichhocs','hps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $gvs= LecturersAccounts::with('permission')->get();
        $mhs= DanhSachMonHoc::all();
        $hocki=HocKi::with('namhoc')->get();
        return view('admincp.createhp.create')->with(compact('gvs', 'mhs','hocki'));
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
            'MaGV' => 'required|unique:mahocphan|max:255',
            'MaMonHoc' => 'required|max:255',
        ],
        [
            'MaGV.unique' => 'Tên Khoa đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'MaMonHoc.required' => 'Teen khoa trong',
        ]
    );
    $dshp = new HocPhan();
    $dshp->MaGV = $data['MaGV'];
    $dshp->MaMonHoc = $data['MaMonHoc'];
    $dshp->save();
    return redirect()->back()->with('status', 'Thêm học phần thành công');
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
        $gvs= LecturersAccounts::with('permission')->get();
        $mhs= DanhSachMonHoc::all();
        $hocphan = HocPhan::join('dsgiaovien', 'dsgiaovien.MaGV', '=', 'mahocphan.MaGV')
        ->join('quyen', 'quyen.idloaitk', '=', 'dsgiaovien.idloaitk')
        ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')->find($id);
        // $hocphan = HocPhan::with('monhoc', 'magv')->find($id);
        return view('admincp.createhp.edit')->with(compact('gvs', 'mhs', 'hocphan'));
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
            'MaGV' => 'required|max:255',
            'MaMonHoc' => 'required|max:255',
        ],
        [
            'MaGV.unique' => 'trog đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'MaMonHoc.required' => 'Teen khoa trong',
        ]
    );
    $dshp = HocPhan::find($id);
    $dshp->MaGV = $data['MaGV'];
    $dshp->MaMonHoc = $data['MaMonHoc'];
    $dshp->save();
    return redirect()->back()->with('status', 'Cập nhật học phần thành công');
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
        HocPhan::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa Học phần thành công');
    }
}
