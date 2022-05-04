<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use Carbon\Carbon;
class HomeSVController extends Controller
{
    //
    public function index()
    {
        // $time = 20;
        // Cookie::queue(cookie('check','Chưa đến hạn đăng ký học phần' ,$time ));
        // $date1 = Carbon::createFromFormat('m/d/Y H:i:s', '09/11/2020 10:41:00');
        // $date2 = Carbon::createFromFormat('m/d/Y H:i:s', '09/10/2020 10:41:00');

        // $result = $date1->lt($date2);
        // var_dump($result);
        return view('collegestudentcp.index');
    }
}
