@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}
<style>
    /* #test{
    border-radius: 15px; text-align: center;

    } */
    .dssv{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: red;
        color: white;
    }
    .dssv:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
    .hplop{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: blue;
        color: white;
    }
    .hplop:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
    .ghichu{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: green;
        color: white;
    }
    .ghichu:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
</style>
<body class="bg-light">
<div class="container">
    <div style = "background-color: #A9A9A9; height: 35px; ">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px; " aria-label="breadcrumb" >
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/DanhSachKhoa')}}">Quản lý khoa</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/Khoa',$lop_id->khoa->slug_khoa)}}">Khoa: {{$lop_id->khoa->TenKhoa}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Lớp: {{$lop_id->TenLop}}</li>
        </ol>
    </nav>
    </div>


<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
        <h3 class="text-light">Lựa chọn</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <button class="btn btn-light"><a href="">Add</a></button>
        </div>
        <div class="card-body" id="show_all_adminaccounts">
        <!-- <h1 class="text-center text-secondary my-5">Loading...</h1> -->
        <!-- start table -->
            <div class="container">

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
                        <div class="row" >
                            <div class="col" style = "" id = "test">
                                <a href="{{route('sinhviencualop', $lop_id->slug_lop)}}">
                                    <div class="dssv">
                                        <h3>Danh sách sinh viên</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col" style = "" id = "test">
                                <a href="{{route('monhoccualop', $lop_id->slug_lop)}}">
                                    <div class="hplop">
                                        <h3>Danh sách môn học</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col" style = "" id = "test">
                                <a href="{{route('khenthuongkyluatcualop', $lop_id->slug_lop)}}">
                                    <div class="ghichu">
                                        <h3>Khen thưởng - Kỷ luật</h3>

                                    </div>
                                </a>
                            </div>

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
