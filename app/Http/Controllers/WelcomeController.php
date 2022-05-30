<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LichLamViec;
use App\Models\ChatForum;
use App\Events\MessageSent;
use App\Models\FileTaiLieu;
use App\Events\CommentRep;
use App\Models\CollegeStudentAccounts;
use App\Models\POSTS;
use App\Models\Comment;

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
        $showfile= FileTaiLieu::distinct('IdUser', 'idquyen', 'MoTa', 'ThoiGianFile')->select('IdUser', 'idquyen', 'MoTa', 'ThoiGianFile')->get();
        $getfile = FileTaiLieu::all();
        // $a = CollegeStudentAccounts::where('idloaitk', 3)->where('MaSV', 21)->first();
        // dd($a);

        return view('forum.sharefile.index')->with(compact('showfile', 'getfile'));
    }
    public function postsharefile(Request $request)
    {
        if($request->hasFile('file'))
        {
            $files = $request->file('file');
            $timestamp = time();
            $ThoiGianFile = date ("Y-m-d H:i:s", $timestamp);

            switch($request->session()->get('matk'))
            {
                case '02021':
                    $idma=$request->session()->get('id_account');
                    $idmatk = 1;

                break;
                case '12021':
                    $idma=$request->session()->get('id_gv');
                    $idmatk = 2;
                break;
                case '22021':
                    $idma=$request->session()->get('id_sv');
                    $idmatk = 3;
                break;
                default:
                    $idma="";
                    $idmatk = 0;
                    break;
            }
            //
            // dd($idma, $idmatk, $ThoiGianFile);
            // $fileName = time().'.'.$request->file->extension();
            foreach ($files as $file)
            {
                $path= $file->move('downloads', $file->getClientOriginalName());
                $file_name = pathinfo($path, PATHINFO_FILENAME);
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $filename=$file_name.'.'.$extension;

                $uploadfile = new FileTaiLieu();
                $uploadfile->IdUser = $idma;
                $uploadfile->idquyen = $idmatk;
                $uploadfile->MoTa = $request->input('noidung');
                $uploadfile->File = $filename;
                $uploadfile->ThoiGianFile = $ThoiGianFile;
                $uploadfile->save();
            }
            return redirect()->back()->with('status', 'Thêm File thành công');
            // dd($uploadfile);
            // dd($file->getClientOriginalName());
        }
        else{
            echo "file trong";
        }
    }
    public function QAaboutCode()
    {
        $showpost= POSTS::with('masvpost')->distinct('MaSV', 'content', 'time')->select('MaSV', 'content', 'time')
        ->orderBy('time', 'desc')->get();
        $getpost = POSTS::with('masvpost')->get();
        // dd($showpost, $getpost);
        $getcmt = Comment::all();
        $countcmt= Comment::all();
        return view('forum.forumcode.index')->with(compact('showpost', 'getpost', 'getcmt', 'countcmt'));
    }


    public function poststatus(Request $request)
    {
        $files = $request->file('file');
        $timestamp = time();
        $ThoiGianFile = date ("Y-m-d H:i:s", $timestamp);
        $content = $request->input('content');
        // dd($files, $content);
        $idsvpost=$request->session()->get('id_sv');
            //
            // dd($idma, $idmatk, $ThoiGianFile);
            // $fileName = time().'.'.$request->file->extension();
        if($request->hasFile('file'))
        {
            foreach ($files as $file)
            {
                $path= $file->move('filepostscoder', $file->getClientOriginalName());
                $file_name = pathinfo($path, PATHINFO_FILENAME);
                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $filename=$file_name.'.'.$extension;

                $posts = new POSTS();
                $posts->MaSV = $idsvpost;
                $posts->content = $content;
                $posts->attached = $filename;
                $posts->time = $ThoiGianFile;
                // dd($posts);
                // dd($posts);
                $posts->save();
            }
        }
        else
        {
            $posts = new POSTS();
            $posts->MaSV = $idsvpost;
            $posts->content = $content;
            $posts->attached = $files;
            $posts->time = $ThoiGianFile;
            // dd($posts);
            $posts->save();

        }
        return redirect()->back()->with('status', 'Đăng bài thành công');
    }
    public function repcmt(Request $request)
    {
        // return view('welcome')
        // dd($request->all());
        if($request->session()->get('matk') != null)
        {
        $content = $request->input('content');
        $idpost =  $request->input('idposts');
        switch($idmatk = $request->session()->get('matk'))
            {
                case '02021':
                    $idma=$request->session()->get('id_account');
                    // $idmatk = 1;

                break;
                case '12021':
                    $idma=$request->session()->get('id_gv');
                    // $idmatk = 2;
                break;
                case '22021':
                    $idma=$request->session()->get('id_sv');
                    // $idmatk = 3;
                break;
                default:
                    $idma="";
                    // $idmatk = 0;
                    break;
            }
        // $cmt = new Comment();
        // $cmt->idposts = $idpost;
        // $cmt->matk = $idmatk;
        // $cmt->iduser = $idma;
        // $cmt->content = $content;
        // $cmt->time = $timee;
        // $cmt->save();
        // return redirect()->back();
            $data2 = $request->all();
            $data = array_merge($data2, ['iduser' => $idma], ['matk' => $idmatk]);
            $comment= Comment::create($data);
            event(
                $e = new CommentRep($comment)
            );
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('status', 'Vui lòng login để bình luận');
        }
    }
}
