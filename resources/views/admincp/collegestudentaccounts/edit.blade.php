@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>
<body class="bg-light">
<div class="container">
    <div class="row my-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-light">Edit tài khoản</h3>
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <div class="card-body" id="">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}

                        </div>
                     @endif
                    <form class="row g-3" method="POST" action="{{route('CollegeStudentAccounts.update',$acc->MaSV)}}" required>
                        @method("PUT")
                        @csrf
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Fname</label>
                            <input type="text" name="fname" class="form-control" value = "{{$acc->fname}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="convert_slug" class="form-label">Lname</label>
                            <input type="text" name="lname" class="form-control" value = "{{$acc->lname}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" value = "{{$acc->password}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="convert_slug" class="form-label">Ngày sinh</label>
                            <input type="date" name="ngaysinh" class="form-control" value = "{{$acc->NgaySinh}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">CMND/CCCD</label>
                            <input type="text" name="cccd" class="form-control" value = "{{$acc->cccd}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="convert_slug" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" value = "{{$acc->Email}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Giới tính</label>
                            <select class="form-control" name ="gioitinh">
                            <option value="{{$acc->GioiTinh}}" selected> {{$acc->GioiTinh}}</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="convert_slug" class="form-label">Số điện thoại</label>
                            <input type="text" name="sdt" class="form-control" value = "{{$acc->SDT}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Địa chỉ</label>
                            <input type="text" name="diachi" class="form-control" value = "{{$acc->DiaChi}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Tên lớp</label>
                            <select id="lop" class="form-control" name = "malop">
                                <option value="{{$acc->MaLop}}" selected>{{$acc->lop->TenLop}}</option>
                                @foreach($lops as $lop)
                                <option value="{{$lop->MaLop}}">{{$lop->TenLop}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="convert_slug" class="form-label">Avatar</label>
                            <input type="text" name="avatar" class="form-control" value = "{{$acc->avatar}}">
                        </div> -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
