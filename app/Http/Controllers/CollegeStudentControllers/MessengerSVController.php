<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessengerSVController extends Controller
{
    //
    public function index()
    {
        return view('collegestudentcp.messenger.index');
    }
}
