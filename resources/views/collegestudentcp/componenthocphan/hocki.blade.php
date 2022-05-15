@extends('layouts.sidebarsv')
@section('content')
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>
<style>
    /* #test{
    border-radius: 15px; text-align: center;

    } */
    .dssv{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #4723d9;
        color: white;
    }
    .dssv:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
    .hplop{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: blue;
        color: white;
    }
    .hplop:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
    .ghichu{
        width: 80%;
        height: 180px;
        transform: scale(1);
		transition: all 0.5s;
		padding: 10px;
		box-shadow: rgb(1 140 245) 0px 1px 2px 0px, rgb(0 134 235) 0px 2px 6px 2px;
		border-radius: 8px;
        text-align : center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: green;
        color: white;
    }
    .ghichu:hover{
        transform: scale(1.1);
        box-shadow:20px 20px 50px 10px aqua;
    }
</style>

<body class="bg-light">
<div class="container">

<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Component Học Phần</h3>
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
                <div class="content" style = "margin-top: 10px;">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-6">
                            <select id="mySelect" class="form-control" name = "namhoc" onchange="location = this.value;">
                                <option class="text-center" value="" disabled selected>Năm học: {{$hockiht->namhoc->namhoc}}</option>
                                @foreach($namhoc as $nh)
                                <option class="text-center" value="{{route('qlchitiethpnamhoc', $nh->idnamhoc)}}"><a href="">Năm Học: {{$nh->namhoc}}</a></option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-md-6">
                                <select id="mySelect1" class="form-control" name = "hocki" onchange="location = this.value;">
                                <option class="text-center" value="" disabled selected>Học kì: {{$hockiht->HocKi}}</option>
                                @foreach($hocki as $hk)
                                <option class="text-center" value=""><a href="{{route('qlchitiethphocki', $hk->idhocki)}}">Học kì: {{$hk->HocKi}}</a></option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style = "row-gap :20px; margin-top: 50px">
                    @foreach($monhocs as $monhoc)
                    <div class="col-3"  id = "test">
                        <a href="{{route('qlchitiet', [$monhoc->idhocphan])}}">
                            <div class="dssv">
                                <h3>Môn: {{$monhoc->TenMonHoc}}</h3>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

@endsection
