@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<link rel="stylesheet" type="text/css" href="{{ asset('') }}">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

<div class="container-fluid">
<div class="row" style = "margin-top: 10px;">
        <div class="col col-md-5">
            <h4>Danh sách Admin</h4>


        </div>
        <div class="col col-md-4">

        </div>
        <div class="col col-md-3" style="text-align:center;">
            <h6><a href="{{route('AdminAccounts.create')}}"><i class="fas fa-user-plus"></i> Thêm Tài Khoản</a></h6>
        </div>
    </div>
	<div class="row">
		<div class="col">
			<table id="example" class="table table-striped table-bordered" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
		        <thead>
		            <tr style="background-color: #3b89d6;">
                        <th>Mã ADMIN</th>
                        <th>Password</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>CCCD/CMND</th>
                        <th>Giới Tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
		            </tr>
		        </thead>
		        <!-- <tfoot>
		            <tr>
                        <th>Mã Giảng viên</th>
                        <th>Password</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>CCCD/CMND</th>
                        <th>Giới Tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
		            </tr>
		        </tfoot> -->
		        <tbody>

		        </tbody>
		    </table>
		</div>
	</div>

	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="{{ asset('./bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="../js/script.js"></script>
</div>
@endsection

