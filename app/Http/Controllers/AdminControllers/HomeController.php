<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use Carbon\Carbon;
use App\Models\LichLamViec;
use App\Models\CollegeStudentAccounts;
use App\Models\ChatForum;
use App\Models\DanhSachLop;
class HomeController extends Controller
{
    //
    public function index()
    {
         $chat = ChatForum::all();
        // $thongtin=session()->has('id_admin');
        $lichs=LichLamViec::with('admin')->get();
        return view('admincp.index')->with(compact('lichs', 'chat'));
    }
}
