<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use Carbon\Carbon;
use App\Models\LichLamViec;
use App\Models\ChatForum;
class HomeSVController extends Controller
{
    //
    public function index()
    {
         $chat = ChatForum::all();
        $lichs=LichLamViec::with('admin')->get();
        return view('collegestudentcp.index')->with(compact('lichs', 'chat'));
    }
}
