<?php

namespace App\Http\Controllers\AuthControllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminAccounts;
use App\Models\CollegeStudentAccounts;
use App\Models\LecturersAccounts;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $idmatk = substr($request->MaTK, 0, 5);
        $idma= substr($request->MaTK, -5);
        echo $request->MaTK;
        echo "-";
        echo $idmatk;
        echo "-";
        echo $idma;
        $status = 'Active now';
        switch($idmatk)
        {
            case '02021':
                $user=AdminAccounts::where(['MaAdmin'=> $idma, 'password'=> $request->password])->get();
                $request->session()->put('id_account',$user[0]->MaAdmin);
                $request->session()->put('matk',$idmatk);
                DB::table('dsadmin')
                            ->where('MaAdmin', $idma)
                            ->update(['Status' => $status]);
                // echo "admin";
                return redirect('/admin');
                break;
            case '12021':
                $user=LecturersAccounts::where(['MaGV'=> $idma, 'password'=> $request->password])->get();
                $request->session()->put('id_gv',$user[0]->MaGV);
                $request->session()->put('matk',$idmatk);
                DB::table('dsgiaovien')
                            ->where('MaGV', $idma)
                            ->update(['Status' => $status]);
                // echo "giang vien";
                return redirect('/lecturers');
                break;
            case '22021':
                $user=CollegeStudentAccounts::where(['MaSV'=> $idma, 'password'=> $request->password])->get();
                $request->session()->put('id_sv',$user[0]->MaSV);
                $request->session()->put('matk',$idmatk);
                DB::table('dssinhvien')
                            ->where('MaSV', $idma)
                            ->update(['Status' => $status]);
                // echo " sinh vien";
                return redirect('/collegestudent');
                break;
            default:
                echo "Tài khoản không tồn tại";
        }
        // $user=AdminAccounts::where(['MaAdmin'=> $request->MaTK, 'password'=> $request->password])->get();
        // if(count($user)>0)
        // {
        //     // session()->put('check', true);
        //     // session()->put('thongtin',$user);
        //     $request->session()->put('user_id',$user[0]->MaAdmin);
        //     echo $request->MaTK;
        //     // return redirect('/admin');
        // }
        // else
        // {
        //    return back()->with('error','Bạn đã nhập sai tài khoản !!!');
        // }
    }
    public function logout(Request $request)
    {
     $request->session()->forget('id_account');
     $request->session()->forget('id_gv');
     $request->session()->forget('id_sv');
    //  $idgv = $request->session()->get('id_gv');
        // $request->session()->flush();
       return redirect('/');
    }
}
