@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}
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
        <h3 class="text-light">Danh sách Sự kiện - Hoạt động</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <button class="btn btn-light"><a href="{{route('SuKien-HoatDong.create')}}">Add Sự kiện - Hoạt động</a></button>
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
                        <thead style="background-color: #4723d9; color: white;">
                            <th>AdminPost</th>
                            <th>Images</th>
                            <th>Nội dung</th>
                            <th>Địa điểm</th>
                            <th>Ngày</th>
                            <th>Giờ</th>
                            <th>Ghi chú</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>
                        @foreach($lichlvs as $lichlv)
                            <tr id="" >
                                <td>
                                    {{$lichlv->MaAdmin}}
                                </td>
                                <td>
                                    <img src="{{$lichlv->images}}" width="50" class="img-thumbnail rounded-circle">

                                </td>
                                <td>
                                    {{$lichlv->NoiDung}}
                                </td>
                                <td>
                                    {{$lichlv->DiaDiem}}
                                </td>
                                <td>
                                    {{$lichlv->Ngay}}
                                </td>
                                <td>
                                    {{$lichlv->Gio}}
                                </td>
                                <td>
                                    {{$lichlv->GhiChu}}
                                </td>
                                <td>
                                    <a href="{{route('SuKien-HoatDong.edit', ['SuKien_HoatDong'=>$lichlv->id])}}" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                   <form action="{{route('SuKien-HoatDong.destroy', ['SuKien_HoatDong'=>$lichlv->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa môn học này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
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
        <script type="text/javascript" src="{{ asset('./bootstrap/js/bootstrap.min.js') }}"></script>
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
