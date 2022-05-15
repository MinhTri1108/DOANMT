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
        <h3 class="text-light">Điểm Danh Học Phần: {{$tenhocphan->monhoc->TenMonHoc}}</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Điểm danh</button> -->
        </div>
        <!-- modals -->
        <div class="card-body" id="show_all_adminaccounts">
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
                <div class="row">
                    <div class="col-6">
                        <table  class="table table-bordered">
                            <tr>
                                <th>Ngày</th>
                                <th>Học/Vắng</th>
                            </tr>
                            @foreach($diemdanh as $dd)
                            <tr>
                                <td><?php echo \Carbon\Carbon::parse($dd->Ngay)->format('d-m-Y');?></td>
                                <td>
                                    @if($dd->DiemDanh == 1)
                                    <img src="http://daotao.qnu.edu.vn/Content/images/Dau.png" alt="">
                                    @elseif($dd->DiemDanh == 0)
                                    <img src="http://daotao.qnu.edu.vn/Content/images/Rot.png" alt="">
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($demsobuoihoc > 0 && $demsobuoinghi>0)
                    <div class="col-6">
                        <table  class="table table-bordered">
                            <tr>
                                <th style="width: 50%;">Số buổi học</th>
                                <td>{{$demsobuoihoc}}</td>
                            </tr>
                            <tr>
                                <th style="width: 50%;">Số buổi vắng</th>
                                <td style="color:red;">{{$demsobuoinghi}}</td>
                            </tr>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

@endsection
