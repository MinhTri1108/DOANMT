@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>

<body class="bg-light">
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px;" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách môn học</a></li>
        </ol>
    </nav>
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Danh sách Môn Học</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Khoa</button> -->
            <button class="btn btn-light"><a href="{{route('DanhSachMonHoc.create')}}">Create Môn Học</a></button>
        </div>
        <div class="card-body" id="show_all_adminaccounts">
        <!-- <h1 class="text-center text-secondary my-5">Loading...</h1> -->
        <!-- start table -->
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}

                        </div>
                     @endif
                    <table id="example" class="table table-striped table-bordered data-table" width="100%" data-page-length="25" data-order="[[ 0, &quot;asc&quot; ]]">
                        <thead style="background-color: #4723d9; color: white;">
                            <th>Mã môn học</th>
                            <th>Tên môn học</th>
                            <th>Học kì</th>
                            <th>Số tín chỉ</th>
                            <th>LT</th>
                            <th>TH</th>
                            <th>TL</th>
                            <th>TT</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>
                        @foreach($listmhs as $listmh)
                            <tr id="row{{ $listmh->MaKhoa }}" >

                                <td>
                                   {{$listmh->MaMonHoc}}
                                </td>
                                <td>
                                    {{$listmh->TenMonHoc}}
                                </td>
                                <td>
                                    {{$listmh->HocKi}}
                                </td>
                                <td>
                                    {{$listmh->stc->SoTinChi}}
                                </td>
                                <td>{{$listmh->LT}}</td>
                                <td>{{$listmh->TH}}</td>
                                <td>{{$listmh->TL}}</td>
                                <td>{{$listmh->TT}}</td>
                                <td>
                                    <a href="{{route('DanhSachMonHoc.edit', ['DanhSachMonHoc'=>$listmh->MaMonHoc])}}" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                   <form action="{{route('DanhSachMonHoc.destroy', ['DanhSachMonHoc'=>$listmh->MaMonHoc])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa môn học này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
                                   </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end table -->
        <script type="text/javascript" src="{{ asset('./js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{ asset('./bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('./js/script.js') }}"></script>
    </div>
    </div>
</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
