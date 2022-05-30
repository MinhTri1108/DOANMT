<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminAccounts;
class AdminAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $listadminaccounts = AdminAccounts::all();

        return view('admincp.adminaccounts.index')->with(compact('listadminaccounts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admincp.adminaccounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //     $data= $request->validate([
    //         'fname' => 'required|max:255',
    //         'lname' => 'required|max:255',
    //         'password' => 'required|max:255',
    //         'NgaySinh' => 'required|max:255',
    //         'cccd' => 'required|max:255',
    //         'GioiTinh' => 'required|max:255',
    //         'DiaChi' => 'required|max:255',
    //         'SDT' => 'required|max:255',
    //         'Email' => 'required|max:255',
    //         'avatar' => 'required|max:255',
    //     ]
    // );
    $file = $request->file('avatar');
    $path= $file->move('avatar', $file->getClientOriginalName());
    $file_name = pathinfo($path, PATHINFO_FILENAME);
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    $filename=$file_name.'.'.$extension;

    $status = 'Offline now';

    $adminaccounts = new AdminAccounts();
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
    $adminaccounts->idloaitk = 1;
    $adminaccounts->save();
    return redirect()->back()->with('status', 'Thêm AccountAdmin thành công');
    // dd($adminaccounts);
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
        AdminAccounts::find($id)->delete();
        return redirect()->back()->with('status', 'Bạn xóa tài khoản thành công thành công');
    }
}
