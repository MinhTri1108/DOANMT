<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileTaiLieu;
use App\Models\HocPhan;
class UploadFileTaiLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $idgv = $request->session()->get('id_gv');
        $tailieus = FileTaiLieu::join('mahocphan', 'mahocphan.idhocphan', '=', 'tailieu.idhocphan')
        ->join('dsmonhoc', 'dsmonhoc.MaMonHoc', '=', 'mahocphan.MaMonHoc')
        ->where('tailieu.MaGV', $idgv)->get();
        return view('lecturercp.uploadtailieu.index')->with(compact('tailieus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $idgv = $request->session()->get('id_gv');
        $lophocphan=HocPhan::where('mahocphan.MaGV', $idgv)->with('monhoc')->get();
        return view('lecturercp.uploadtailieu.create')->with(compact('lophocphan'));
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
        if($request->hasFile('File'))
        {
            $files = $request->file('File');
            $timestamp = time();

            $ThoiGianFile = date ("Y-m-d H:i:s", $timestamp);
        // $type = $request->File->getClientMimeType();
        // $size = $request->File->getSize();

        // echo $file;
        // echo $type;
        // echo $size;
        // echo 'Tên Files: ' . $file->getClientOriginalName();
        //     echo '<br/>';

        //     //Lấy Đuôi File
        //     echo 'Đuôi file: ' . $file->getClientOriginalExtension();
        //     echo '<br/>';

        //     //Lấy đường dẫn tạm thời của file
        //     echo 'Đường dẫn tạm: ' . $file->getRealPath();
        //     echo '<br/>';

        //     //Lấy kích cỡ của file đơn vị tính theo bytes
        //     echo 'Kích cỡ file: ' . $file->getSize();
        //     echo '<br/>';
        //     echo 'Kiểu files: ' . $file->getMimeType();
                $data= $request->validate([
                    'idhocphan' => 'required|max:255',
                    'MoTa' => 'required|max:255',
                    'File' => 'required|max:2048',
                    // png, jpg, jpeg, gif, ppt, zip, pptx, doc, docx, xls, xlsx, txt, zip, rar, java, py, php, js, html, css|
                ],
                [
                    'idhocphan.unique' => 'Hoc phan null',
                    'MoTa.required' => 'Mo ta trong',
                    'File.required' => 'file trong',
                ]
            );
            $idgv = $request->session()->get('id_gv');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            // $fileName = time().'.'.$request->file->extension();
            // $fileup =
            foreach ($files as $file)
            {
                $uploadfile = new FileTaiLieu();
                $uploadfile->MaGV = $idgv;
                $uploadfile->idhocphan = $data['idhocphan'];
                $uploadfile->MoTa = $data['MoTa'];
                $uploadfile->File = $file->move('downloads', $file->getClientOriginalName());
                $uploadfile->ThoiGianFile = $ThoiGianFile;
                $uploadfile->save();
            }
            return redirect()->back()->with('status', 'Thêm File thành công');




        }
        else{
            echo "file trong";
        }
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
