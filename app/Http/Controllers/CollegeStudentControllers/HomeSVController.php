<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeSVController extends Controller
{
    //
    public function index()
    {
        $thongtin=session()->has('id_sv');
        return view('collegestudentcp.index',compact('thongtin'));
    }
}
