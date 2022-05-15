@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('./css/profile.css') }}">

<div id = "container">
    <!-- thêm admin -->
    <div class="tab-pane fade show active" id="addadmin" role="tabpanel" aria-labelledby="addadmin-tab">
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
        <h4 class="card-title mt-2">Thêm thông tin cá nhân ADMIN (Quản lý Khoa)</h4>
        </header>
        <form action="#" method="POST" id="add_account_form" enctype="multipart/form-data">
            @csrf
        <div class="modal-body p-4 bg-light">
        <div class="row">
            <div class="col-lg">
            <label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-lg">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
            </div>
        </div>
        <div class="my-2">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="row">
            <div class="col-lg">
            <label for="date">Date of Birth</label>
            <input type="date" name="date" class="form-control" placeholder="Date of Birth" required>
            </div>
            <div class="col-lg">
            <label for="cccd">CMND/CCCD</label>
            <input type="text" name="cccd" class="form-control" placeholder="CMND/CCCD" required>
            </div>
        </div>
        <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
        </div>
        <div class="row">
            <div class="col-lg">

            <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" value="Nam">
            <span class="form-check-label"> Nam </span>
            <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" value="Nữ">
            <span class="form-check-label"> Nữ</span>
            </div>

            <div class="col-lg">
            <label for="phone">Phone</label>
            <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
            </div>
        </div>
        <div class="my-2">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address" required>
        </div>
        <div class="my-2">
            <label for="avatar">Select Avatar</label>
            <input type="file" name="avatar" class="form-control" required>
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="add_account_btn" class="btn btn-primary">Add Account</button>
        </div>
        </form>

<script type="text/javascript" src="{{ asset('./js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('./bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('./js/script.js') }}"></script>
</div>
@endsection

