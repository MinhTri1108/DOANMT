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
    <h5 class="modal-title" id="exampleModalLabel">Add New AccountLecturers</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{route('LecturersAccounts.store')}}" method="POST" enctype="multipart/form-data">
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
        <input class="form-check-input" type="radio" name="GioiTinh" id="sex" value="N???">
        <span class="form-check-label"> N???</span>
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
<div class="container">
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Danh s??ch Account Lecturers</h3>
        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add AccountLecturers</button>
        </div>
        <div class="card-body" id="show_all_adminaccounts">
        <!-- <h1 class="text-center text-secondary my-5">Loading...</h1> -->
        <!-- start table -->
            <div class="row">
                <div class="col">
                    <table id="example" class="table table-striped table-bordered data-table" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
                        <thead style="background-color: #4723d9; color: white;">
                            <th>Avatar</th>
                            <th>M?? GV</th>
                            <!-- <th>Password</th> -->
                            <th>H??? v?? t??n</th>
                            <th>Ng??y sinh</th>
                            <th>CCCD/CMND</th>
                            <th>Email</th>
                            <th>Gi???i T??nh</th>
                            <th>S??? ??i???n tho???i</th>
                            <th>?????a ch???</th>
                            <th>S???a</th>
                            <th>X??a</th>
                        </thead>
                        <tbody>
                        @foreach($listlecturersaccounts as $listlecturersaccount)
                            <tr id="row{{ $listlecturersaccount->MaGV }}" >
                                <td>
                                    <img src="{{ asset('./avatar/'.$listlecturersaccount->avatar) }}" width="50" class="img-thumbnail rounded-circle">

                                </td>
                                <td>
                                    <?php
                                        $s = sprintf('%05d',$listlecturersaccount->MaGV);
                                    ?>
                                    {{$listlecturersaccount->permission->matk}}<?php echo $s ?>
                                </td>

                                <td>
                                    {{$listlecturersaccount->fname}} {{$listlecturersaccount->lname}}
                                </td>
                                <td>
                                    {{$listlecturersaccount->NgaySinh}}
                                </td>
                                <td>
                                    {{$listlecturersaccount->cccd}}
                                </td>
                                <td>
                                    {{$listlecturersaccount->Email}}
                                </td>
                                <td>
                                    {{$listlecturersaccount->GioiTinh}}
                                </td>
                                <td>
                                    {{$listlecturersaccount->SDT}}
                                </td>
                                <td>
                                    {{$listlecturersaccount->DiaChi}}
                                </td>
                                <td>
                                    <a href="{{route('LecturersAccounts.edit',$listlecturersaccount->MaGV)}}" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('LecturersAccounts.destroy',$listlecturersaccount->MaGV)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('B???n mu???n x??a t??i kho???n n??y kh??ng')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
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
