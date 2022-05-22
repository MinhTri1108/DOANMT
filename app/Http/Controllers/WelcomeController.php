<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LichLamViec;
use App\Models\ChatForum;
use App\Events\MessageSent;
class WelcomeController extends Controller
{
    //
    public function welcome()
    {
        // $thongtin=session()->has('id_admin');
        if(session()->has('id_account'))
        {
        $chat = ChatForum::all();
        $lichs=LichLamViec::with('admin')->get();
        return view('admincp.index')->with(compact('lichs', 'chat'));
        }
        else if(session()->has('id_sv'))
        {
        $chat = ChatForum::all();
        $lichs=LichLamViec::with('admin')->get();
        return view('collegestudentcp.index')->with(compact('lichs', 'chat'));
        }
        else if(session()->has('id_gv'))
        {
        $chat = ChatForum::all();
        $lichs=LichLamViec::with('admin')->get();
        return view('lecturercp.index')->with(compact('lichs', 'chat'));
        }
        else{
            $chat = ChatForum::all();
            $lichs=LichLamViec::with('admin')->get();
            return view('welcome')->with(compact('lichs', 'chat'));
        }
    }
    public function postchatnoacc(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $message= ChatForum::create($data);
        event(
            $e = new MessageSent($message)
        );
        // dd($e);
        return redirect()->back();
    }
    public function sharefile(Request $request)
    {
        return view('forum.sharefile.index');
    }
}
