<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollegeStudentAccounts;
use App\Models\LecturersAccounts;
use App\Models\ThongBaoSV;
use App\Models\ThongBaoGV;
class SendNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tbsvs=ThongBaoSV::all();
        $tbgvs=ThongBaoGV::all();
        return view('admincp.sendnotifications.index')->with(compact('tbsvs', 'tbgvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dssvs=CollegeStudentAccounts::all();
        $dsgvs=LecturersAccounts::all();
        return view('admincp.sendnotifications.create')->with(compact('dssvs', 'dsgvs'));
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
    //     $data= $request->validate([
    //         'MaAdmin' => 'required|max:255',
    //         'MaSV' => 'required|max:255',
    //         'MaGV' => 'required|max:255',
    //         'NoiDung' => 'required|max:255',
    //     ],
    //     // [
    //     //     'TenKhoa.unique' => 'Tên Khoa đã có vui lòng đặt tên khác. Cảm ơn!!!',
    //     //     'slug_khoa.required' => 'Teen khoa trong',
    //     //     'TenKhoa.required' => 'Teen khoa trong',
    //     //     'TenKhoa.required' => 'Teen khoa trong',
    //     // ]
    // );
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if($request->MaSV != NULL)
    {
        $timestamp = time();
        $thoigian = date ("Y-m-d H:i:s", $timestamp);
        $status = 1;
        $sendtb = new ThongBaoSV();
        $sendtb->MaAdmin = $request->MaAdmin;
        $sendtb->NoiDung =  $request->NoiDung;
        $sendtb->MaSV =  $request->MaSV;
        $sendtb->ThoiGian = $thoigian;
        $sendtb->status = $status;
        $sendtb->save();
        return redirect()->back()->with('status', 'Gửi thông báo sinh viên thành công');
    }
    else if($request->MaGV != NULL)
    {
        $timestamp = time();
        $thoigian = date ("Y-m-d H:i:s", $timestamp);
        $status = 1;
        $sendtb = new ThongBaoGV();
        $sendtb->MaAdmin = $request->MaAdmin;
        $sendtb->NoiDung = $request->NoiDung;
        $sendtb->MaGV = $request->MaGV;
        $sendtb->ThoiGian = $thoigian;
        $sendtb->status = $status;
        $sendtb->save();
        return redirect()->back()->with('status', 'Gửi thông báo giảng viên thành công');
    }
    else{
         return redirect()->back()->with('status', 'Gửi thông báo không thành công');
    }
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
    public function destroy(Request $request,$id)
    {
        if($request->tbsv != NULL)
        {
            ThongBaoSV::find($id)->delete();
            return redirect()->back()->with('status', 'Bạn xóa thông báo thành công');
        }
        else if($request->tbgv != NULL)
        {
            ThongBaoGV::find($id)->delete();
            return redirect()->back()->with('status', 'Bạn xóa thông báo thành công');
        }

    }
}
