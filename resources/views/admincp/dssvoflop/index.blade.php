@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}
<style>
    .item{
		transform: scale(1);
		transition: all 0.5s;
		width:200px;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
		background-color:white;
		text-align: center;
	}
.item:hover {
transform: scale(1.1);
box-shadow:20px 20px 50px 10px aqua;
}
</style>
<body class="bg-light">
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px;" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/DanhSachKhoa')}}">Quản lý khoa</a></li>
        <li class="breadcrumb-item active" aria-current="page"></a></li>
        </ol>
    </nav>
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Lựa chọn</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <button class="btn btn-light"><a href="">Add Lớp</a></button>
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
                    <div class="container">
                        <div class="row mt-5 "  style="row-gap: 30px;">
                            <div class="col-12 col-md-3 d-flex justify-content-center">
                                <div class="item" >
                                    <div class="item-summary">
                                        <div class="post-title font-title" id=" ">
                                            xin chào
                                            <h5>
                                                <a style="text-decoration: none;color:red;font-weight:bold;">
                                            </h5>
                                        </div>
                                        <div class="tacgia">
                                            <span class="glyphicon glyphicon-user"></span><br>
                                        </div>
                                        <div class="theloai">
                                            <span class="glyphicon glyphicon-list"></span> <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="item" >
                                    <div class="item-summary">
                                        <div class="post-title font-title" id=" ">
                                            xin chào
                                            <h5>
                                                <a style="text-decoration: none;color:red;font-weight:bold;">
                                            </h5>
                                        </div>
                                        <div class="tacgia">
                                            <span class="glyphicon glyphicon-user"></span><br>
                                        </div>
                                        <div class="theloai">
                                            <span class="glyphicon glyphicon-list"></span> <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="item" >
                                    <div class="item-summary">
                                        <div class="post-title font-title" id=" ">
                                            xin chào
                                            <h5>
                                                <a style="text-decoration: none;color:red;font-weight:bold;">
                                            </h5>
                                        </div>
                                        <div class="tacgia">
                                            <span class="glyphicon glyphicon-user"></span><br>
                                        </div>
                                        <div class="theloai">
                                            <span class="glyphicon glyphicon-list"></span> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end table -->
        <script type="text/javascript" src="{{ asset('./js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="{{ asset('./css/bootstrap/js/bootstrap.min.js') }}"></script>
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
