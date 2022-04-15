<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LichLamViec;
class HomeController extends Controller
{
    //
    public function index()
    {
        // $thongtin=session()->has('id_admin');
        $lichs=LichLamViec::with('admin')->get();
        return view('admincp.index')->with(compact('lichs'));
    }
}
