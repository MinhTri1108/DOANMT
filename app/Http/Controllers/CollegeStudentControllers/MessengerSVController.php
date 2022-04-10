<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\CollegeStudentAccounts;
class MessengerSVController extends Controller
{
    //
    public function index()
    {
        return view('collegestudentcp.messenger.index');
    }
    public function store(Request $request)
    {
        $user=CollegeStudentAccounts::where(['MaSV'=> session()->get('id_sv')])->get();
        broadcast(new MessageSent($user, $request->input('message')));
        return $request->input('message');
    }
}
