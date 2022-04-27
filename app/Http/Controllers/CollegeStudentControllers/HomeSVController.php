<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
class HomeSVController extends Controller
{
    //
    public function index()
    {
        // $time = 20;
        // Cookie::queue(cookie('check','Chưa đến hạn đăng ký học phần' ,$time ));
        return view('collegestudentcp.index');
    }
}
