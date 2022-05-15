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
                                    <option class="text-center" value="" disabled selected>---Năm Học---</option>
                                    @foreach($namhoc as $nh)
                                    <option class="text-center" value="{{route('qlchitiethpnamhoc', $nh->idnamhoc)}}"><a href="">Năm Học: {{$nh->namhoc}}</a></option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

@endsection
