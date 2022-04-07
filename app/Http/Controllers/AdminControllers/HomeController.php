<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $thongtin=session()->has('id_admin');
        return view('admincp.index',compact('thongtin'));
    }
}
