@extends('layouts.sidebargv')
@section('content')
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
<style>
    .bg-info {
    background-color: #4723d9!important;
    }
</style>
<div class="row my-5">
    <div class="col">
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
        <h3 class="text-light">Các lớp học của bạn</h3>
        <!-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
            class="bi-plus-circle me-2"></i>Add Lop</button> -->
            <button class="btn btn-light"><a href="">Add</a></button>
        </div>
        <div class="card-body" id="show_all_adminaccounts">
        <!-- <h1 class="text-center text-secondary my-5">Loading...</h1> -->
        <!-- start table -->
            <div class="container">
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
                    <div class="row" style = "row-gap :20px">
                        @foreach($lophoc as $lop)
                        <div class="col-3"  id = "test">
                            <a href="{{route('indexcomponentmonhoc',$lop->idhocphan)}}">
                                <div class="dssv">
                                    <h3>Môn: {{$lop->monhoc->TenMonHoc}}</h3>
                                </div>
                            </a>
                        </div>
                        @endforeach
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
@endsection
