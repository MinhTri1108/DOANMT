<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use Carbon\Carbon;
use App\Models\LichLamViec;
use App\Models\CollegeStudentAccounts;
use App\Models\ChatForum;
use App\Models\DanhSachLop;
class HomeSVController extends Controller
{
    //
    public function index()
    {
         $chat = ChatForum::all();
        $lichs=LichLamViec::with('admin')->get();
        return view('collegestudentcp.index')->with(compact('lichs', 'chat'));
    }
    public function profilesv($id, Request $request)
    {
        $profilesv= CollegeStudentAccounts::where('MaSV', $id)->with('permission', 'lop')->first();
        $thongtinkhoahoc = DanhSachLop::where('MaLop', $profilesv->MaLop)->with('khoa', 'khoahoc', 'hedaotao')->first();
        return view('collegestudentcp.profile.index')->with(compact('profilesv', 'thongtinkhoahoc'));
        // dd($thongtinkhoahoc);
    }
    public function updateprofilesv($id, Request $request)
    {
        $data= $request->validate([
            'avatar' =>'required|max:255',
            'MaSV' => 'required|max:255',
            'fname' => 'required|max:255',
            'lname'  => 'required|max:255',
            'NgaySinh' => 'required|max:255',
            'cccd'  => 'required|max:255',
            'GioiTinh' => 'required|max:255',
            'Email' => 'required|max:255',
            'DiaChi' => 'required|max:255',
            'SDT' => 'required|max:255',
        ],
        [
            'MaSV.required' => 'MaGV trong ',
            'fname.required' => ' fname trong',
            'lname.required' => ' lname trong',
            'NgaySinh.required' => ' NgaySinh trong',
            'cccd.required' => 'cccd trong',
            'GioiTinh.required' => ' fname trong',
            'Email.required' => ' lname trong',
            'DiaChi.required' => ' NgaySinh trong',
            'SDT.required' => ' NgaySinh trong',
        ]);
        print_r($data);
        // $thongtingv= LecturersAccounts::find($id);
        // $thongtingv->avatar = $data['avatar'];
        // $thongtingv->MaSV = $data['MaSV'];
        // $thongtingv->fname = $data['fname'];

        // $thongtingv->lname = $data['lname'];
        // $thongtingv->NgaySinh = $data['NgaySinh'];
        // $thongtingv->cccd = $data['cccd'];

        // $thongtingv->GioiTinh = $data['GioiTinh'];
        // $thongtingv->Email = $data['Email'];
        // $thongtingv->GioiTinh = $data['DiaChi'];
        // $thongtingv->Email = $data['SDT'];
    }
     public function updatechangepasssv($id, Request $request)
    {
        // $idgv = $request->session()->get('id_sv');
        $data= $request->validate([
            'passold' =>'required|max:255',
            'passnew' => 'required|max:255',

        ],
        [
            'passold.required' => 'passold trong ',
            'passnew.required' => ' passnew trong',
        ]);
        // print_r($data);
        $profilegv= CollegeStudentAccounts::where('MaSV', $id)->first();
        // echo $profilegv->password;
        if($data['passold'] == $profilegv->password)
        {
            $update = CollegeStudentAccounts::find($id);
            $update->password = $data['passnew'];
            $update->save();
            return redirect()->back()->with('status', 'Update Password thành công');
        }
        else
        {
            return redirect()->back()->with('status', 'Pass Old Error');
        }
    }
}
