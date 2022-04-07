<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhSachKhoa;
use App\Models\DanhSachLop;
class DanhSachKhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listkhoas = DanhSachKhoa::orderBy('MaKhoa', 'ASC')->get();

        return view('admincp.dskhoa.index')->with(compact('listkhoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admincp.dskhoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'TenKhoa' => 'required|unique:dskhoa|max:255',
            'slug_khoa' => 'required|max:255',
            'DiaChiKhoa' => 'required|max:255',
            'SDTKhoa' => 'required|max:255',
        ],
        [
            'TenKhoa.unique' => 'Tên Khoa đã có vui lòng đặt tên khác. Cảm ơn!!!',
            'slug_khoa.required' => 'Teen khoa trong',
            'TenKhoa.required' => 'Teen khoa trong',
            'TenKhoa.required' => 'Teen khoa trong',
        ]
    );
    $danhsachkhoa = new DanhSachKhoa();
    $danhsachkhoa->TenKhoa = $data['TenKhoa'];
    $danhsachkhoa->slug_khoa = $data['slug_khoa'];
    $danhsachkhoa->DiaChiKhoa = $data['DiaChiKhoa'];
    $danhsachkhoa->SDTKhoa = $data['SDTKhoa'];
    $danhsachkhoa->save();
    return redirect()->back()->with('status', 'Thêm khoa thành công');
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
        $khoa =DanhSachKhoa::find($id);
        return view('admincp.dskhoa.edit')->with(compact('khoa'));

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
            'TenKhoa' => 'required|max:255',
            'slug_khoa' => 'required|max:255',
            'DiaChiKhoa' => 'required|max:255',
            'SDTKhoa' => 'required|max:255',
        ],
        [
            'TenKhoa.required' => 'Null ',
            'slug_khoa.required' => 'Teen khoa trong',
            'TenKhoa.required' => 'Teen khoa trong',
            'TenKhoa.required' => 'Teen khoa trong',
        ]
    );
    $danhsachkhoa = DanhSachKhoa::find($id);
    $danhsachkhoa->TenKhoa = $data['TenKhoa'];
    $danhsachkhoa->slug_khoa = $data['slug_khoa'];
    $danhsachkhoa->DiaChiKhoa = $data['DiaChiKhoa'];
    $danhsachkhoa->SDTKhoa = $data['SDTKhoa'];
    $danhsachkhoa->save();
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
        DanhSachKhoa::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa khoa thành công');
    }
    public function khoa($id)
    {
        // return view('admincp.dslop.index');
        $listlops = DanhSachLop::with('khoa', 'khoahoc', 'hedaotao')->orderBy('MaLop', 'DESC')->get();

        // dd($listlops);
        return view('admincp.dslop.index')->with(compact('listlops'));
    }
}
