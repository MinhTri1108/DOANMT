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
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="width: fit-content;margin: auto;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="height:500px;">
                        @foreach($lichs as $key=> $lich)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <img id="slide" src="{{$lich->images}}" class="d-block w-100"style="height: 500px;" >
                            <div class="carousel-caption d-none d-md-block" id = "caption">
                                <h5 id = "noidung">{{$lich->NoiDung}}</h5>
                                <p>{{$lich->DiaDiem}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

@endsection
