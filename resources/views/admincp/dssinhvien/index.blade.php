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
        <li class="breadcrumb-item active" aria-current="page">Danh sách sinh viên</li>
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
                    <table id="example" class="table table-striped table-bordered data-table" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
                        <thead style="background-color: #3b89d6;">
                            <th>Avatar</th>
                            <th>Mã Sinh Viên</th>
                            <th>Họ Tên</th>
                            <th>Ngày Sinh</th>
                            <th>CCCD</th>
                            <th>Giới Tính</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Lớp</th>
                        </thead>
                        <tbody>
                             @foreach($listsvs as $listsv)
                            <tr id="row{{ $listsv->MaLop }}" >
                                <td>
                                    {{$listsv->avatar}}
                                </td>
                                <td>
                                    <?php
                                        $s = sprintf('%05d',$listsv->MaSV);
                                    ?>
                                    {{$listsv->permission->matk}}<?php echo $s ?>
                                </td>
                                <td>
                                    {{$listsv->fname}} {{$listsv->lname}}
                                </td>
                                <td>
                                    {{$listsv->NgaySinh}}
                                </td>
                                <td>
                                    {{$listsv->cccd}}
                                </td>
                                <td>
                                    {{$listsv->GioiTinh}}
                                </td>
                                <td>
                                    {{$listsv->DiaChi}}
                                </td>
                                <td>
                                    {{$listsv->SDT}}
                                </td>
                                <td>
                                    {{$listsv->Email}}
                                </td>
                                <td>
                                    {{$listsv->Status}}
                                </td>
                                <td>
                                    {{$listsv->lop->TenLop}}
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
