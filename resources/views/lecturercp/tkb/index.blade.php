@extends('layouts.sidebargv')
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('./css/thoikhoabieu.css') }}"> -->
<div class="content" style = "margin-top: 10px;">
    <div class="container">
        <div class="row justify-content-center"><h1 class="text-center">Thời Khóa Biểu</h1></div>
            <div class="row ">
                <select id="mySelect" class="form-control" name = "hocki" onchange="location = this.value;">
                    <option class="text-center" value="" disabled selected>---Học kì---</option>
                    @foreach($hocki as $hk)
                    <option class="text-center" value="{{route('viewtkb', $hk->HocKi)}}"><a href="">Học kì: {{$hk->HocKi}}</a></option>
                    @endforeach
                </select>
                    <!-- <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" name = "xem">Xem Thời Khóa Biểu</button>
                    </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
