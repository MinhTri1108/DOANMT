@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}
<div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Add New AccountAdmin</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="add_account_form" enctype="multipart/form-data">
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
        <input type="date" name="date" id="date" class="form-control" placeholder="Date of Birth" required>
        </div>
        <div class="col-lg">
        <label for="cccd">CMND/CCCD</label>
        <input type="text" name="cccd" id="cccd" class="form-control" placeholder="CMND/CCCD" required>
        </div>
    </div>
    <div class="my-2">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
    </div>
    <div class="row">
        <div class="col-lg">

        <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex" id="sex" value="Nam">
        <span class="form-check-label"> Nam </span>
        <label class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex" id="sex" value="Nữ">
        <span class="form-check-label"> Nữ</span>
        </div>

        <div class="col-lg">
        <label for="phone">Phone</label>
        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" required>
        </div>
    </div>
    <div class="my-2">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
    </div>
    <div class="my-2">
        <label for="avatar">Select Avatar</label>
        <input type="file" name="avatar" id="avatar" class="form-control" required>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" id="add_account_btn" class="btn btn-primary">Add Account</button>
    </div>
    </form>
</div>
</div>
</div>
{{-- add new account modal end --}}

{{-- edit account modal start --}}
<div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
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
</div>
</div>
</div>
{{-- edit employee modal end --}}

<body class="bg-light">
<div class="container">
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
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
                        <thead style="background-color: #3b89d6;">
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
                                    <img src="{{ asset('./images/'.$listadminaccount->avatar) }}" width="50" class="img-thumbnail rounded-circle">

                                </td>
                                <td>
                                    {{$listadminaccount->MaAdmin}}
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

                                @csrf
                                    <a href="#" id="{{$listadminaccount->MaSV }}" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                    @method('DELETE')
                                     <a href="#" id="{{$listadminaccount->MaSV }}" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
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
<script>

$(function() {
    // fetchAllAdminAccounts();
    $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    // edit account ajax request
    $(document).on('click', '.editIcon', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    console.log(id);

    });
    // delete account ajax request
    $(document).on('click', '.deleteIcon', function(e) {
    e.preventDefault();
    let id = $(this).attr('id');
    console.log(id);
    let csrf='{{csrf_token()}}';
    Swal.fire({
        title: 'Bạn có chắc chắn xóa Tài khoản',
        text: 'Bạn không thể khôi phục!!',
        icon:'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xoa'
    }).then((result)=>{
        if(result.isConfirmed)
        {
            console.log("xoa");
            console.log(id);
            $.ajax({
            type: "delete",
            method: 'delete',

            url: "{{ URL('/admin/AdminAccounts')}}"+'/'+id,
            success: function (data) {
                console.log(data);
                $("#row" + id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        }
    })

    });
    // add new account ajax request
    $("#add_account_form").submit(function(e) {
    e.preventDefault();
    const formdata = new FormData(this);
    $("#add_account_btn").text('Adding...');
    $.ajax({
        url: "{{route('AdminAccounts.store')}}",
        type: "method",
        method: 'post',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
        if (response.status == 200) {
            console.log(response);
            Swal.fire(
            'Added!',
            'Account Added Successfully!',
            'success'
            )
            //  $('#example').DataTable().ajax.reload(null, false);
        }

        $("#add_account_btn").text('Add account');
        $("#add_account_form")[0].reset();
        $("#addAccountModal").modal('hide');
        }
    });
    });


});
</script>

@endsection
