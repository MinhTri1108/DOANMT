<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThongBaoGV;
use App\Models\ChatForum;
use App\Models\LichLamViec;
use App\Models\LecturersAccounts;
class HomeGVController extends Controller
{
    //
    public function index()
    {
        $chat = ChatForum::all();
        $lichs=LichLamViec::with('admin')->get();
        return view('lecturercp.index')->with(compact('lichs', 'chat'));
    }
    public function profilegv($id, Request $request)
    {
        $profilegv= LecturersAccounts::where('MaGV', $id)->with('permission')->first();
        return view('lecturercp.profile.index')->with(compact('profilegv'));
        // dd($thongtinkhoahoc);
    }
    public function updateprofilegv($id, Request $request)
    {
        $data= $request->validate([
            'avatar' =>'required|max:255',
            'MaGV' => 'required|max:255',
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
            'MaGV.required' => 'MaGV trong ',
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
    public function updatechangepassgv($id, Request $request)
    {
        // $idgv = $request->session()->get('id_gv');
        $data= $request->validate([
            'passold' =>'required|max:255',
            'passnew' => 'required|max:255',

        ],
        [
            'passold.required' => 'passold trong ',
            'passnew.required' => ' passnew trong',
        ]);
        // print_r($data);
        $profilegv= LecturersAccounts::where('MaGV', $id)->first();
        // echo $profilegv->password;
        if($data['passold'] == $profilegv->password)
        {
            $update = LecturersAccounts::find($id);
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
