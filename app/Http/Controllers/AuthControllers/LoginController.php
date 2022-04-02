<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminAccounts;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user=AdminAccounts::where(['MaSV'=> $request->MaTK, 'password'=> $request->password])->get();
        if(count($user)>0)
        {
            // session()->put('check', true);
            // session()->put('thongtin',$user);
            $request->session()->put('user_id',$user[0]->MaSV);
            return redirect('/admin');
        }
        else
        {
           return back()->with('error','Bạn đã nhập sai tài khoản !!!');
        }
    }
}
