@extends('layouts.sidebarsv')
@section('content')
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
        <h3 class="text-light">Thông tin cá nhân.</h3>
        </div>
        <div class="card-body" id="show_all_adminprofilesvs">
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
                    <button style="color: white; margin-left: 20px;" class="btn bg-info" data-bs-toggle="modal" data-bs-target="#changepass">Đổi mật Khẩu</button>
                    <button style="color: white; margin-left: 20px;" class="btn bg-info" onclick="editprofile()">Edit</button>
                    <form action="{{route('updateprofilesv', [$profilesv->MaSV])}}" method="post">
                        @method("PUT")
                        @csrf
                        <div class="modal-body">

                            <?php
                                $s = sprintf('%05d',$profilesv->MaSV);
                            ?>
                            <div class="row" >
                                <div class="col-md-6">
                                    <label for="fname">Avatar</label>
                                    <!-- <img class="header_img" src="https://scontent.fdad3-1.fna.fbcdn.net/v/t1.6435-9/118675616_451215635838425_7444536993265624310_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=174925&_nc_ohc=OdL2TjHE1vYAX-sFMzh&_nc_ht=scontent.fdad3-1.fna&oh=00_AT9S-ErDYBTVtOJRSkOQDYuIHKPkJtFBpArewqDLZEIz_Q&oe=62875687" alt=""> -->
                                    <input name="avatar" id="avatar" type="file" value="{{$profilesv->avatar}}" id="" class="form-control" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="MaSV">Mã sinh viên</label>
                                    <input name="MaSV" id="MaSV" type="text" class="form-control" value="{{$profilesv->permission->matk}}<?php echo $s?>" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">Họ</label>
                                    <input name="fname" id="fname" type="text" class="form-control" value="{{$profilesv->fname}}"disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Tên</label>
                                    <input name="lname" id="lname" type="text" class="form-control" value="{{$profilesv->lname}}"disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">Ngày sinh</label>
                                    <input name="NgaySinh" id="NgaySinh" type="date" class="form-control" value="{{$profilesv->NgaySinh}}"disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="fname">CCCD</label>
                                    <input name="cccd" id="cccd" type="text" class="form-control" value="{{$profilesv->cccd}}"disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">Giới tính</label>
                                    <input name="GioiTinh" id="GioiTinh" type="text" class="form-control" value="{{$profilesv->GioiTinh}}"disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="fname">Email</label>
                                    <input name="Email" id="Email" type="text" class="form-control" value="{{$profilesv->Email}}"disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname">Địa chỉ</label>
                                    <input name="DiaChi" id="DiaChi" type="text" class="form-control" value="{{$profilesv->DiaChi}}"disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="fname">Số điện thoại</label>
                                    <input name="SDT" id="SDT" type="text" class="form-control" value="{{$profilesv->SDT}}"disabled>
                                </div>
                            </div>
                        </div>
                        <button style="display: none;margin-left: 45%;margin-right: 45%;margin-top: 15px;" id="save" type="submit" class="btn btn-primary">Save Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
<div class="container">
    <div class="row my-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header bg-info d-flex justify-content-between align-items-center">
                    <h3 class="text-light">Thông tin khóa học</h3>
                </div>
                <div class="card-body" id="show_all_adminprofilesvs">
                    <div class="row">
                        <div class="col">
                            <div class="modal-body">
                                <div class="row" >
                                    <div class="col-md-6">
                                        <label for="fname">Khóa học: </label>
                                        <input  type="text" value="{{$thongtinkhoahoc->khoahoc->TenKhoaHoc}}" id="" class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="MaSV">Lớp: </label>
                                        <input type="text" class="form-control" value="{{$thongtinkhoahoc->TenLop}}" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">Hệ đào tạo: </label>
                                        <input type="text" class="form-control" value="{{$thongtinkhoahoc->hedaotao->TenHDT}}"disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lname">Chức vụ: </label>
                                        <input type="text" class="form-control" value="..."disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">Cố vấn học tập:</label>
                                        <input type="text" class="form-control" value="..."disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fname">Khoa: </label>
                                        <input type="text" class="form-control" value="{{$thongtinkhoahoc->khoa->TenKhoa}}"disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">SDT khoa:</label>
                                        <input type="text" class="form-control" value="{{$thongtinkhoahoc->khoa->SDTKhoa}}"disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fname">Địa chỉ khoa: </label>
                                        <input type="text" class="form-control" value="{{$thongtinkhoahoc->khoa->DiaChiKhoa}}"disabled>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="changepassLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="changepassLabel">Đổi mật khẩu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('updatechangepasssv', [$profilesv->MaSV])}}" method="post">
        @method("PUT")
        @csrf
        <div class="modal-body">
            <div class="col-md-12">
                <label for="fname">Mã sinh viên</label>
                <input type="text" class="form-control" value="{{$profilesv->permission->matk}}<?php echo $s?>" disabled>
            </div><div class="col-md-12">
                <label for="fname">Password_Old</label>
                <input type="password" name="passold" class="form-control" >
            </div><div class="col-md-12">
                <label for="fname">Password_NEW</label>
                <input type="password" name="passnew" class="form-control">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

        </div>
    </div>
</div>
<script>
function editprofile()
{
        document.getElementById("avatar").disabled = false;
        document.getElementById("MaSV").disabled = false;
        document.getElementById("fname").disabled = false;
        document.getElementById("lname").disabled = false;
        document.getElementById("NgaySinh").disabled = false;
        document.getElementById("cccd").disabled = false;
        document.getElementById("GioiTinh").disabled = false;
        document.getElementById("Email").disabled = false;
        document.getElementById("DiaChi").disabled = false;
        document.getElementById("SDT").disabled = false;
        document.getElementById("save").style.display = 'block';
}

</script>
@endsection
