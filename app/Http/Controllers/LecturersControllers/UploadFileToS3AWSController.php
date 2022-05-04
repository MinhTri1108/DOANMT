<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use App\Models\FileTaiLieu;
use App\Models\HocPhan;
class UploadFileToS3AWSController extends Controller
{
    //
    public function indexfiletoaws(Request $request)
    {
        $idgv = $request->session()->get('id_gv');
        $lophocphan=HocPhan::where('mahocphan.MaGV', $idgv)->with('monhoc')->get();
        return view('lecturercp.uploadfiletoaws.index')->with(compact('lophocphan'));
        // $files = Storage::disk('s3')->files('images');

        // $data = [];
        // foreach($files as $file) {
        //     $data[] = [
        //         'name' => basename($file),
        //         'downloadUrl' => url('/download/'.base64_encode($file)),
        //         'removeUrl' => url('/remove/'.base64_encode($file)),
        //     ];
        // }
        // // dd($files);
        // return view('image', ['files' => $data]);
        // return view('upload', ['files' => $data]);
        // return view('image');
    }
    public function storefiletoaws(Request $request)
    {
        $this->validate($request, ['File' => 'required']);
        $this->validate($request, ['idhocphan' => 'required']);
        if($request->hasfile('File'))
         {
            $idhocphan = $request->idhocphan;
            $file = $request->file('File');
            $fileName = time() . $file->getClientOriginalName();
            $filePath = $idhocphan.'/' . $fileName;
            $up= Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
            $urlPath = Storage::disk('s3')->url($filePath);
            // dd($urlPath);
            // //get filename with extension
            // $filenamewithextension = $request->file('image')->getClientOriginalName();

            // //get filename without extension
            // $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            // //get file extension
            // $extension = $request->file('image')->getClientOriginalExtension();

            // //filename to store
            // $filenametostore = $filename.'_'.time().'.'.$extension;

            // //Upload File to s3
            // Storage::disk('s3')->put($filenametostore, fopen($request->file('image'), 'r+'), 'public');
            // $urlPath = Storage::disk('s3')->url($filenametostore);

         }
        return back()->with('status','Uploaded successfully');
    }
    public function listfiletoaws(Request $request, $id)
    {
        $lophocphan=HocPhan::where('idhocphan', $id)->with('monhoc')->first();
        $files = Storage::disk('s3')->files($id);

        $data = [];
        foreach($files as $file) {
            $data[] = [
                'name' => basename($file),
                'downloadUrl' => url('/lecturers/GroupLop/DownloadFileToAWS/'.base64_encode($file)),
                'removeUrl' => url('/lecturers/GroupLop/DeleteFileToAWS/'.base64_encode($file)),
            ];
        }
        // dd($files);
        return view('lecturercp.fileofhocphan.index', ['files' => $data])->with(compact('lophocphan'));
    }
    public function downloadfiletoaws($file)
    {
        $file = base64_decode($file);
        $name = basename($file);
        $header = [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'inline; filename="'.$name.'"'
        ];
        // dd($file);
        $files =Storage::disk('s3')->download($file, $name);
        // // dd();
        // // return response()->download($files,$name);
        return $files;
        // return back()->withSuccess('File downloaded successfully');
        // $filename = 'test.pdf';
        // $filePath = storage_path($file);



        // return Response::make(file_get_contents($filePath), 200, $header);
        // dd(Storage::disk('s3')->download($file, $name, $header));
    }
    public function deletefiletoaws($file)
    {
        $file = base64_decode($file);
        Storage::disk('s3')->delete($file);

        return back()->withSuccess('File was deleted successfully');
    }

}
