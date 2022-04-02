<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminAccounts;
class AdminAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        // $listadminaccounts = AdminAccounts::all();
        // return view('admincp.adminaccounts.index')->with(compact('listadminaccounts'));

        // if ($request->ajax()) {
        //     $adminaccounts = AdminAccounts::all()->get();
        //     return Datatables::of($adminaccounts)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){

        //                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->idadmin.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

        //                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->idadmin.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

        //                     return $btn;
        //             })
        //             ->rawColumns(['action'])
        //             ->make(true);
        // }
        // return view('admincp.adminaccounts.index');

        $listadminaccounts = AdminAccounts::all();

        return view('admincp.adminaccounts.index')->with(compact('listadminaccounts'));
            // return Datatables::of(AdminAccounts::query())->make(true);

    }
    public function fetchAll()
    {
        // $listadminaccounts = AdminAccounts::all();
        // return response()->json([
        //     'listadminaccounts' => $listadminaccounts,
        // ]);

        return Datatables::of(AdminAccounts::query())->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('admincp.adminaccounts.create');
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
        // print_r($_POST);
        // print_r($_FILES);
        $a = 3;
        $status = 'offline';
        $lop = 1;
        $file = $request -> file('avatar');
        $fileName = time() . '.' . $file ->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);
        $accData =[

            'fname' => $request->fname ?? 'default',
            'lname' => $request->lname,
            'password' => $request->password,
            'NgaySinh' => $request->date,
            'cccd' => $request->cccd,
            'GioiTinh' => $request->sex,
            'DiaChi' => $request->address,
            'SDT' => $request->phone,
            'Email' => $request->email,
            'Status' => $status,
            'avatar' => $fileName,
            'MaLop' => $lop,
            'idloaitk' =>$a
        ];
        AdminAccounts::create($accData);
        return response()->json([
            'status' => 200
        ]);
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
    //     AdminAccounts::where('idadmin',$id)->delete();
    //     AdminAccounts::destroy($id);
    //     return response()->json([
    //     'success' => 'Record deleted successfully!'
    // ]);
    $list = AdminAccounts::where('MaSV','=',$id)->get();
    $list->delete();

    return response()->json(['success' => true],200);
    }
}
