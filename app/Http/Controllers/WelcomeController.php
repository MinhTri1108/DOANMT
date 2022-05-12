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
        $chat = ChatForum::all();
        $lichs=LichLamViec::with('admin')->get();
        return view('welcome')->with(compact('lichs', 'chat'));
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
}
