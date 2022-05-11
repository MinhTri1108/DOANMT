<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupChat;
use App\Events\MessageSent;
use Illuminate\Support\Facades\DB;
class BoxChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $chat = GroupChat::with('iduser')->get();
        return view('collegestudentcp.boxchat.index')->with(compact('chat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $idsv = $request->session()->get('id_sv');
        $timestamp = time();
        $thoigian = date ("Y-m-d H:i:s", $timestamp);
        $data= $request->validate([
            'msg' => 'required|max:255',

        ],
        [
            'msg.unique' => 'Tên  đã có vui lòng đặt tên khác. Cảm ơn!!!',
        ]
    );
    $message = new GroupChat();
    $message->iduser = $idsv;
    $message->msg = $data['msg'];
    $message->time = $thoigian;
    $message->save();
    // $data['iduser'] = $idsv;

    // dd($data);
    //  $data = $request->all();
    // $data['iduser'] =  $idsv;
    // $data['time'] = $thoigian;
    // dd($data);
    // GroupChat::create($data);
    event(
        $e = new MessageSent($message)
    );
    // dd($e);
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
