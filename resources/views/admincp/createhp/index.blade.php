@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
{{-- add new employee modal start --}}

<body class="bg-light">
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>'; margin-top: 25px;" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL('admin/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh Sách Học Phần</a></li>
        </ol>
    </nav>
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Danh sách Học Phần</h3>
            <button class="btn btn-light"><a href="{{route('CreateLichHoc.create')}}">Create Lịch Học</a></button>
            <button class="btn btn-light"><a href="{{route('CreateHocPhan.create')}}">Create Học Phần</a></button>
        </div>
        <div class="card-body" id="show_all_adminaccounts">
            <div class="row">
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
                <div class="col">
                    <table id="example" class="display" style="width:100%">
                        <thead style="background-color: #3b89d6;">
                            <th>Mã HP</th>
                            <th>Thứ ngày</th>
                            <th>Tiết học</th>
                            <th>Phòng học</th>
                            <th>Start- End</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>
                            @foreach($listlichhocs as $listlichhoc)
                            <tr id="row{{ $listlichhoc->idlichhoc }}" >
                                <td>
                                    {{$listlichhoc->hocphan->idhocphan}}
                                </td>
                                <td>
                                    {{$listlichhoc->thu->thumay}}
                                </td>
                                <td>
                                    {{$listlichhoc->tiethoc->TietHoc}}
                                </td>
                                <td>
                                    {{$listlichhoc->phong->SoPhong}}
                                </td>
                                <td>
                                     {{$listlichhoc->tiethoc->GioHocBD}}-{{$listlichhoc->tiethoc->GioHocKT}}
                                </td>
                                <td>
                                    <a href="{{route('CreateLichHoc.edit', ['CreateLichHoc'=>$listlichhoc->idlichhoc])}}" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                   <form action="{{route('CreateLichHoc.destroy', ['CreateLichHoc'=>$listlichhoc->idlichhoc])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa lịch học này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
                                   </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table id="example" class="display" style="width:100%">
                        <thead style="background-color: #3b89d6;">
                            <th>Mã HP</th>
                            <th>Mã GV</th>
                            <th>Mã MH</th>
                            <th>Tên MH</th>
                            <th>Tên GV</th>
                            <th>Sửa</th>
                            <th>Xóa</th>


                        </thead>
                        <tbody>
                            @foreach($hps as $hocphan)
                            <tr id="row{{ $hocphan->idhocphan }}" >
                                <td>
                                    {{$hocphan->idhocphan}}
                                </td>
                                <td>
                                    <?php
                                        $s = sprintf('%05d',$hocphan->MaGV);
                                    ?>
                                    {{$hocphan->matk}}<?php echo $s; ?>
                                </td>
                                <td>
                                    {{$hocphan->monhoc->MaMonHoc}}
                                </td>
                                <td>
                                    {{$hocphan->monhoc->TenMonHoc}}
                                </td>
                                <td>
                                     {{$hocphan->magv->fname}} {{$hocphan->magv->lname}}
                                </td>
                                <td>
                                    <a href="{{route('CreateHocPhan.edit', ['CreateHocPhan'=>$hocphan->idhocphan])}}" class="btn btn-success"><i class="bi-pencil-square h4"></i></a>
                                </td>
                                <td>
                                   <form action="{{route('CreateHocPhan.destroy', ['CreateHocPhan'=>$hocphan->idhocphan])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick = "return confirm('Bạn muốn xóa học phần này không')" class="btn btn-danger"> <i class="bi-trash h4"></i></button>
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
        <!-- <script type="text/javascript" src="{{ asset('./js/script.js') }}"></script> -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("table.display").DataTable();
            });

        </script>
    </div>
    </div>
</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
