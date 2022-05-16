@extends('layouts.sidebarsv')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('./css/thoikhoabieu.css') }}"> -->
<div class="content" style = "margin-top: 10px;">
    <div class="container">
        <div class="row justify-content-center"><h1 class="text-center">Thời Khóa Biểu</h1></div>
            <div class="row ">
                <div class="col-md-6">
                <select id="mySelect" class="form-control" name = "namhoc" onchange="location = this.value;">
                    <option class="text-center" value="" disabled selected>---Năm Học---</option>
                    @foreach($namhoc as $nh)
                    <option class="text-center" value="{{route('namhoctkbsv', $nh->idnamhoc)}}"><a href="">Năm Học: {{$nh->namhoc}}</a></option>
                    @endforeach
                </select>
                </div>
                <div class="col-md-6">

                </div>
                    <!-- <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" name = "xem">Xem Thời Khóa Biểu</button>
                    </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
