<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThongBaoGV;
use App\Models\LecturersAccounts;
class HomeGVController extends Controller
{
    //
    public function index()
    {
        // $tbgvs= ThongBaoGV::join('dsadmin', 'dsadmin.MaAdmin', '=', 'thongbaogv.MaAdmin')
        // ->join('quyen', 'quyen.idloaitk', '=', 'dsadmin.idloaitk')->get();
        // $counttb= ThongBaoGV::sum('status');;
        // return view('lecturercp.index')->with(compact('tbgvs','counttb'));
        return view('lecturercp.index');
    }
    public function updateprofile($id, Request $request)
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
    public function updatechangepass($id, Request $request)
    {
        $idgv = $request->session()->get('id_gv');
        $data= $request->validate([
            'passold' =>'required|max:255',
            'passnew' => 'required|max:255',

        ],
        [
            'passold.required' => 'passold trong ',
            'passnew.required' => ' passnew trong',
        ]);
        // print_r($data);
        $profilegv= LecturersAccounts::where('MaGV', $idgv)->first();
        // echo $profilegv->password;
        if($data['passold'] == $profilegv->password)
        {
            $update = LecturersAccounts::find($idgv);
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
