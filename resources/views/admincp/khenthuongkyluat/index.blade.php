@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}

<body class="bg-light">
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px; " aria-label="breadcrumb" >
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/DanhSachKhoa')}}">Quản lý khoa</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/Khoa',$lop_id->khoa->slug_khoa)}}">Khoa: {{$lop_id->khoa->TenKhoa}}</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{URL('admin/EducationProgram/Lop',$lop_id->slug_lop)}}">Lớp: {{$lop_id->TenLop}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Khen thưởng và kỷ luật</li>
        </ol>
    </nav>
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Danh sách sinh viên</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <button class="btn btn-light"><a href="">Add Sinh Viên</a></button>
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
                    <h1>Khen thưởng kỷ luật</h1>
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
