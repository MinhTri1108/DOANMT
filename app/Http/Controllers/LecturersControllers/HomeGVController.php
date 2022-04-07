<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeGVController extends Controller
{
    //
    public function index()
    {
        $thongtin=session()->has('id_gv');
        return view('lecturercp.index',compact('thongtin'));
    }
}
