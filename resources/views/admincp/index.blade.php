@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
<style>
    #caption{
        background-color:#0202025c;
    }
    #slide{
        border-radius : 0px;
    }
</style>
<body class="bg-light">
<div class="container-fluid w-90 p-3 ">
<div class="row mt-5">
    <div class="col-12">
        <div class="card shadow ml-3">
            <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-light">Danh sách tuyển dụng</h3>
            </div>
            <div class="card-body" id="show_all_adminaccounts">
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
                        @foreach($lichs as $key=> $lich)
                        <div class="col-4"  id = "test">
                            <a href="">
                                <div class="dssv">
                                    <img id="slide" src="{{$lich->images}}" class="d-block w-100"style="height: 500px;" >
                                    <div >
                                        <h5 id = "noidung">{{$lich->NoiDung}}</h5>
                                        <p>{{$lich->DiaDiem}}</p>
                                    </div>
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
</body>

@endsection
