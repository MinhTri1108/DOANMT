<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollegeStudentAccounts;
use App\Models\DanhSachLop;
class CollegeStudentAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $listcollegestudentaccounts = CollegeStudentAccounts::with('permission', 'lop')->get();
        $lops = DanhSachLop::all();
        return view('admincp.collegestudentaccounts.index')->with(compact('listcollegestudentaccounts', 'lops'));
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
        $file = $request->file('avatar');
        $path= $file->move('avatar', $file->getClientOriginalName());
        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename=$file_name.'.'.$extension;

        $status = 'Offline now';

        $collegestudentaccounts = new CollegeStudentAccounts();
        $collegestudentaccounts->fname = $request->input('fname');
        $collegestudentaccounts->lname = $request->input('lname');
        $collegestudentaccounts->password = $request->input('password');
        $collegestudentaccounts->NgaySinh = $request->input('date');
        $collegestudentaccounts->cccd = $request->input('cccd');
        $collegestudentaccounts->GioiTinh = $request->input('sex');
        $collegestudentaccounts->DiaChi =$request->input('address');
        $collegestudentaccounts->SDT = $request->input('phone');
        $collegestudentaccounts->Email = $request->input('email');
        $collegestudentaccounts->Status = $status;
        $collegestudentaccounts->avatar = $filename;
        $collegestudentaccounts->idloaitk = 3;
        $collegestudentaccounts->MaLop = $request->input('malop');
        // dd($request->all());
        $collegestudentaccounts->save();
        return redirect()->back()->with('status', 'Thêm Account Sinh Viên thành công');
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
        //a
        $acc = CollegeStudentAccounts::where('MaSV', $id)->with('lop')->first();
        $lops = DanhSachLop::all();
        return view('admincp.collegestudentaccounts.edit')->with(compact('acc', 'lops'));

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
        $collegestudentaccounts = CollegeStudentAccounts::find($id);
        $collegestudentaccounts->fname = $request->input('fname');
        $collegestudentaccounts->lname = $request->input('lname');
        $collegestudentaccounts->password = $request->input('password');
        $collegestudentaccounts->NgaySinh = $request->input('ngaysinh');
        $collegestudentaccounts->cccd = $request->input('cccd');
        $collegestudentaccounts->GioiTinh = $request->input('gioitinh');
        $collegestudentaccounts->DiaChi =$request->input('diachi');
        $collegestudentaccounts->SDT = $request->input('sdt');
        $collegestudentaccounts->Email = $request->input('email');
        $collegestudentaccounts->MaLop = $request->input('malop');
        // $adminaccounts->Status = $status;
        // $adminaccounts->avatar = $filename;
        // $adminaccounts->idloaitk = 1;
        $collegestudentaccounts->save();
        return redirect()->back()->with('status', 'Sửa Tài khoản thành công');
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
         CollegeStudentAccounts::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa tài khoản thành công thành công');
    }
}
