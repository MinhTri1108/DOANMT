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

    $adminaccounts = new LecturersAccounts();
    $adminaccounts->fname = $request->input('fname');
    $adminaccounts->lname = $request->input('lname');
    $adminaccounts->password = $request->input('password');
    $adminaccounts->NgaySinh = $request->input('NgaySinh');
    $adminaccounts->cccd = $request->input('cccd');
    $adminaccounts->GioiTinh = $request->input('GioiTinh');
    $adminaccounts->DiaChi =$request->input('DiaChi');
    $adminaccounts->SDT = $request->input('SDT');
    $adminaccounts->Email = $request->input('Email');
    $adminaccounts->Status = $status;
    $adminaccounts->avatar = $filename;
    $adminaccounts->idloaitk = 2;
    $adminaccounts->save();
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
         LecturersAccounts::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa tài khoản thành công thành công');
    }
}
