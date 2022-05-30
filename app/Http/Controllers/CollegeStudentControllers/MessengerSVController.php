<?php

namespace App\Http\Controllers\CollegeStudentControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Events\MessageSent;
use App\Models\CollegeStudentAccounts;
use App\Models\Messages;
use DB;
class MessengerSVController extends Controller
{
    //
    public function index(Request $request)
    {
        $idsv = $request->session()->get('id_sv');

        // dd($listsv);
        return view('collegestudentcp.messenger.index');
    }
    // public function store(Request $request)
    // {
    //     $user=CollegeStudentAccounts::where(['MaSV'=> session()->get('id_sv')])->get();
    //     broadcast(new MessageSent($user, $request->input('message')));
    //     return $request->input('message');
    // }
    public function listfriend(Request $request)
    {
        $idsv = $request->session()->get('id_sv');
        $listsv= CollegeStudentAccounts::whereNot('MaSV', $idsv)->get();
    }
    public function datafriend(Request $request)
    {
        $idsv = $request->session()->get('id_sv');
        $listsv= DB::table('dssinhvien')
        ->select('*')
        ->whereNot('MaSV','=', $idsv)->get();
        $demlistsv= CollegeStudentAccounts::whereNot('MaSV', $idsv)->count();
        $output = "";
        // print_r($listsv);
        // echo '<pre>';
        // dd($demlistsv);
        if($demlistsv== 0){
            $output .= "No users are available to chat";
            echo $output;
        }elseif($demlistsv > 0){
            // dd($listsv);
            foreach($listsv as $listsinhvien)
            {
                $status = $listsinhvien->Status;
                $mess = Messages::where(function ($query) use ($idsv, $listsinhvien) {
                        $query->where('incoming_msg_id', $listsinhvien->MaSV)
                            ->where('outgoing_msg_id', $idsv);
                })
                ->orWhere(function ($query) use ($idsv, $listsinhvien)  {
                        $query->where('outgoing_msg_id', $listsinhvien->MaSV)
                            ->where('incoming_msg_id', $idsv);
                })->orderBy('id','desc')
                ->limit(1)->get();
                ($mess->count()>0) ? $result = $mess->first()->msg : $result ="No message available";
                (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
                if($idsv == '$mess->fisrt()->outgoing_msg_id')
                {
                    ($idsv == $mess->fisrt()->outgoing_msg_id) ? $you = "Bạn: " : $you = "";
                }
                else
                {
                     $you = "";
                }
                // dd($you);
                //  dd($listsinhvien->Status);
                ('Offline now' == '$listsv->first()->Status') ? $offline = "offline" : $offline = "";
                ($idsv == '$listsinhvien->MaSV') ? $hid_me = "hide" : $hid_me = "";
                $output .= '<a href="http://127.0.0.1:8000/collegestudent/Messenger/ChatBox/'.$listsinhvien->MaSV.'">
                            <div class="content">
                            <img src="http://127.0.0.1:8000/./avatar/'. $listsinhvien->avatar .'" alt="">
                            <div class="details">
                                <span>'. $listsinhvien->fname. " " . $listsinhvien->lname .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                            </div>
                            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                        </a>';
                        // print( $output);
                // print_r($listsinhvien);
                // echo '<pre>';
            }
            // echo $status;
            echo $output;
        }
    }
    public function searchfriend(Request $request)
    {
        $idsv = $request->session()->get('id_sv');
        $profilesv = CollegeStudentAccounts::where('MaSV', $idsv)->first();
        $account = CollegeStudentAccounts::all();
        $searchfriend = CollegeStudentAccounts::whereNot('MaSV', $account->MaSV)
        ->where(function ($query)  {
                $query->where('fname', $account->fname)
                    ->orWhere('lname', $account->lname);
        });
        dd($profilesv->fname);

    }
    public function chatbox(Request $request)
    {
        $profile = CollegeStudentAccounts::where('MaSV', $request->id)->get();
        return view('collegestudentcp.messenger.rep')->with(compact('profile'));
    }
    public function getchat($incoming_id, Request $request)
    {
        $output = "";
        $incoming_id = $request->incoming_id;

        $outgoing_id = $request->session()->get('id_sv');
        //  dd($incoming_id, $outgoing_id);
        $getchat= Messages::leftJoin('dssinhvien','dssinhvien.MaSV','=','messages.outgoing_msg_id')
        ->where(function ($query) use($incoming_id, $outgoing_id) {
             $query->where('outgoing_msg_id','=',$outgoing_id)
                ->where('incoming_msg_id','=', $incoming_id);

        })
        ->orWhere(function ($query) use($incoming_id, $outgoing_id) {
             $query->where('outgoing_msg_id','=', $incoming_id)
                ->where('incoming_msg_id','=',$outgoing_id);
        })
        ->orderBy('id','asc')
        ->get();
                // dd($getchat->count());
        if($getchat->count()>0)
        {
            foreach($getchat as $get)
            {
                // dd($get->first()->outgoing_msg_id, $outgoing_id);
                if($get->outgoing_msg_id === $outgoing_id)
                {
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $get->msg .'</p>
                                </div>
                                </div>';
                }
                else{
                    $output .= '<div class="chat incoming">
                                <img src="http://127.0.0.1:8000/./avatar/'.$get->avatar.'" alt="">
                                <div class="details">
                                    <p>'.  $get->msg .'</p>
                                </div>
                                </div>';
                }
            }
        }
        else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }
    public function postchat(Request $request)
    {
        $idsv = $request->session()->get('id_sv');
        $timestamp = time();
        $thoigian = date ("Y-m-d H:i:s", $timestamp);
        $outgoing_id = $idsv;
        $incoming_id = $request->incoming_id;
        $msg = $request->message;
        $chat = new Messages();
        $chat->incoming_msg_id = $incoming_id;
        $chat->outgoing_msg_id = $outgoing_id;
        $chat->msg = $msg;
        $chat->ThoiGian = $thoigian;
        $chat->save();
        // dd($chat);
        // $senddata=[
        //     'incoming_id' => $incoming_id,
        //     'outgoing_id' => $outgoing_id,
        //     'msg' => $msg,
        //     'ThoiGian' => $thoigian,
        // ];
        // Messages::create($senddata);
        return response()->json(
            [
                'status' => 200
            ]
            );



    }
}
