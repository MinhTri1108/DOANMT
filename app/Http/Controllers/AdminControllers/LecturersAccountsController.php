<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LecturersAccounts;
class LecturersAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listlecturersaccounts = LecturersAccounts::all();

        return view('admincp.lecturersaccounts.index')->with(compact('listlecturersaccounts'));
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

    $lecturersaccounts = new LecturersAccounts();
    $lecturersaccounts->fname = $request->input('fname');
    $lecturersaccounts->lname = $request->input('lname');
    $lecturersaccounts->password = $request->input('password');
    $lecturersaccounts->NgaySinh = $request->input('NgaySinh');
    $lecturersaccounts->cccd = $request->input('cccd');
    $lecturersaccounts->GioiTinh = $request->input('GioiTinh');
    $lecturersaccounts->DiaChi =$request->input('DiaChi');
    $lecturersaccounts->SDT = $request->input('SDT');
    $lecturersaccounts->Email = $request->input('Email');
    $lecturersaccounts->Status = $status;
    $lecturersaccounts->avatar = $filename;
    $lecturersaccounts->idloaitk = 2;
    $lecturersaccounts->save();
    return redirect()->back()->with('status', 'Thêm LecturersAccount thành công');
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
        $acc = LecturersAccounts::find($id);
        return view('admincp.lecturersaccounts.edit')->with(compact('acc'));
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
        $lecturersaccounts = Lecturersaccounts::find($id);
        $lecturersaccounts->fname = $request->input('fname');
        $lecturersaccounts->lname = $request->input('lname');
        $lecturersaccounts->password = $request->input('password');
        $lecturersaccounts->NgaySinh = $request->input('ngaysinh');
        $lecturersaccounts->cccd = $request->input('cccd');
        $lecturersaccounts->GioiTinh = $request->input('gioitinh');
        $lecturersaccounts->DiaChi =$request->input('diachi');
        $lecturersaccounts->SDT = $request->input('sdt');
        $lecturersaccounts->Email = $request->input('email');
        // $lecturersaccounts->Status = $status;
        // $lecturersaccounts->avatar = $filename;
        // $lecturersaccounts->idloaitk = 1;
        $lecturersaccounts->save();
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
         LecturersAccounts::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa tài khoản thành công thành công');
    }
}
