@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>
{{-- add new employee modal start --}}
<div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add New AccountAdmin</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{route('AdminAccounts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body p-4 bg-light">
    <div class="row">
        <div class="col-lg">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
        </div>
        <div class="col-lg">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
        </div>
    </div>
    <div class="my-2">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
    </div>
    <div class="row">
        <div class="col-lg">
        <label for="date">Date of Birth</label>
        <input type="date" name="NgaySinh" id="date" class="form-control" placeholder="Date of Birth" required>
        </div>
        <div class="col-lg">
        <label for="cccd">CMND/CCCD</label>
        <input type="text" name="cccd" id="cccd" class="form-control" placeholder="CMND/CCCD" required>
        </div>
    </div>
    <div class="my-2">
        <label for="email">E-mail</label>
        <input type="email" name="Email" id="email" class="form-control" placeholder="E-mail" required>
    </div>
    <div class="row">
        <div class="col-lg">

        <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="GioiTinh" id="sex" value="Nam">
        <span class="form-check-label"> Nam </span>
        <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="GioiTinh" id="sex" value="Nữ">
        <span class="form-check-label"> Nữ</span>
        </div>

        <div class="col-lg">
        <label for="phone">Phone</label>
        <input type="tel" name="SDT" id="phone" class="form-control" placeholder="Phone" required>
        </div>
    </div>
    <div class="my-2">
        <label for="address">Address</label>
        <input type="text" name="DiaChi" id="address" class="form-control" placeholder="Address" required>
    </div>
    <div class="my-2">
        <label for="avatar">Select Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control" required>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add Account</button>
    </div>
    </form>
</div>
</div>
</div>
{{-- add new account modal end --}}
<body class="bg-light">
<div class="container-fluid w-90 p-3 ">
<div class="row mt-5">
    <div class="col-12">
    <div class="card shadow ml-3">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Danh sách Account ADMIN</h3>
        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add AccountAdmin</button>
        </div>
        <div class="card-body" id="show_all_adminaccounts">
        <!-- <h1 class="text-center text-secondary my-5">Loading...</h1> -->
        <!-- start table -->
            <div class="row">
                <div class="col">
                    <table id="example" class="table table-striped table-bordered data-table" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
                        <thead style="background-color: #4723d9; color: white;">
                            <th>Avatar</th>
                            <th>Mã Admin</th>
                            <!-- <th>Password</th> -->
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            <th>CCCD/CMND</th>
                            <th>Email</th>
                            <th>Giới Tính</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>
                        @foreach($listadminaccounts as $listadminaccount)
                            <tr id="row{{ $listadminaccount->MaAdmin }}" >
                                <td>
                                    <img src="{{asset('./avatar/'.$listadminaccount->avatar)}}" width="50" class="img-thumbnail rounded-circle">

                                </td>
                                <td>
                                    <?php
                                        $s = sprintf('%05d',$listadminaccount->MaAdmin);
                                    ?>
                                    {{$listadminaccount->permission->matk}}<?php echo $s ?>

                                </td>
                                <!-- <td>
                                    {{$listadminaccount->password}}
                                </td> -->
                                <td>
                                    {{$listadminaccount->fname}} {{$listadminaccount->lname}}
                                </td>
                                <td>
                                    {{$listadminaccount->NgaySinh}}
                                </td>
                                <td>
                                    {{$listadminaccount->cccd}}
                                </td>
                                <td>
                                    {{$listadminaccount->Email}}
                                </td>
                                <td>
                                    {{$listadminaccount->GioiTinh}}
                                </td>
                                <td>
                                    {{$listadminaccount->SDT}}
                                </td>
                                <td>
                                    {{$listadminaccount->DiaChi}}
                                </td>
                                <td>
                                    <a href="{{route('AdminAccounts.edit',$listadminaccount->MaAdmin)}}" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('AdminAccounts.destroy',$listadminaccount->MaAdmin)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa tài khoản này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
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
        <script type="text/javascript" src="{{ asset('./js/script.js') }}"></script>
    </div>
    </div>
</div>
</div>
@endsection
