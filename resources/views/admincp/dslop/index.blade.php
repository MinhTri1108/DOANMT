@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}

<body class="bg-light">
<div class="container">
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Danh sách lớp</h3>
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
                    <table id="example" class="table table-striped table-bordered data-table" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
                        <thead style="background-color: #3b89d6;">
                            <th>Tên khoa</th>
                            <th>Tên Lớp</th>
                            <th>Khóa học</th>
                            <th>Hệ Đào Tạo</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>
                             @foreach($listlops as $listlop)
                            <tr id="row{{ $listlop->MaLop }}" >
                                <td>
                                    {{$listlop->khoa->TenKhoa}}
                                </td>
                                <td>
                                    <a href="">{{$listlop->TenLop}}</a>
                                </td>
                                <td>
                                    {{$listlop->khoahoc->TenKhoaHoc}}
                                </td>
                                <td>
                                    {{$listlop->hedaotao->TenHDT}}
                                </td>
                                <td>
                                    <a href="" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                   <form action="" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa truyện này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
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
