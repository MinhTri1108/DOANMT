<?php

namespace App\Http\Controllers\LecturersControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HocPhan;
class ComponentGVandLopHocController extends Controller
{
    //
    public function indexcomponentmonhoc($id)
    {
        $lophocphan= HocPhan::where('idhocphan', $id)->first();
        return view('lecturercp.componentmonhoc.index')->with(compact('lophocphan'));
    }
}
