@extends('layouts.header')
@section('content')
@include('layouts/navadmin')
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
                <h3 class="text-light">Create sự kiện - hoạt động</h3>
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <div class="card-body" id="">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}

                        </div>
                     @endif
                    <form class="row g-3" method="POST" action="{{route('SuKien-HoatDong.store')}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="MaAdmin" class="form-label">Người Post:</label><br>
                            @foreach($dataad as $account)
                            <b>{{$account->fname}} {{$account->lname}}</b>
                            <input style="display: none" type="text" name="MaAdmin" class="form-control" placeholder="MaAdmin" value = "{{$account->MaAdmin}}" readonly>
                            @endforeach

                        </div>
                        <div class="col-md-6">
                            <label for="images" class="form-label">Link hình ảnh </label>
                            <input type="text" name="images" class="form-control"  placeholder="Link hình ảnh" value = "">

                        </div>
                        <div class="col-md-6">
                            <label for="link" class="form-label">Link nội dung </label>
                            <input type="text" name="link" class="form-control"  placeholder="Link nội dung" value = "">
                        </div>
                        <div class="col-md-6">
                            <label for="NoiDung" class="form-label">Nội Dung </label>
                            <input type="text" name="NoiDung" class="form-control"  placeholder="Nội Dung" value = "">
                        </div>
                        <div class="col-md-6">
                            <label for="DiaDiem" class="form-label">Địa điểm </label>
                            <input type="text" name="DiaDiem" class="form-control"  placeholder="Địa điểm" value = "">
                        </div>
                        <div class="col-md-6">
                            <label for="Ngay" class="form-label">Ngày </label>
                            <input type="date" name="Ngay" class="form-control"  placeholder="Ngày" value = "">
                        </div>
                        <div class="col-md-6">
                            <label for="Gio" class="form-label">Giờ </label>
                            <input type="time" name="Gio" class="form-control"  placeholder="Giờ" value = "">
                        </div>
                        <div class="col-md-6">
                            <label for="GhiChu" class="form-label">Ghi chú </label>
                            <input type="text" name="GhiChu" class="form-control"  placeholder="Ghi chú" value = "">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"> Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
